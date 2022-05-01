<?php


namespace App\Http\Traits;

use App\Models\Club;
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
        return Club::query()
            ->join('users', 'users.club_id', '=', 'clubs.id')
            ->selectRaw('COUNT(users.id) as value, clubs.name as Club')
            ->groupBy('clubs.name')
            ->get();
    }


    public function registrationsPerMonth()
    {
        return User::query()
            ->selectRaw('DATE_FORMAT(created_at,"%M-%Y") as period, Count(id) as value')
            ->groupBy('period')
            ->get();
    }

    public function subscriptions()
    {
        return User::query()
            ->selectRaw('subscription_status as Subscription, Count(id) as value')
            ->groupBy('subscription_status')
            ->get();
    }

    public function payments()
    {
       return Club::query()
            ->join('users','users.club_id','clubs.id')
            ->join('payments','payments.user_id','users.id')
            ->selectRaw('clubs.name as club, Count(payments.id) as value')
            ->groupBy('clubs.name')
            ->get();
    }

    public function plans()
    {
       return Plan::query()
            ->join('payments','payments.plan_id','plans.id')
            ->selectRaw('plans.plan_name as plan_name, Count(payments.id) as value')
            ->groupBy('plans.plan_name')
            ->get();
    }
}
