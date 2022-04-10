<?php


namespace App\Http\Traits;

use App\Enums\GenderEnum;
use App\Enums\SubscriptionStatus;
use App\Enums\UserTypeEnum;
use App\Enums\ValidityPeriodEnum;
use ReflectionClass;

/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 19:11
 */
trait ConstantExport
{
    static function getUserTypes()
    {
        $reflection = new ReflectionClass(UserTypeEnum::class);
        return $reflection->getConstants();
    }

    static function getValidityPeriods()
    {
        $reflection = new ReflectionClass(ValidityPeriodEnum::class);
        return $reflection->getConstants();
    }

    static function getSubscriptionStatus()
    {
        $reflection = new ReflectionClass(SubscriptionStatus::class);
        return $reflection->getConstants();
    }
    static function getGender()
    {
        $reflection = new ReflectionClass(GenderEnum::class);
        return $reflection->getConstants();
    }
}
