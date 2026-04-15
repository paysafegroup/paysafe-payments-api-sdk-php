<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common;

use Paysafe\PhpSdk\Model\BaseModel;

class Meta extends BaseModel
{
    private int $numberOfRecords;
    private int $limit;
    private int $page;

    /**
     * @param int $numberOfRecords
     * @return $this
     */
    public function numberOfRecords(int $numberOfRecords): self
    {
        $this->setNumberOfRecords($numberOfRecords);
        return $this;
    }
    /**
     * @param int $numberOfRecords
     *
     * @return void
     */
    public function setNumberOfRecords(int $numberOfRecords): void
    {
        $this->numberOfRecords = $numberOfRecords;
    }
    /**
     * @return int
     */
    public function getNumberOfRecords(): int
    {
        return $this->numberOfRecords;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit): self
    {
        $this->setLimit($limit);
        return $this;
    }
    /**
     * @param int $limit
     *
     * @return void
     */
    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }
    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function page(int $page): self
    {
        $this->setPage($page);
        return $this;
    }
    /**
     * @param int $page
     *
     * @return void
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }
    /**
     * @return int
     */
    public function getPage(): int
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
        return "class Meta {\n"
            . "    numberOfRecords: " . $this->toIndentedString($this->numberOfRecords) . "\n"
            . "    limit: " . $this->toIndentedString($this->limit) . "\n"
            . "    page: " . $this->toIndentedString($this->page) . "\n"
            . "}";
    }
}
