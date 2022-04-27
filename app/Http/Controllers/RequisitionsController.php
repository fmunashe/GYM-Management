<?php

namespace App\Http\Controllers;

use App\Enums\SubscriptionStatus;
use App\Enums\UserTypeEnum;
use App\Http\Requests\RequisitionsRequest;
use App\Models\Club;
use App\Models\Requisition;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class RequisitionsController extends Controller
{
    public function index()
    {
        $requisitions = Requisition::query()->orderBy('club_id')->paginate(10);
        return view('requisitions.index', compact('requisitions'));
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

    public function store(RequisitionsRequest $request)
    {
        $user_id = $request->input('user_id');
        $club_id = $request->input('club_id');

        $exists = Requisition::query()->where('club_id', $club_id)->where('user_id', $user_id)->where('status', SubscriptionStatus::PENDING)->exists();
        if ($exists || auth()->user()->club_id == $club_id) {
            Alert::error('Request to join club denied for ' . auth()->user()->name . '. You have a previous active request to join this club ')->autoClose(false);;
            return redirect()->back();
        }
        Requisition::query()->create($request->all());
        Alert::success('Request successfully submitted for ' . auth()->user()->name . '. check here for status updates on your request')->autoClose(false);;
        return redirect()->route('requisitions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Requisition $requisition
     * @return \Illuminate\Http\Response
     */
    public function show(Requisition $requisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Requisition $requisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisition $requisition)
    {
        //
    }


    public function update(RequisitionsRequest $request, Requisition $requisition)
    {
        if ($requisition->club_id != auth()->user()->club_id) {
            Alert::error('You cannot decide on requisitions that are not meant for your club')->autoClose(false);;
            return redirect()->back();
        }
        if (auth()->user()->user_type != UserTypeEnum::ADMIN) {
            Alert::error('Only Administrators are allowed to make decisions about club joining requests')->autoClose(false);;
            return redirect()->back();
        }
        $requisition->update([
            'status' => $request->input('status'),
            'comments' => $request->input('comments'),
            'approver_id' => auth()->user()->id
        ]);

        if ($request->input('status') == SubscriptionStatus::APPROVED) {
            User::query()->where('id', '=', $requisition->user_id)->update([
                'club_id' => $requisition->club_id
            ]);
        }

        Alert::success('Request successfully updated for ' . $requisition->user->name)->autoClose(false);;
        return redirect()->route('requisitions.index');

    }


    public function destroy(Requisition $requisition)
    {
        if ($requisition->user_id != auth()->user()->id) {
            Alert::error('You cannot rollback a requisition that is not yours')->autoClose(false);;
            return redirect()->back();
        }
        if ($requisition->status == SubscriptionStatus::APPROVED) {
            Alert::error('You cannot rollback an approved requisition.')->autoClose(false);;
            return redirect()->back();
        }

        $requisition->delete();
        Alert::success('Request successfully rolled back for ' . auth()->user()->name)->autoClose(false);;
        return redirect()->route('requisitions.index');
    }
}
