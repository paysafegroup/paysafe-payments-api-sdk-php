<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

class StoreDetailsInner extends BaseModel
{
	private string $posId;
	private string $name;
	private string $address;
	private string $latitude;
	private string $longitude;
	private string $postalCode;
	private string $city;
	private string $cheatSheetUrl;
	private string $distributorId;
	private string $country;
	private string $posTypeLogo;
	private string $productType;
	private string $media;
	private string $productLogo;
	private string $specialImage;
	private string $specialText;
	private string $cheatSheetText;
	private bool $recommended;
	private string $distanceFromOrigin;
	private bool $directload;
	private ?array $storeFeedbacks = null;

	/**
	 * Builder function for posId
	 * 
	 * @param string $posId
	 * 
	 * @return $this
	 */
	public function posId(string $posId): self
	{
		$this->setPosId($posId);
		
		return $this;
	}

	/**
	 * Setter function for posId
	 * 
	 * @param string $posId
	 * 
	 * @return void
	 */
	public function setPosId(string $posId): void
	{
		$this->posId = $posId;
	}

	/**
	 * Getter function for posId
	 * 
	 * @return string
	 */
	public function getPosId(): string
	{
		return $this->posId;
	}

	/**
	 * Builder function for name
	 * 
	 * @param string $name
	 * 
	 * @return $this
	 */
	public function name(string $name): self
	{
		$this->setName($name);
		
		return $this;
	}

	/**
	 * Setter function for name
	 * 
	 * @param string $name
	 * 
	 * @return void
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}

	/**
	 * Getter function for name
	 * 
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Builder function for address
	 * 
	 * @param string $address
	 * 
	 * @return $this
	 */
	public function address(string $address): self
	{
		$this->setAddress($address);
		
		return $this;
	}

	/**
	 * Setter function for address
	 * 
	 * @param string $address
	 * 
	 * @return void
	 */
	public function setAddress(string $address): void
	{
		$this->address = $address;
	}

	/**
	 * Getter function for address
	 * 
	 * @return string
	 */
	public function getAddress(): string
	{
		return $this->address;
	}

	/**
	 * Builder function for latitude
	 * 
	 * @param string $latitude
	 * 
	 * @return $this
	 */
	public function latitude(string $latitude): self
	{
		$this->setLatitude($latitude);
		
		return $this;
	}

	/**
	 * Setter function for latitude
	 * 
	 * @param string $latitude
	 * 
	 * @return void
	 */
	public function setLatitude(string $latitude): void
	{
		$this->latitude = $latitude;
	}

	/**
	 * Getter function for latitude
	 * 
	 * @return string
	 */
	public function getLatitude(): string
	{
		return $this->latitude;
	}

	/**
	 * Builder function for longitude
	 * 
	 * @param string $longitude
	 * 
	 * @return $this
	 */
	public function longitude(string $longitude): self
	{
		$this->setLongitude($longitude);
		
		return $this;
	}

	/**
	 * Setter function for longitude
	 * 
	 * @param string $longitude
	 * 
	 * @return void
	 */
	public function setLongitude(string $longitude): void
	{
		$this->longitude = $longitude;
	}

	/**
	 * Getter function for longitude
	 * 
	 * @return string
	 */
	public function getLongitude(): string
	{
		return $this->longitude;
	}

	/**
	 * Builder function for postalCode
	 * 
	 * @param string $postalCode
	 * 
	 * @return $this
	 */
	public function postalCode(string $postalCode): self
	{
		$this->setPostalCode($postalCode);
		
		return $this;
	}

	/**
	 * Setter function for postalCode
	 * 
	 * @param string $postalCode
	 * 
	 * @return void
	 */
	public function setPostalCode(string $postalCode): void
	{
		$this->postalCode = $postalCode;
	}

	/**
	 * Getter function for postalCode
	 * 
	 * @return string
	 */
	public function getPostalCode(): string
	{
		return $this->postalCode;
	}

	/**
	 * Builder function for city
	 * 
	 * @param string $city
	 * 
	 * @return $this
	 */
	public function city(string $city): self
	{
		$this->setCity($city);
		
		return $this;
	}

