<?php


namespace App\Enums;

use App\Http\Traits\ConstantExport;

/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 6/4/2022
 * Time: 15:23
 */
class SubscriptionStatus extends Enum
{
    const ACTIVE = 'active';
    const IN_ACTIVE = 'in_active';
    const PENDING = 'Pending';
    const APPROVED = 'Approved';
    const REJECTED = 'Rejected';

    use ConstantExport;
}
