<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Contains meta info for the pagination APIs
 */
class Meta extends BaseModel
{
    /**
     * This is the number of records returned in the lookup
     */
    private ?int $numberOfRecords = null;
    /**
     * This is the number of records returned per page
     */
    private ?int $limit = null;
    /**
     * This is the page of records on which the lookup starts
     */
    private ?int $page = null;

    /**
     * Builder function for numberOfRecords
     *
     * @param int $numberOfRecords
     *
     * @return $this
     */
    public function numberOfRecords(?int $numberOfRecords): self
    {
        $this->setNumberOfRecords($numberOfRecords);

        return $this;
    }

    /**
     * Setter function for numberOfRecords
     *
     * @param int $numberOfRecords
     *
     * @return void
     */
    public function setNumberOfRecords(?int $numberOfRecords): void
    {
        $this->numberOfRecords = $numberOfRecords;
    }

    /**
     * Getter function for numberOfRecords
     *
     * @return ?int
     */
    public function getNumberOfRecords(): ?int
    {
        return $this->numberOfRecords;
    }
    /**
     * Builder function for limit
     *
     * @param int $limit
     *
     * @return $this
     */
    public function limit(?int $limit): self
    {
        $this->setLimit($limit);

        return $this;
    }

    /**
     * Setter function for limit
     *
     * @param int $limit
     *
     * @return void
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Getter function for limit
     *
     * @return ?int
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }
    /**
     * Builder function for page
     *
     * @param int $page
     *
     * @return $this
     */
    public function page(?int $page): self
    {
        $this->setPage($page);

        return $this;
    }

    /**
     * Setter function for page
     *
     * @param int $page
     *
     * @return void
     */
    public function setPage(?int $page): void
    {
        $this->page = $page;
    }

    /**
     * Getter function for page
     *
     * @return ?int
     */
    public function getPage(): ?int
    {
        return $this->page;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Meta {" . PHP_EOL
            . "    numberOfRecords: " . $this->toIndentedString($this->numberOfRecords ?? null) . PHP_EOL
            . "    limit: " . $this->toIndentedString($this->limit ?? null) . PHP_EOL
            . "    page: " . $this->toIndentedString($this->page ?? null) . PHP_EOL
            . "}";
    }
}
