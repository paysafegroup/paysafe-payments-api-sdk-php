<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is the card's expiry date.
 * <ul>
 *   <li>
 *     <b>month:</b> This is the card expiry month. <br />
 *     Example: 12
 *   </li>
 *   <li>
 *     <b>year:</b> This is the card expiry year. <br />
 *     Example: 2024
 *   </li>
 * </ul>
 */
class CardExpiry extends BaseModel
{
    private $month;
    private $year;


    /**
     * @param mixed $month
     *
     * @return void
     */
    public function setMonth($month): void
    {
        $this->month = $month;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $month
     *
     * @return $this
     */
    public function month($month): self
    {
        $this->setMonth($month);

        return $this;
    }

    /**
     * @param mixed $year
     *
     * @return void
     */
    public function setYear($year): void
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     *
     * @return $this
     */
    public function year($year): self
    {
        $this->setYear($year);

        return $this;
    }

}
