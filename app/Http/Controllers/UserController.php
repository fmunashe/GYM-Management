<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::query()->with(['address', 'healthStatus', 'club', 'payment'])->where('club_id', auth()->user()->club->id)->latest()->paginate('10');
        if (auth()->user()->club->name == 'WarmFit') {
            $users = User::query()->with(['address', 'healthStatus', 'club', 'payment'])->latest()->paginate('10');
        }
        $clubs = Club::all();

        return view('users.index', compact('users', 'clubs'));

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
        User::query()->create($request->all());
        Alert::success('Member Details', 'Member Successfully Created');
        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'] ? Hash::make($data['password']) : $user->password,
            'mobile' => $data['mobile'],
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'user_type' => $data['user_type'],
            'terms_and_conditions' => $data['terms'],
            'club_id' => $data['club_id']
        ]);


        Alert::success('Member Information', 'Member Details Successfully Updated');
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Member Information', 'Member Successfully Deleted');
        return redirect()->route('users');
    }


}
