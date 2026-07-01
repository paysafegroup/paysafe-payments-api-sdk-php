#!/usr/bin/env bash
# All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE

set -euo pipefail

# Generates PHP 7.4 model classes from the OpenAPI spec, organises them into
# sub-namespaces based on x-package, fixes additionalProperties classes, adds
# use imports, and replaces src/Model with the result.
#
# Usage (from repo root):
#   wsl ./openapi/generate-models.sh
#
# Requirements: JDK, bash, awk, sed, grep, find (standard on any Linux / WSL / Docker image)

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
REPO_ROOT="$(cd "$SCRIPT_DIR/.." && pwd)"

SPEC="$SCRIPT_DIR/paysafe-server-side-sdk-specification.yaml"
JAR="$SCRIPT_DIR/openapi-generator-cli.jar"
TEMPLATE_DIR="$SCRIPT_DIR/templates-php74"
TMP_DIR="$REPO_ROOT/build/generated-php74-tmp"
BUILD_DIR="$REPO_ROOT/build/generated-php74"
TARGET_MODEL_DIR="$REPO_ROOT/src/Model"
BASE_NS='Paysafe\PhpSdk\Model'

# --------------------------------------------------------------------------- #
# 0. Pre-flight checks
# --------------------------------------------------------------------------- #
if [[ ! -f "$SPEC" ]]; then
  echo "Error: spec not found at $SPEC – run fetch-spec.sh first." >&2
  exit 1
fi

if [[ ! -f "$JAR" ]]; then
  echo "openapi-generator-cli.jar not found, downloading..."
  curl -L -o "$JAR" \
    "https://repo1.maven.org/maven2/org/openapitools/openapi-generator-cli/7.6.0/openapi-generator-cli-7.6.0.jar"
fi

# --------------------------------------------------------------------------- #
# 1. Clear build directories
# --------------------------------------------------------------------------- #
echo "Clearing build directories..."
rm -rf "$TMP_DIR" "$BUILD_DIR"
mkdir -p "$TMP_DIR"
cp "$SCRIPT_DIR/.openapi-generator-ignore" "$TMP_DIR/.openapi-generator-ignore"

# --------------------------------------------------------------------------- #
# 2. Generate
# --------------------------------------------------------------------------- #
echo "Generating PHP 7.4 model classes..."

java -jar "$JAR" generate \
  --generator-name php \
  --input-spec "$SPEC" \
  --output "$TMP_DIR" \
  --model-package "Model" \
  --template-dir "$TEMPLATE_DIR" \
  --generate-alias-as-model \
  --global-property "models=,apis=false,supportingFiles=false,modelTests=false,modelDocs=false" \
  --additional-properties "hideGenerationTimestamp=true,variableNamingConvention=camelCase,invokerPackage=Paysafe\\PhpSdk,packageName=paysafe/paymentsapi-sdk-php,srcBasePath=src"

MODEL_DIR="$TMP_DIR/src/Model"
if [[ ! -d "$MODEL_DIR" ]]; then
  echo "Error: expected generated model dir not found: $MODEL_DIR" >&2
  exit 1
fi

echo "Generation done."

# --------------------------------------------------------------------------- #
# 3. Write BaseModel.php (copied from template, not inlined in this script)
# --------------------------------------------------------------------------- #
cp "$TEMPLATE_DIR/BaseModel.php" "$MODEL_DIR/BaseModel.php"

# --------------------------------------------------------------------------- #
# 4. Parse x-package map: SchemaName -> sub/path  (e.g. "Error" -> "Common/Error")
# --------------------------------------------------------------------------- #
echo "Reading x-package assignments from spec..."

LOOKUP_FILE="$(mktemp)"
awk '
  function canonical_segment(seg,   key, formatted) {
    key = tolower(seg)
    formatted = toupper(substr(seg,1,1)) substr(seg,2)

    if (!(key in canon_seg)) {
      canon_seg[key] = formatted
      return canon_seg[key]
    }

    if (formatted != canon_seg[key] && !(key SUBSEP formatted in warned)) {
      warned[key SUBSEP formatted] = 1
      printf("Warning: x-package segment case mismatch: \"%s\" -> using canonical \"%s\"\n", formatted, canon_seg[key]) > "/dev/stderr"
    }

    return canon_seg[key]
  }

  /^  schemas:/ { in_schemas=1; next }
  in_schemas && /^    [A-Za-z]/ {
    current = $0
    gsub(/^[[:space:]]+|:[[:space:]]*$/, "", current)
    next
  }
  in_schemas && current != "" && /^      x-package:/ {
    pkg = $2
    n = split(pkg, segs, ".")
    path = ""
    for (i = 1; i <= n; i++) {
      seg = canonical_segment(segs[i])
      path = (i == 1) ? seg : path "/" seg
    }
    print current " " path
    next
  }
' "$SPEC" > "$LOOKUP_FILE"

echo "  Found $(wc -l < "$LOOKUP_FILE") x-package entries."

# --------------------------------------------------------------------------- #
# 5. Build class -> full namespace map (single awk pass)
# --------------------------------------------------------------------------- #
ALL_CLASSES_FILE="$(mktemp)"
find "$MODEL_DIR" -maxdepth 1 -name "*.php" \
  | sed 's|.*/||; s|\.php$||' \
  | sort > "$ALL_CLASSES_FILE"

