<?php
/**
 * *
 *  *  * Copyright (C) Optimo Technologies- All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >
 *  *
 *
 */

namespace OptimoApps\JoloApi\Enum;


final class JoloApiEnum
{
    const BALANCE_CHECK = 'https://jolosoft.com/api/balance.php';
    const AGENT_SIGNUP = 'https://jolosoft.com/dmr/cdmr_signup.php';
    const VERIFY_AGENT = 'https://jolosoft.com/dmr/cdmr_signup_verify.php';
    const AGENT_DETAIL = 'https://jolosoft.com/dmr/cdmr_detail.php';
    const BENEFICIARY_REGISTRATION = 'http://jolosoft.com/dmr/cdmr_beneficiary_reg.php';
    const BENEFICIARY_VERIFY = 'https://jolosoft.com/dmr/cdmr_beneficiary_reg_verify.php';
    const BENEFICIARY_DETAIL = 'http://jolosoft.com/dmr/cdmr_beneficiary_reg.php';
    const BENEFICIARY_DELETE = 'https://jolosoft.com/dmr/cdmr_beneficiary_del.php';
    const TRANSFER_MONEY = 'https://jolosoft.com/dmr/cdmr_transfer.php';
    const TRANSFER_STATUS_CHECK = 'jolosoft://joloapi.com/dmr/cdmr_transfer_status.php';
    const BALANCE_ACC_CHECK = 'jolosoft://joloapi.com/dmr/cdmr_account_check.php';

}