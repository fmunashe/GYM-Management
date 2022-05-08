<?php

namespace App\Http\Controllers;

use App\Enums\SubscriptionStatus;
use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;

class TrainerController extends Controller
{

    public function index()
    {
        $users = User::query()->with(['address', 'healthStatus', 'club', 'payment'])->where('individual_trainer', '=', 'Yes')->latest()->paginate('10');

        $clubs = Club::all();

        return view('individual_trainers.index', compact('users', 'clubs'));
    }

    public function expiredSubscriptions()
    {
        $users = User::query()->with(['address', 'healthStatus', 'club', 'payment'])
            ->where('club_id', auth()->user()->club->id)
            ->where('subscription_status','=',SubscriptionStatus::IN_ACTIVE)
            ->latest()
            ->paginate('10');

        $clubs = Club::all();

        return view('individual_trainers.expired_subs', compact('users', 'clubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
