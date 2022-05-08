<?php


namespace App\Http\Traits;

use App\Enums\SubscriptionStatus;
use App\Enums\UserTypeEnum;
use App\Models\Club;
use App\Models\HealthStatus;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\User;

/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 30/4/2022
 * Time: 19:00
 */
trait Analytics
{

    public function usersPerClub()
    {
        if (auth()->user()->club->name == "WarmFit" && auth()->user()->user_type == UserTypeEnum::ADMIN) {
            return Club::query()
                ->join('users', 'users.club_id', '=', 'clubs.id')
                ->selectRaw('COUNT(users.id) as value, clubs.name as Club')
                ->groupBy('clubs.name')
                ->get();
        }
        return Club::query()
            ->join('users', 'users.club_id', '=', 'clubs.id')
            ->selectRaw('COUNT(users.id) as value, clubs.name as Club')
            ->where('clubs.id', '=', auth()->user()->club_id)
            ->groupBy('clubs.name')
            ->get();
    }


    public function registrationsPerMonth()
    {
        return User::query()
            ->selectRaw('DATE_FORMAT(created_at,"%M-%Y") as period, Count(id) as value')
            ->where('club_id', '=', auth()->user()->club_id)
            ->groupBy('period')
            ->get();
    }

    public function subscriptions()
    {
        return User::query()
            ->selectRaw('subscription_status as Subscription, Count(id) as value')
            ->where('club_id', '=', auth()->user()->club_id)
            ->groupBy('subscription_status')
            ->get();
    }

    public function payments()
    {
        if (auth()->user()->club->name == "WarmFit" && auth()->user()->user_type == UserTypeEnum::ADMIN) {
            return Club::query()
                ->join('users', 'users.club_id', 'clubs.id')
                ->join('payments', 'payments.user_id', 'users.id')
                ->selectRaw('clubs.name as club, Count(payments.id) as value')
                ->where('payments.payment_status', '=', SubscriptionStatus::APPROVED)
                ->groupBy('clubs.name')
                ->get();
        }
        return Club::query()
            ->join('users', 'users.club_id', 'clubs.id')
            ->join('payments', 'payments.user_id', 'users.id')
            ->selectRaw('clubs.name as club, Count(payments.id) as value')
            ->where('payments.payment_status', '=', SubscriptionStatus::APPROVED)
            ->where('clubs.id', '=', auth()->user()->club_id)
            ->groupBy('clubs.name')
            ->get();
    }

    public function plans()
    {
        return Plan::query()
            ->join('payments', 'payments.plan_id', 'plans.id')
            ->selectRaw('plans.plan_name as plan_name, Count(payments.id) as value')
            ->where('payments.payment_status', '=', SubscriptionStatus::APPROVED)
            ->where('plans.club_id', '=', auth()->user()->club_id)
            ->groupBy('plans.plan_name')
            ->get();
    }

    public function weightProgress()
    {
        return HealthStatus::query()
            ->selectRaw('DATE_FORMAT(created_at,"%d-%M-%Y") as period, weight as value')
            ->where('user_id', '=', auth()->user()->id)
            ->groupBy(['period','weight'])
            ->get();
    }

    public function totalPayments()
    {
        return Payment::query()
            ->join('plans', 'payments.plan_id', 'plans.id')
            ->selectRaw('DATE_FORMAT(payments.created_at,"%d-%M-%Y") as period, count(payments.id) as value,plans.plan_name as Plan')
            ->where('payments.user_id', '=', auth()->user()->id)
            ->where('payments.payment_status', '=', SubscriptionStatus::APPROVED)
            ->groupBy(['period','Plan'])
            ->get();
    }




}
