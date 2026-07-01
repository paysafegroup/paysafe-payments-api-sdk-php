<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\OriginalCredit\Enums;

/**
 * <p>   The <b>transactionIntent</b> property is used to identify the intent of the Original Credit requests. This field is mandatory for Visa card cross-border transactions sent to and received in Argentina, Bangladesh, Chile, Colombia, Egypt, India, and Saudi Arabia. The value of the <b>transactionIntent</b> in the original credit request shows if the transaction is crypto related. </p> <ul>   <li>It is required only if the use cases explained below are applicable for the merchants or the default behavior is not acceptable for them.</li>   <li>The merchant needs to add in the request <b>transactionIntent</b> property value as shown in the example below.</li> </ul> <p><b>Use cases and applicable valid enum <code>transactionIntent</code> options for Original Credits:</b></p> <ul>   <li>     <b>OTHER</b>     <ul>       <li>Use case: Valid only for Paysafe acquiring.</li>       <li>MCC values: ANY.</li>     </ul>   </li> </ul> <p><b>Expected errors related to invalid <code>transactionIntent</code> values:</b></p> <ul>   <li>If you send <code>transactionIntent</code> in the request with value not applicable for your MCC, the transaction will be declined with error 3072.</li>   <li>If you send <code>transactionIntent</code> in the request with value applicable for your MCC, but not for your VISA direct configuration, the transaction will be declined with error 3069.</li>   <li>If you send <code>transactionIntent</code> with value different than the options above, the transaction will be declined with error 5068.</li> </ul>
 */
class TransactionIntentOriginalCredit
{
    const OTHER = 'OTHER';
}
