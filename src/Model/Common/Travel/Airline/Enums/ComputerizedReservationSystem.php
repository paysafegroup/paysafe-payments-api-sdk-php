<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline\Enums;

/**
 * Indicates the computerized reservation system used to make the reservation and purchase the ticket. Required only if the ticket is purchased in Germany
 */
class ComputerizedReservationSystem
{
    const STRT = 'STRT';
    const PARS = 'PARS';
    const DATS = 'DATS';
    const SABR = 'SABR';
    const DALA = 'DALA';
    const BLAN = 'BLAN';
    const DERD = 'DERD';
    const TUID = 'TUID';
}
