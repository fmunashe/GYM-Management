<?php

namespace App\Http\Controllers;

use App\Enums\SubscriptionStatus;
use App\Enums\UserTypeEnum;
use App\Enums\ValidityPeriodEnum;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Paynow\Payments\Paynow;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

        $payments = Payment::query()->with(['user', 'plan'])->whereHas('user',function ($query){
            $query->where('club_id', auth()->user()->club->id);
        })->latest()->paginate(10);

        if (auth()->user()->club->name == "WarmFit") {
            $payments = Payment::query()->with(['user', 'plan'])->latest()->paginate(10);
        }
        $plans = Plan::all();
        return view('payments.index', compact('payments', 'plans'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user_id = $request->input('user_id');
        $plan = json_decode($request->input('plan_id'));
        $expiry = $this->calculateExpiryDate($plan);

        $check_payment = Payment::query()->where('user_id', $user_id)->latest()->first();
        if ($check_payment) {
            if ($check_payment->payment_expiry_date > Carbon::now()) {
                Alert::error('Payment Status Error', 'Payment could not be made. Client ' . $check_payment->user->name . ' has an active ' . $check_payment->plan->plan_name . ' subscription which expires on ' . $check_payment->payment_expiry_date)->autoClose(false);;
                return redirect()->route('payments');
            }
        }

        Payment::query()->create([
            'plan_id' => $plan->id,
            'user_id' => $request->input('user_id'),
            'payment_date' => Carbon::now(),
            'payment_expiry_date' => $expiry
        ]);

        if ($expiry > Carbon::now()) {
            User::query()->where('id', $user_id)->update([
                'subscription_status' => SubscriptionStatus::ACTIVE
            ]);
        }

        Alert::success('Payment Status', 'Payment Successfully Recorded');
        return redirect()->route('payments');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Payment $payment)
    {
        $user_id = $request->input('user_id');
        $plan = json_decode($request->input('plan_id'));
        $expiry = $this->calculateExpiryDate($plan);
        $payment->update([
            'plan_id' => $plan->id,
            'user_id' => $user_id,
            'payment_expiry_date' => $expiry
        ]);

        if ($expiry > Carbon::now()) {
            User::query()->where('id', $user_id)->update([
                'subscription_status' => SubscriptionStatus::ACTIVE
            ]);
        }

        Alert::success('Payment Status', 'Payment Successfully Updated');
        return redirect()->route('payments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Payment $payment)
    {
        if ($payment->user_id != auth()->user()->id && auth()->user()->user_type != UserTypeEnum::ADMIN) {

            Alert::error('Payment Status', 'You have no permission to delete this record');
            return redirect()->route('health-status');
        }
        if ($payment->payment_expiry_date > Carbon::now()) {
            User::query()->where('id', $payment->user_id)->update([
                'subscription_status' => SubscriptionStatus::IN_ACTIVE
            ]);
        }

        $payment->delete();
        Alert::success('Payment Status', 'Payment Successfully Deleted');
        return redirect()->route('payments');
    }

    public function searchClient($search)
    {
        $users = User::query()->where('name', 'like', '%' . $search . '%')->where('club_id', auth()->user()->club->id)->get();
        if (auth()->user()->club->name == 'WarmFit') {
            $users = User::query()->where('name', 'like', '%' . $search . '%')->get();
        }
        return response()->json(['users' => $users]);
    }

    public function calculateExpiryDate($plan)
    {
        if ($plan->validity_period == ValidityPeriodEnum::SEVEN_DAYS) {
            return Carbon::now()->addDays(ValidityPeriodEnum::SEVEN_DAYS);
        }
        if ($plan->validity_period == ValidityPeriodEnum::FOURTEEN_DAYS) {
            return Carbon::now()->addDays(ValidityPeriodEnum::FOURTEEN_DAYS);
        }
        if ($plan->validity_period == ValidityPeriodEnum::THIRTY_DAYS) {
            return Carbon::now()->addMonth();
        }
        return Carbon::now()->addDays(ValidityPeriodEnum::SEVEN_DAYS);
    }
}
