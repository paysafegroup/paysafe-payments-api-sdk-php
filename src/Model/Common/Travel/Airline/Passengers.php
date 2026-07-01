<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * A grouping of up to ten airline travel passengers.
 */
class Passengers extends BaseModel
{
    private ?Passenger $passenger1 = null;
    private ?Passenger $passenger2 = null;
    private ?Passenger $passenger3 = null;
    private ?Passenger $passenger4 = null;
    private ?Passenger $passenger5 = null;
    private ?Passenger $passenger6 = null;
    private ?Passenger $passenger7 = null;
    private ?Passenger $passenger8 = null;
    private ?Passenger $passenger9 = null;
    private ?Passenger $passenger10 = null;

    /**
     * Builder function for passenger1
     *
     * @param Passenger $passenger1
     *
     * @return $this
     */
    public function passenger1(?Passenger $passenger1): self
    {
        $this->setPassenger1($passenger1);

        return $this;
    }

    /**
     * Setter function for passenger1
     *
     * @param Passenger $passenger1
     *
     * @return void
     */
    public function setPassenger1(?Passenger $passenger1): void
    {
        $this->passenger1 = $passenger1;
    }

    /**
     * Getter function for passenger1
     *
     * @return ?Passenger
     */
    public function getPassenger1(): ?Passenger
    {
        return $this->passenger1;
    }
    /**
     * Builder function for passenger2
     *
     * @param Passenger $passenger2
     *
     * @return $this
     */
    public function passenger2(?Passenger $passenger2): self
    {
        $this->setPassenger2($passenger2);

        return $this;
    }

    /**
     * Setter function for passenger2
     *
     * @param Passenger $passenger2
     *
     * @return void
     */
    public function setPassenger2(?Passenger $passenger2): void
    {
        $this->passenger2 = $passenger2;
    }

    /**
     * Getter function for passenger2
     *
     * @return ?Passenger
     */
    public function getPassenger2(): ?Passenger
    {
        return $this->passenger2;
    }
    /**
     * Builder function for passenger3
     *
     * @param Passenger $passenger3
     *
     * @return $this
     */
    public function passenger3(?Passenger $passenger3): self
    {
        $this->setPassenger3($passenger3);

        return $this;
    }

    /**
     * Setter function for passenger3
     *
     * @param Passenger $passenger3
     *
     * @return void
     */
    public function setPassenger3(?Passenger $passenger3): void
    {
        $this->passenger3 = $passenger3;
    }

    /**
     * Getter function for passenger3
     *
     * @return ?Passenger
     */
    public function getPassenger3(): ?Passenger
    {
        return $this->passenger3;
    }
    /**
     * Builder function for passenger4
     *
     * @param Passenger $passenger4
     *
     * @return $this
     */
    public function passenger4(?Passenger $passenger4): self
    {
        $this->setPassenger4($passenger4);

        return $this;
    }

    /**
     * Setter function for passenger4
     *
     * @param Passenger $passenger4
     *
     * @return void
     */
    public function setPassenger4(?Passenger $passenger4): void
    {
        $this->passenger4 = $passenger4;
    }

    /**
     * Getter function for passenger4
     *
     * @return ?Passenger
     */
    public function getPassenger4(): ?Passenger
    {
        return $this->passenger4;
    }
    /**
     * Builder function for passenger5
     *
     * @param Passenger $passenger5
     *
     * @return $this
     */
    public function passenger5(?Passenger $passenger5): self
    {
        $this->setPassenger5($passenger5);

        return $this;
    }

    /**
     * Setter function for passenger5
     *
     * @param Passenger $passenger5
     *
     * @return void
     */
    public function setPassenger5(?Passenger $passenger5): void
    {
        $this->passenger5 = $passenger5;
    }

    /**
     * Getter function for passenger5
     *
     * @return ?Passenger
     */
    public function getPassenger5(): ?Passenger
    {
        return $this->passenger5;
    }
    /**
     * Builder function for passenger6
     *
     * @param Passenger $passenger6
     *
     * @return $this
     */
    public function passenger6(?Passenger $passenger6): self
    {
        $this->setPassenger6($passenger6);

        return $this;
    }