	/**
	 * Setter function for city
	 * 
	 * @param string $city
	 * 
	 * @return void
	 */
	public function setCity(string $city): void
	{
		$this->city = $city;
	}

	/**
	 * Getter function for city
	 * 
	 * @return string
	 */
	public function getCity(): string
	{
		return $this->city;
	}

	/**
	 * Builder function for cheatSheetUrl
	 * 
	 * @param string $cheatSheetUrl
	 * 
	 * @return $this
	 */
	public function cheatSheetUrl(string $cheatSheetUrl): self
	{
		$this->setCheatSheetUrl($cheatSheetUrl);
		
		return $this;
	}

	/**
	 * Setter function for cheatSheetUrl
	 * 
	 * @param string $cheatSheetUrl
	 * 
	 * @return void
	 */
	public function setCheatSheetUrl(string $cheatSheetUrl): void
	{
		$this->cheatSheetUrl = $cheatSheetUrl;
	}

	/**
	 * Getter function for cheatSheetUrl
	 * 
	 * @return string
	 */
	public function getCheatSheetUrl(): string
	{
		return $this->cheatSheetUrl;
	}

	/**
	 * Builder function for distributorId
	 * 
	 * @param string $distributorId
	 * 
	 * @return $this
	 */
	public function distributorId(string $distributorId): self
	{
		$this->setDistributorId($distributorId);
		
		return $this;
	}

	/**
	 * Setter function for distributorId
	 * 
	 * @param string $distributorId
	 * 
	 * @return void
	 */
	public function setDistributorId(string $distributorId): void
	{
		$this->distributorId = $distributorId;
	}

	/**
	 * Getter function for distributorId
	 * 
	 * @return string
	 */
	public function getDistributorId(): string
	{
		return $this->distributorId;
	}

	/**
	 * Builder function for country
	 * 
	 * @param string $country
	 * 
	 * @return $this
	 */
	public function country(string $country): self
	{
		$this->setCountry($country);
		
		return $this;
	}

	/**
	 * Setter function for country
	 * 
	 * @param string $country
	 * 
	 * @return void
	 */
	public function setCountry(string $country): void
	{
		$this->country = $country;
	}

	/**
	 * Getter function for country
	 * 
	 * @return string
	 */
	public function getCountry(): string
	{
		return $this->country;
	}

	/**
	 * Builder function for posTypeLogo
	 * 
	 * @param string $posTypeLogo
	 * 
	 * @return $this
	 */
	public function posTypeLogo(string $posTypeLogo): self
	{
		$this->setPosTypeLogo($posTypeLogo);
		
		return $this;
	}

	/**
	 * Setter function for posTypeLogo
	 * 
	 * @param string $posTypeLogo
	 * 
	 * @return void
	 */
	public function setPosTypeLogo(string $posTypeLogo): void
	{
		$this->posTypeLogo = $posTypeLogo;
	}

	/**
	 * Getter function for posTypeLogo
	 * 
	 * @return string
	 */
	public function getPosTypeLogo(): string
	{
		return $this->posTypeLogo;
	}

	/**
	 * Builder function for productType
	 * 
	 * @param string $productType
	 * 
	 * @return $this
	 */
	public function productType(string $productType): self
	{
		$this->setProductType($productType);
		
		return $this;
	}

	/**
	 * Setter function for productType
	 * 
	 * @param string $productType
	 * 
	 * @return void
	 */
	public function setProductType(string $productType): void
	{
		$this->productType = $productType;
	}

	/**
	 * Getter function for productType
	 * 
	 * @return string
	 */
	public function getProductType(): string
	{
		return $this->productType;
	}

	/**
	 * Builder function for media
	 * 
	 * @param string $media
	 * 
	 * @return $this
	 */
	public function media(string $media): self
	{
		$this->setMedia($media);
		
		return $this;
	}

	/**
	 * Setter function for media
	 * 
	 * @param string $media
	 * 
	 * @return void
	 */
	public function setMedia(string $media): void
	{
		$this->media = $media;
	}

	/**
	 * Getter function for media
	 * 
	 * @return string
	 */
	public function getMedia(): string
	{
		return $this->media;
	}

