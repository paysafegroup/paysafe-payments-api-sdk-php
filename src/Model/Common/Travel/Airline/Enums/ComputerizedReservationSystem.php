<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline\Enums;

/**
 * Indicates the computerized reservation system used to make the reservation and purchase the ticket.
 * <p>For tickets purchased in Germany, this field should one of these codes:</p>
 * <ul>
 *   <li>STRT = Start</li>
 *   <li>PARS = TWA</li>
 *   <li>DATS = Delta</li>
 *   <li>SABR = Sabre</li>
 *   <li>DALA = Covia-Apollo</li>
 *   <li>BLAN = Dr. Blank</li>
 *   <li>DERD = DER</li>
 *   <li>TUID = TUI</li>
 * </ul>
 * <b>Note:</b> Required only if the ticket is purchased in Germany. Otherwise it can be omitted.
 */
class ComputerizedReservationSystem
{
	const STRT = "STRT";
	const PARS = "PARS";
	const DATS = "DATS";
	const SABR = "SABR";
	const DALA = "DALA";
	const BLAN = "BLAN";
	const DERD = "DERD";
	const TUID = "TUID";


}