    /**
     * Setter function for passenger6
     *
     * @param Passenger $passenger6
     *
     * @return void
     */
    public function setPassenger6(?Passenger $passenger6): void
    {
        $this->passenger6 = $passenger6;
    }

    /**
     * Getter function for passenger6
     *
     * @return ?Passenger
     */
    public function getPassenger6(): ?Passenger
    {
        return $this->passenger6;
    }
    /**
     * Builder function for passenger7
     *
     * @param Passenger $passenger7
     *
     * @return $this
     */
    public function passenger7(?Passenger $passenger7): self
    {
        $this->setPassenger7($passenger7);

        return $this;
    }

    /**
     * Setter function for passenger7
     *
     * @param Passenger $passenger7
     *
     * @return void
     */
    public function setPassenger7(?Passenger $passenger7): void
    {
        $this->passenger7 = $passenger7;
    }

    /**
     * Getter function for passenger7
     *
     * @return ?Passenger
     */
    public function getPassenger7(): ?Passenger
    {
        return $this->passenger7;
    }
    /**
     * Builder function for passenger8
     *
     * @param Passenger $passenger8
     *
     * @return $this
     */
    public function passenger8(?Passenger $passenger8): self
    {
        $this->setPassenger8($passenger8);

        return $this;
    }

    /**
     * Setter function for passenger8
     *
     * @param Passenger $passenger8
     *
     * @return void
     */
    public function setPassenger8(?Passenger $passenger8): void
    {
        $this->passenger8 = $passenger8;
    }

    /**
     * Getter function for passenger8
     *
     * @return ?Passenger
     */
    public function getPassenger8(): ?Passenger
    {
        return $this->passenger8;
    }
    /**
     * Builder function for passenger9
     *
     * @param Passenger $passenger9
     *
     * @return $this
     */
    public function passenger9(?Passenger $passenger9): self
    {
        $this->setPassenger9($passenger9);

        return $this;
    }

    /**
     * Setter function for passenger9
     *
     * @param Passenger $passenger9
     *
     * @return void
     */
    public function setPassenger9(?Passenger $passenger9): void
    {
        $this->passenger9 = $passenger9;
    }

    /**
     * Getter function for passenger9
     *
     * @return ?Passenger
     */
    public function getPassenger9(): ?Passenger
    {
        return $this->passenger9;
    }
    /**
     * Builder function for passenger10
     *
     * @param Passenger $passenger10
     *
     * @return $this
     */
    public function passenger10(?Passenger $passenger10): self
    {
        $this->setPassenger10($passenger10);

        return $this;
    }

    /**
     * Setter function for passenger10
     *
     * @param Passenger $passenger10
     *
     * @return void
     */
    public function setPassenger10(?Passenger $passenger10): void
    {
        $this->passenger10 = $passenger10;
    }

    /**
     * Getter function for passenger10
     *
     * @return ?Passenger
     */
    public function getPassenger10(): ?Passenger
    {
        return $this->passenger10;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Passengers {" . PHP_EOL
            . "    passenger1: " . $this->toIndentedString($this->passenger1 ?? null) . PHP_EOL
            . "    passenger2: " . $this->toIndentedString($this->passenger2 ?? null) . PHP_EOL
            . "    passenger3: " . $this->toIndentedString($this->passenger3 ?? null) . PHP_EOL
            . "    passenger4: " . $this->toIndentedString($this->passenger4 ?? null) . PHP_EOL
            . "    passenger5: " . $this->toIndentedString($this->passenger5 ?? null) . PHP_EOL
            . "    passenger6: " . $this->toIndentedString($this->passenger6 ?? null) . PHP_EOL
            . "    passenger7: " . $this->toIndentedString($this->passenger7 ?? null) . PHP_EOL
            . "    passenger8: " . $this->toIndentedString($this->passenger8 ?? null) . PHP_EOL
            . "    passenger9: " . $this->toIndentedString($this->passenger9 ?? null) . PHP_EOL
            . "    passenger10: " . $this->toIndentedString($this->passenger10 ?? null) . PHP_EOL
            . "}";
    }
}