	/**
	 * Builder function for productLogo
	 * 
	 * @param string $productLogo
	 * 
	 * @return $this
	 */
	public function productLogo(string $productLogo): self
	{
		$this->setProductLogo($productLogo);
		
		return $this;
	}

	/**
	 * Setter function for productLogo
	 * 
	 * @param string $productLogo
	 * 
	 * @return void
	 */
	public function setProductLogo(string $productLogo): void
	{
		$this->productLogo = $productLogo;
	}

	/**
	 * Getter function for productLogo
	 * 
	 * @return string
	 */
	public function getProductLogo(): string
	{
		return $this->productLogo;
	}

	/**
	 * Builder function for specialImage
	 * 
	 * @param string $specialImage
	 * 
	 * @return $this
	 */
	public function specialImage(string $specialImage): self
	{
		$this->setSpecialImage($specialImage);
		
		return $this;
	}

	/**
	 * Setter function for specialImage
	 * 
	 * @param string $specialImage
	 * 
	 * @return void
	 */
	public function setSpecialImage(string $specialImage): void
	{
		$this->specialImage = $specialImage;
	}

	/**
	 * Getter function for specialImage
	 * 
	 * @return string
	 */
	public function getSpecialImage(): string
	{
		return $this->specialImage;
	}

	/**
	 * Builder function for specialText
	 * 
	 * @param string $specialText
	 * 
	 * @return $this
	 */
	public function specialText(string $specialText): self
	{
		$this->setSpecialText($specialText);
		
		return $this;
	}

	/**
	 * Setter function for specialText
	 * 
	 * @param string $specialText
	 * 
	 * @return void
	 */
	public function setSpecialText(string $specialText): void
	{
		$this->specialText = $specialText;
	}

	/**
	 * Getter function for specialText
	 * 
	 * @return string
	 */
	public function getSpecialText(): string
	{
		return $this->specialText;
	}

	/**
	 * Builder function for cheatSheetText
	 * 
	 * @param string $cheatSheetText
	 * 
	 * @return $this
	 */
	public function cheatSheetText(string $cheatSheetText): self
	{
		$this->setCheatSheetText($cheatSheetText);
		
		return $this;
	}

	/**
	 * Setter function for cheatSheetText
	 * 
	 * @param string $cheatSheetText
	 * 
	 * @return void
	 */
	public function setCheatSheetText(string $cheatSheetText): void
	{
		$this->cheatSheetText = $cheatSheetText;
	}

	/**
	 * Getter function for cheatSheetText
	 * 
	 * @return string
	 */
	public function getCheatSheetText(): string
	{
		return $this->cheatSheetText;
	}

	/**
	 * Builder function for recommended
	 * 
	 * @param bool $recommended
	 * 
	 * @return $this
	 */
	public function recommended(bool $recommended): self
	{
		$this->setRecommended($recommended);
		
		return $this;
	}

	/**
	 * Setter function for recommended
	 * 
	 * @param bool $recommended
	 * 
	 * @return void
	 */
	public function setRecommended(bool $recommended): void
	{
		$this->recommended = $recommended;
	}

	/**
	 * Getter function for recommended
	 * 
	 * @return bool
	 */
	public function getRecommended(): bool
	{
		return $this->recommended;
	}

	/**
	 * Builder function for distanceFromOrigin
	 * 
	 * @param string $distanceFromOrigin
	 * 
	 * @return $this
	 */
	public function distanceFromOrigin(string $distanceFromOrigin): self
	{
		$this->setDistanceFromOrigin($distanceFromOrigin);
		
		return $this;
	}

	/**
	 * Setter function for distanceFromOrigin
	 * 
	 * @param string $distanceFromOrigin
	 * 
	 * @return void
	 */
	public function setDistanceFromOrigin(string $distanceFromOrigin): void
	{
		$this->distanceFromOrigin = $distanceFromOrigin;
	}

	/**
	 * Getter function for distanceFromOrigin
	 * 
	 * @return string
	 */
	public function getDistanceFromOrigin(): string
	{
		return $this->distanceFromOrigin;
	}

	/**
	 * Builder function for directload
	 * 
	 * @param bool $directload
	 * 
	 * @return $this
	 */
	public function directload(bool $directload): self
	{
		$this->setDirectload($directload);
		
		return $this;
	}

