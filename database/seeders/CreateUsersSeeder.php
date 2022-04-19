<?php

namespace Database\Seeders;

use App\Enums\SubscriptionStatus;
use App\Enums\ValidityPeriodEnum;
use App\Models\Address;
use App\Models\Club;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Output\ConsoleOutput;

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

        $clubs = [
            ['name' => 'WarmFit', 'description' => 'Health and Fitness Centre', 'location' => 'Harare Zimbabwe'],
        ];
        $output = new ConsoleOutput();
        foreach ($clubs as $club) {
            $club_exists = Club::query()->where('name', $club['name'])->exists();
            if ($club_exists) {
                $output->writeln("Club creation failed, club name " . $club['name'] . " already exists ........");
            } else {
                Club::query()->create($club);
                $output->writeln("Club " . $club['name'] . " successfully created ........");
            }
        }

        $club = Club::query()->where('name', 'WarmFit')->first();

        $users = [
            [
                'email' => 'admin@warmfit.com',
                'name' => 'Admin',
                'user_type' => 'is_admin',
                'password' => Hash::make(config('auth.passwords.default_seeded_password')),
                'club_id' => $club->id,
                'subscription_status' => SubscriptionStatus::ACTIVE,
            ],
            [
                'email' => 'member@warmfit.com',
                'name' => 'Member',
                'user_type' => 'is_member',
                'password' => Hash::make(config('auth.passwords.default_seeded_password')),
                'club_id' => $club->id,
                'subscription_status' => SubscriptionStatus::ACTIVE,
            ], [
                'email' => 'trainer@warmfit.com',
                'name' => 'Trainer',
                'user_type' => 'is_trainer',
                'password' => Hash::make(config('auth.passwords.default_seeded_password')),
                'club_id' => $club->id,
                'subscription_status' => SubscriptionStatus::ACTIVE,
            ],
        ];

        foreach ($users as $user) {
            $user_exists = User::query()->where('email', $user['email'])->exists();
            if ($user_exists) {
                $output->writeln("User creation failed, User with email " . $user['email'] . " already exists ........");
            } else {
                User::query()->create($user);
                $output->writeln("User " . $user['email'] . " successfully created ........");
            }
        }

        $memberships = [
            ['plan_name' => 'Weekly', 'description' => 'Weekly Plan', 'validity_period' =>'7', 'amount' => 200, 'active' => 'Yes'],
            ['plan_name' => 'Bi-Monthly', 'description' => 'Bi Monthly Plan', 'validity_period' =>'14', 'amount' => 350, 'active' => 'Yes'],
            ['plan_name' => 'Monthly', 'description' => 'Monthly Plan', 'validity_period' => '30', 'amount' => 300, 'active' => 'Yes'],
        ];

        foreach ($memberships as $membership) {
            $membership_exists = Plan::query()->where('plan_name', $membership['plan_name'])->exists();
            if ($membership_exists) {
                $output->writeln("Membership Plan creation failed, Plan with name " . $membership['plan_name'] . " already exists ........");
            } else {
                Plan::query()->create($membership);
                $output->writeln("Membership Plan " . $membership['plan_name'] . " successfully created ........");
            }
        }

    }
}
