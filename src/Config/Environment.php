<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Config;

/**
 * Defines the environment in use. Possible values:
 * <ul>
 * <li> LIVE environment, located on <i>https://api.paysafe.com</i>
 * <li> TEST environment, located on  <i>https://api.test.paysafe.com</i>
 * </ul>
 */
class Environment
{

    /**
     * The live environment, located on <i>https://api.paysafe.com</i>.
     */
    const LIVE = 'LIVE';

    /**
     * The test environment, located on <i>https://api.test.paysafe.com</i>.
     */
    const TEST = 'TEST';
}