	/**
	 * Setter function for directload
	 * 
	 * @param bool $directload
	 * 
	 * @return void
	 */
	public function setDirectload(bool $directload): void
	{
		$this->directload = $directload;
	}

	/**
	 * Getter function for directload
	 * 
	 * @return bool
	 */
	public function getDirectload(): bool
	{
		return $this->directload;
	}

	/**
	 * Builder function for storeFeedbacks
	 * 
	 * @param string[] $storeFeedbacks
	 * 
	 * @return $this
	 */
	public function storeFeedbacks(array $storeFeedbacks): self
	{
		$this->setStoreFeedbacks($storeFeedbacks);
		
		return $this;
	}

	/**
	 * Setter function for storeFeedbacks
	 * 
	 * @param string[] $storeFeedbacks
	 * 
	 * @return void
	 */
	public function setStoreFeedbacks(array $storeFeedbacks): void
	{
		$this->storeFeedbacks = $storeFeedbacks;
	}

	/**
	 * Getter function for storeFeedbacks
	 * 
	 * @return string[]|null
	 */
	public function getStoreFeedbacks(): array
	{
		return $this->storeFeedbacks;
	}

	/**
	 * Add new storeFeedbacksItem
	 * 
	 * @param string $storeFeedbacksItem
	 * 
	 * @return $this
	 */
	public function addStoreFeedbacksItem(string $storeFeedbacksItem): self
	{
		if ($this->storeFeedbacks === null) {
			$this->setStoreFeedbacks([$storeFeedbacksItem]);
			
			return $this;
		}
		
		$storeFeedbacks = $this->getStoreFeedbacks();
		$storeFeedbacks[] = $storeFeedbacksItem;
		$this->setStoreFeedbacks($storeFeedbacks);
		
		return $this;
	}

	/**
	 * Remove storeFeedbacksItem
	 * 
	 * @param string $storeFeedbacksItem
	 * 
	 * @return $this
	 */
	public function removeStoreFeedbacksItem(string $storeFeedbacksItem): self
	{
		$this->setStoreFeedbacks(array_diff($this->getStoreFeedbacks(), [$storeFeedbacksItem]));
		
		return $this;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class StoreDetailsInner {" . PHP_EOL
			. "    posId: " . $this->toIndentedString($this->posId) . PHP_EOL
			. "    name: " . $this->toIndentedString($this->name) . PHP_EOL
			. "    address: " . $this->toIndentedString($this->address) . PHP_EOL
			. "    latitude: " . $this->toIndentedString($this->latitude) . PHP_EOL
			. "    longitude: " . $this->toIndentedString($this->longitude) . PHP_EOL
			. "    postalCode: " . $this->toIndentedString($this->postalCode) . PHP_EOL
			. "    city: " . $this->toIndentedString($this->city) . PHP_EOL
			. "    cheatSheetUrl: " . $this->toIndentedString($this->cheatSheetUrl) . PHP_EOL
			. "    distributorId: " . $this->toIndentedString($this->distributorId) . PHP_EOL
			. "    country: " . $this->toIndentedString($this->country) . PHP_EOL
			. "    posTypeLogo: " . $this->toIndentedString($this->posTypeLogo) . PHP_EOL
			. "    productType: " . $this->toIndentedString($this->productType) . PHP_EOL
			. "    media: " . $this->toIndentedString($this->media) . PHP_EOL
			. "    productLogo: " . $this->toIndentedString($this->productLogo) . PHP_EOL
			. "    specialImage: " . $this->toIndentedString($this->specialImage) . PHP_EOL
			. "    specialText: " . $this->toIndentedString($this->specialText) . PHP_EOL
			. "    cheatSheetText: " . $this->toIndentedString($this->cheatSheetText) . PHP_EOL
			. "    recommended: " . $this->toIndentedString($this->recommended) . PHP_EOL
			. "    distanceFromOrigin: " . $this->toIndentedString($this->distanceFromOrigin) . PHP_EOL
			. "    directload: " . $this->toIndentedString($this->directload) . PHP_EOL
			. "    storeFeedbacks: " . $this->toIndentedString($this->storeFeedbacks) . PHP_EOL
			. "}";
	}
}
