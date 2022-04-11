<?php

namespace App\Http\Middleware;

use App\Enums\SubscriptionStatus;
use App\Enums\UserTypeEnum;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class ExpirePayments
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->subscription_status == SubscriptionStatus::IN_ACTIVE) {
            return redirect()->route('payments')->with('error', "You don't have an active subscription. Please make a payment to activate your profile");
        }
        if (auth()->user()->subscription_status == SubscriptionStatus::ACTIVE) {
            $latest_payment = Payment::query()->where('user_id', auth()->user()->id)->latest()->first();
            if (!$latest_payment) {
                return redirect()->route('payments')->with('error', "You don't have an active subscription. Please make a payment to activate your profile");
            }
            if (($latest_payment->payment_expiry_date) < Carbon::now()) {
                User::query()->where('id', $latest_payment->user_id)->update([
                    'subscription_status' => SubscriptionStatus::IN_ACTIVE
                ]);
                return redirect()->route('payments')->with('error', "Your latest subscription expired on ".$latest_payment->payment_expiry_date." . Please make a payment to activate your profile");
            }
            return $next($request);
        }
    }
}
