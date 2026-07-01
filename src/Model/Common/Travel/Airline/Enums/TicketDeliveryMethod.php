<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline\Enums;

/**
 * Way of delivering the ticket.
 */
class TicketDeliveryMethod
{
    const E_TICKET = 'E_TICKET';
    const CITY_TICKET_OFFICE = 'CITY_TICKET_OFFICE';
    const AIRPORT_TICKET_OFFICE = 'AIRPORT_TICKET_OFFICE';
    const TICKET_BY_MAIL = 'TICKET_BY_MAIL';
    const TICKET_ON_DEPARTURE = 'TICKET_ON_DEPARTURE';
}
