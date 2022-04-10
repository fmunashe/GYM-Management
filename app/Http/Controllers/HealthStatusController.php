<?php

namespace App\Http\Controllers;

use App\Enums\SubscriptionStatus;
use App\Enums\UserTypeEnum;
use App\Models\HealthStatus;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HealthStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = HealthStatus::query()->latest()->paginate(10);
        $trainers = User::query()->where('user_type', UserTypeEnum::TRAINER)->get();
        return view('health_status.index', compact('statuses', 'trainers'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = User::query()->where('id', $request->input('user_id'))->first();

        if ($client->subscription_status != SubscriptionStatus::ACTIVE) {
            Alert::error('Health Status Error', 'You need to have an active subscription to perform this action. Please make a payment to activate your subscription.')->autoClose(false);
            return redirect()->route('health-status');
        }

        HealthStatus::query()->create($request->all());
        Alert::success('Health Status', 'Health Status Successfully Recorded');
        return redirect()->route('health-status');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HealthStatus $healthStatus
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, HealthStatus $healthStatus)
    {
        if ($healthStatus->user_id != auth()->user()->id && auth()->user()->user_type != UserTypeEnum::ADMIN && $healthStatus->trainer_id != auth()->user()->id) {

            Alert::error('Health Status', 'You have no permission to update this record');
            return redirect()->route('health-status');
        }
        $healthStatus->update($request->all());
        Alert::success('Health Status', 'Health Status Successfully Updated');
        return redirect()->route('health-status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\HealthStatus $healthStatus
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(HealthStatus $healthStatus)
    {

        if ($healthStatus->user_id != auth()->user()->id && auth()->user()->user_type != UserTypeEnum::ADMIN && $healthStatus->trainer_id != auth()->user()->id) {

            Alert::error('Health Status', 'You have no permission to delete this record');
            return redirect()->route('health-status');
        }
        $healthStatus->delete();
        Alert::success('Health Status', 'Health Status Record Successfully Deleted');
        return redirect()->route('health-status');
    }
}
