<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * A grouping of four separate trip segments. Each leg contains detailed itinerary information.
 */
class AirlineTripLegs extends BaseModel
{
    private ?AirlineLeg $leg1 = null;
    private ?AirlineLeg $leg2 = null;
    private ?AirlineLeg $leg3 = null;
    private ?AirlineLeg $leg4 = null;

    /**
     * Builder function for leg1
     *
     * @param AirlineLeg $leg1
     *
     * @return $this
     */
    public function leg1(?AirlineLeg $leg1): self
    {
        $this->setLeg1($leg1);

        return $this;
    }

    /**
     * Setter function for leg1
     *
     * @param AirlineLeg $leg1
     *
     * @return void
     */
    public function setLeg1(?AirlineLeg $leg1): void
    {
        $this->leg1 = $leg1;
    }

    /**
     * Getter function for leg1
     *
     * @return ?AirlineLeg
     */
    public function getLeg1(): ?AirlineLeg
    {
        return $this->leg1;
    }
    /**
     * Builder function for leg2
     *
     * @param AirlineLeg $leg2
     *
     * @return $this
     */
    public function leg2(?AirlineLeg $leg2): self
    {
        $this->setLeg2($leg2);

        return $this;
    }

    /**
     * Setter function for leg2
     *
     * @param AirlineLeg $leg2
     *
     * @return void
     */
    public function setLeg2(?AirlineLeg $leg2): void
    {
        $this->leg2 = $leg2;
    }

    /**
     * Getter function for leg2
     *
     * @return ?AirlineLeg
     */
    public function getLeg2(): ?AirlineLeg
    {
        return $this->leg2;
    }
    /**
     * Builder function for leg3
     *
     * @param AirlineLeg $leg3
     *
     * @return $this
     */
    public function leg3(?AirlineLeg $leg3): self
    {
        $this->setLeg3($leg3);

        return $this;
    }

    /**
     * Setter function for leg3
     *
     * @param AirlineLeg $leg3
     *
     * @return void
     */
    public function setLeg3(?AirlineLeg $leg3): void
    {
        $this->leg3 = $leg3;
    }

    /**
     * Getter function for leg3
     *
     * @return ?AirlineLeg
     */
    public function getLeg3(): ?AirlineLeg
    {
        return $this->leg3;
    }
    /**
     * Builder function for leg4
     *
     * @param AirlineLeg $leg4
     *
     * @return $this
     */
    public function leg4(?AirlineLeg $leg4): self
    {
        $this->setLeg4($leg4);

        return $this;
    }

    /**
     * Setter function for leg4
     *
     * @param AirlineLeg $leg4
     *
     * @return void
     */
    public function setLeg4(?AirlineLeg $leg4): void
    {
        $this->leg4 = $leg4;
    }

    /**
     * Getter function for leg4
     *
     * @return ?AirlineLeg
     */
    public function getLeg4(): ?AirlineLeg
    {
        return $this->leg4;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class AirlineTripLegs {" . PHP_EOL
            . "    leg1: " . $this->toIndentedString($this->leg1 ?? null) . PHP_EOL
            . "    leg2: " . $this->toIndentedString($this->leg2 ?? null) . PHP_EOL
            . "    leg3: " . $this->toIndentedString($this->leg3 ?? null) . PHP_EOL
            . "    leg4: " . $this->toIndentedString($this->leg4 ?? null) . PHP_EOL
            . "}";
    }
}
