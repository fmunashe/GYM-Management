<?php


namespace App\Enums;

use App\Http\Traits\ConstantExport;

/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 19:06
 */
class UserTypeEnum extends Enum
{
    const ADMIN = 'is_admin';
    const MEMBER = 'is_member';
    const TRAINER = 'is_trainer';
    use ConstantExport;
}