CLASS_NS_FILE="$(mktemp)"
BASE_NS_ENV="$BASE_NS" awk '
  NR==FNR { pkg[$1]=$2; next }
  {
    cls  = $0
    base = ENVIRON["BASE_NS_ENV"]
    if (cls in pkg) {
      n2 = split(pkg[cls], parts, "/")
      pkgpath = parts[1]
      for (j = 2; j <= n2; j++) pkgpath = pkgpath "\\" parts[j]
      print cls " " base "\\" pkgpath
    } else {
      print cls " " base
    }
  }
' "$LOOKUP_FILE" "$ALL_CLASSES_FILE" > "$CLASS_NS_FILE"

# --------------------------------------------------------------------------- #
# 6. Post-process each file
# --------------------------------------------------------------------------- #
echo "Post-processing model files..."

ADDITIONAL_PARAMS_SNIPPET="$TEMPLATE_DIR/additionalParameters.php.snippet"

while IFS= read -r php_file; do
  class_name="$(basename "$php_file" .php)"

  # Resolve target namespace for this file
  sub_path="$(awk -v cls="$class_name" '$1==cls{print $2}' "$LOOKUP_FILE")"
  if [[ -n "$sub_path" ]]; then
    target_ns="${BASE_NS}\\$(echo "$sub_path" | tr '/' '\\')"
  else
    target_ns="$BASE_NS"
  fi

  # Fix 1: replace `extends array<String, mixed>` (from additionalProperties:true) with BaseModel
  #         and inject the additionalParameters field + methods the generator skipped.
  if grep -q 'extends array<String, mixed>' "$php_file"; then
    sed -i 's| extends array<String, mixed>| extends BaseModel|g' "$php_file"
    SNIPPET="$ADDITIONAL_PARAMS_SNIPPET" awk '
      /^\}$/ && !injected {
        while ((getline line < ENVIRON["SNIPPET"]) > 0) print line
        close(ENVIRON["SNIPPET"])
        injected=1
      }
      { print }
    ' "$php_file" > "${php_file}.tmp" && mv "${php_file}.tmp" "$php_file"
  fi

  # Fix 2: collect use statements — one grep + one awk pass per file
  use_lines=""
  REFS="$(grep -oE '\b[A-Z][a-zA-Z0-9]+\b' "$php_file" | sort -u | tr '\n' ' ')"
  if [[ -n "$REFS" ]]; then
    use_lines="$(
      REFS="$REFS" THIS_CLS="$class_name" THIS_NS="$target_ns" awk '
        BEGIN {
          n = split(ENVIRON["REFS"], refs, " ")
          for (i=1;i<=n;i++) want[refs[i]]=1
        }
        {
          cls=$1; ns=$2
          if (!(cls in want)) next
          if (cls == ENVIRON["THIS_CLS"]) next
          if (ns  == ENVIRON["THIS_NS"])  next
          print "use " ns "\\" cls ";"
        }
      ' "$CLASS_NS_FILE"
    )"
  fi

  # Fix 3: rewrite namespace declaration
  sed_ns="$(printf '%s' "$target_ns" | sed 's/\\/\\\\/g')"
  sed -i "s|^namespace .*;$|namespace ${sed_ns};|" "$php_file"

  # Fix 4: insert use statements after namespace line
  if [[ -n "$use_lines" ]]; then
    sorted_uses="$(echo "$use_lines" | sort -u | tr '\n' '\001')"
    SORTED_USES="$sorted_uses" awk '
      /^namespace / {
        print
        n = split(ENVIRON["SORTED_USES"], arr, "\001")
        for (i=1; i<=n; i++) {
          if (arr[i] != "") print arr[i]
        }
        next
      }
      { print }
    ' "$php_file" > "${php_file}.tmp" && mv "${php_file}.tmp" "$php_file"
  fi

  # Fix 5: move file to matching sub-directory
  if [[ -n "$sub_path" ]]; then
    target_dir="$MODEL_DIR/$sub_path"
    mkdir -p "$target_dir"
    mv "$php_file" "$target_dir/"
  fi

done < <(find "$MODEL_DIR" -maxdepth 1 -name "*.php")

rm -f "$LOOKUP_FILE" "$ALL_CLASSES_FILE" "$CLASS_NS_FILE"
find "$MODEL_DIR" -mindepth 1 -type d -empty -delete

echo "Post-processing done."

# --------------------------------------------------------------------------- #
# 7. Keep generated int setters/builders strongly typed.
#    Numeric strings are handled during denormalization in BaseModelNormalizer.
# --------------------------------------------------------------------------- #
echo "Keeping strong int parameter typing in generated models."

# --------------------------------------------------------------------------- #
# 8. Replace src/Model completely with the organised result
# --------------------------------------------------------------------------- #
echo "Replacing $TARGET_MODEL_DIR..."
rm -rf "$TARGET_MODEL_DIR"
mkdir -p "$TARGET_MODEL_DIR"
cp -R "$MODEL_DIR/." "$TARGET_MODEL_DIR/"

mv "$TMP_DIR" "$BUILD_DIR"

echo ""
echo "Models written to : $TARGET_MODEL_DIR"
echo "Build artefact    : $BUILD_DIR/src/Model"
echo ""
echo "Run 'composer dump-autoload' to refresh the autoloader."
