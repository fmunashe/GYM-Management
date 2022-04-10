<?php


namespace App\Enums;

use App\Http\Traits\ConstantExport;

/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 6/4/2022
 * Time: 13:53
 */
class ValidityPeriodEnum extends Enum
{
    const SEVEN_DAYS = 7;
    const FOURTEEN_DAYS = 14;
    const THIRTY_DAYS = 30;
    use ConstantExport;
}
