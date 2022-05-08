<?php

namespace App\Http\Controllers;

use App\Charts\Registrations;
use App\Charts\ClubsChart;
use App\Charts\SalesPerMonth;
use App\Enums\SubscriptionStatus;
use App\Enums\UserTypeEnum;
use App\Models\Club;
use App\Models\Payment;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_payments = Payment::query()->where('user_id', '=', auth()->user()->id)
            ->where('payment_status', '=', SubscriptionStatus::APPROVED)
            ->count();

        $subscription_details = Payment::query()->where('user_id', '=', auth()->user()->id)
            ->where('payment_status', '=', SubscriptionStatus::APPROVED)
            ->latest()
            ->first();

        $this->expireSubscriptions();

        return view('home', compact('total_payments', 'subscription_details'));
    }

    public function adminHome(ClubsChart $clubsChart, Registrations $registrations, SalesPerMonth $sales)
    {

        $registrations = $registrations->build();
        $clubs = $clubsChart->build();
        $sales = $sales->build();
        $this->expireSubscriptions();

        return view('adminHome', compact('registrations', 'clubs', 'sales'));
    }

    public function expireSubscriptions()
    {

        $users = User::query()->where('subscription_status', '=', SubscriptionStatus::ACTIVE)->get();
        foreach ($users as $user) {
            $payment = Payment::query()
                ->where('user_id', '=', $user->id)
                ->where('payment_status', '=', SubscriptionStatus::APPROVED)
                ->latest()->first();

            if ($payment==null && $user->user_type != UserTypeEnum::ADMIN) {
                User::query()->where('id', $user->id)->update([
                    'subscription_status' => SubscriptionStatus::IN_ACTIVE
                ]);
            } if (($payment!=null && $payment->payment_expiry_date) < Carbon::now() && $user->user_type != UserTypeEnum::ADMIN) {
                User::query()->where('id', '=', $user->id)->update([
                    'subscription_status' => SubscriptionStatus::IN_ACTIVE
                ]);
            }
        }
    }

}
