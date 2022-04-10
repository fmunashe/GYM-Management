<?php

namespace App\Http\Controllers;

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
        $trainers=User::query()->where('user_type',UserTypeEnum::TRAINER)->get();
        return view('health_status.index', compact('statuses','trainers'));
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HealthStatus::query()->create($request->all());
        Alert::success('Health Status', 'Health Status Successfully Recorded');
        return redirect()->route('health-status');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\HealthStatus $healthStatus
     * @return \Illuminate\Http\Response
     */
    public function show(HealthStatus $healthStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\HealthStatus $healthStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthStatus $healthStatus)
    {
        //
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
        $healthStatus->delete();
        Alert::success('Health Status', 'Health Status Record Successfully Deleted');
        return redirect()->route('health-status');
    }
}
