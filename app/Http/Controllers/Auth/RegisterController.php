<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'min:10'],
            'gender' => ['required'],
            'user_type' => ['required'],
            'dob' => ['required', 'date'],
            'terms' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'club_name' => ['required_with:club_owner,on', 'unique:clubs,name'],
            'location' => ['required_with:club_owner,on'],
            'description' => ['required_with:club_owner,on'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $club_id = Club::query()->where('name', 'like', 'WarmFit%')->first()->id;

        if (array_key_exists('club_owner', $data)) {
            $club = Club::query()->create([
                'name' => $data['club_name'],
                'location' => $data['location'],
                'description' => $data['description'],
            ]);
            $club_id = $club->id;
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile' => $data['mobile'],
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'terms_and_conditions' => $data['terms'],
            'club_id' => $club_id,
            'individual_trainer'=>$data['individual_trainer'],
            'user_type'=>$data['user_type']
        ]);
    }
}
