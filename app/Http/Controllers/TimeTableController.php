<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\TimeTable;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $routines = TimeTable::query()->with('trainer')->latest()->paginate(10);
        $trainers = User::query()->where('user_type', '=', UserTypeEnum::TRAINER)->get();
        return view('routines.index', compact('routines', 'trainers'));
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
        TimeTable::query()->create($request->all());
        Alert::success('Training Routine', 'Training Routine Successfully Created');
        return redirect()->route('routines');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TimeTable $timeTable
     * @return \Illuminate\Http\Response
     */
    public function show(TimeTable $timeTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TimeTable $timeTable
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeTable $timeTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TimeTable $timeTable
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, TimeTable $routine)
    {
        $routine->update($request->all());
        Alert::success('Training Routine', 'Training Routine Successfully Updated');
        return redirect()->route('routines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TimeTable $timeTable
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(TimeTable $routine)
    {
        $routine->delete();
        Alert::success('Training Routine', 'Training Routine Successfully Deleted');
        return redirect()->route('routines');
    }
}
