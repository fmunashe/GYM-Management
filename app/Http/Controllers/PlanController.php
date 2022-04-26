<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Models\Club;
use App\Models\Plan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::query()->latest()->paginate(10);
        $clubs =Club::all();
        return view('plans.index', compact('plans','clubs'));
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
    public function store(PlanRequest $request)
    {
        Plan::query()->create($request->all());
        Alert::success('Membership', 'Membership Plan Successfully Created');
        return redirect()->route('plans');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Plan $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Plan $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Plan $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $plan->update($request->all());
        Alert::success('Membership', 'Membership Plan Successfully Updated');
        return redirect()->route('plans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Plan $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        Alert::success('Membership', 'Membership Plan Successfully Deleted');
        return redirect()->route('plans');
    }
}
