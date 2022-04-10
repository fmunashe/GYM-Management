<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Club;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('addresses')->delete();
        DB::table('addresses')->insert(
            [
                [
                    'street_name' => 'warmfit',
                    'state' => 'Harare',
                    'zip' => '00263'
                ]
            ]
        );

        DB::table('clubs')->delete();
        DB::table('clubs')->insert(
            [
                [
                    'name' => 'WarmFit',
                    'description' => 'Health and Fitness Centre',
                    'location' => 'Harare Zimbabwe'
                ]
            ]
        );


        DB::table('users')->delete();

        $club = Club::query()->where('name', 'WarmFit')->first();
        DB::table('users')->insert(
            [
                [
                    'email' => 'admin@warmfit.com',
                    'name' => 'Admin',
                    'user_type' => 'is_admin',
                    'password' => Hash::make(config('auth.passwords.default_seeded_password')),
                    'club_id' => $club->id
                ],
                [
                    'email' => 'member@warmfit.com',
                    'name' => 'Member',
                    'user_type' => 'is_member',
                    'password' => Hash::make(config('auth.passwords.default_seeded_password')),
                    'club_id' => $club->id
                ], [
                'email' => 'trainer@warmfit.com',
                'name' => 'Trainer',
                'user_type' => 'is_trainer',
                'password' => Hash::make(config('auth.passwords.default_seeded_password')),
                'club_id' => $club->id
            ],
            ]
        );
    }
}
