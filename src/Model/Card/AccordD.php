<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Parameters for financing plans supported for certain merchant configurations. Include this element only when instructed to do so by your account manager.  **Note:** Not all processing gateways support this parameter.
 */
class AccordD extends BaseModel
{
    private ?string $financingType = null;
    /**
     * This is the plan number for this financing transaction.
     */
    private ?string $plan = null;
    /**
     * This is the grace period, in months, associated with deferred payment transactions.
     */
    private ?int $gracePeriod = null;
    /**
     * This is the number of payments, in months, for equal payment transactions.
     */
    private ?int $term = null;

    /**
     * Builder function for financingType
     *
     * @param string $financingType
     *
     * @return $this
     */
    public function financingType(?string $financingType): self
    {
        $this->setFinancingType($financingType);

        return $this;
    }

    /**
     * Setter function for financingType
     *
     * @param string $financingType
     *
     * @return void
     */
    public function setFinancingType(?string $financingType): void
    {
        $this->financingType = $financingType;
    }

    /**
     * Getter function for financingType
     *
     * @return ?string
     */
    public function getFinancingType(): ?string
    {
        return $this->financingType;
    }
    /**
     * Builder function for plan
     *
     * @param string $plan
     *
     * @return $this
     */
    public function plan(?string $plan): self
    {
        $this->setPlan($plan);

        return $this;
    }

    /**
     * Setter function for plan
     *
     * @param string $plan
     *
     * @return void
     */
    public function setPlan(?string $plan): void
    {
        $this->plan = $plan;
    }

    /**
     * Getter function for plan
     *
     * @return ?string
     */
    public function getPlan(): ?string
    {
        return $this->plan;
    }
    /**
     * Builder function for gracePeriod
     *
     * @param int $gracePeriod
     *
     * @return $this
     */
    public function gracePeriod(?int $gracePeriod): self
    {
        $this->setGracePeriod($gracePeriod);

        return $this;
    }

    /**
     * Setter function for gracePeriod
     *
     * @param int $gracePeriod
     *
     * @return void
     */
    public function setGracePeriod(?int $gracePeriod): void
    {
        $this->gracePeriod = $gracePeriod;
    }

    /**
     * Getter function for gracePeriod
     *
     * @return ?int
     */
    public function getGracePeriod(): ?int
    {
        return $this->gracePeriod;
    }
    /**
     * Builder function for term
     *
     * @param int $term
     *
     * @return $this
     */
    public function term(?int $term): self
    {
        $this->setTerm($term);

        return $this;
    }

    /**
     * Setter function for term
     *
     * @param int $term
     *
     * @return void
     */
    public function setTerm(?int $term): void
    {
        $this->term = $term;
    }

    /**
     * Getter function for term
     *
     * @return ?int
     */
    public function getTerm(): ?int
    {
        return $this->term;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class AccordD {" . PHP_EOL
            . "    financingType: " . $this->toIndentedString($this->financingType ?? null) . PHP_EOL
            . "    plan: " . $this->toIndentedString($this->plan ?? null) . PHP_EOL
            . "    gracePeriod: " . $this->toIndentedString($this->gracePeriod ?? null) . PHP_EOL
            . "    term: " . $this->toIndentedString($this->term ?? null) . PHP_EOL
            . "}";
    }
}
