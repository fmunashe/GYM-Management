<?php


namespace App\Enums;

use App\Http\Traits\ConstantExport;

/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 7/4/2022
 * Time: 20:20
 */
class GenderEnum extends Enum
{
    const MALE = 'Male';
    const FEMALE = 'Female';
    const OTHER = 'Other';
    use ConstantExport;
}
