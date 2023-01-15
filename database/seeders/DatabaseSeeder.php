<?php

namespace Database\Seeders;

use App\Models\Agency\Agency;
use App\Models\Candidate\Candidate;
use App\Models\Contract\Contract;
use App\Models\Employer\Employer;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Roles Done");

        DB::table('users')->insert([
            'role_id' => Role::where('name', '=', 'admin')->pluck('id')->first(),
            'uuid' => (string) Str::uuid(),
            'first_name' => 'Mr.',
            'last_name' => 'Robot',
            'email' => 'robot@pss.com',
            'password' => Hash::make('Vintrix@pss'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $this->command->info("Admin Done");

        User::factory(300)->create();
        $this->command->info("Users Done");

        ##
        User::whereHas('role', function ($query) {
            $query->where('name', 'employer');
        })->get()->each(function ($user) {
            Employer::factory(100)->create(
                [
                    'user_id' =>  $user->uuid
                ]
            );
        });
        $this->command->info("Employer Done");

        ##
        User::whereHas('role', function ($query) {
            $query->where('name', 'agency');
        })->get()->each(function ($user) {
            Agency::factory(100)->create(
                [
                    'user_id' =>  $user->uuid
                ]
            );
        });
        $this->command->info("Agency Done");

        ##
        User::whereHas('role', function ($query) {
            $query->where('name', 'candidate');
        })->get()->each(function ($user) {
            Candidate::factory(100)->create(
                [
                    'user_id' =>  $user->uuid
                ]
            );
        });
        $this->command->info("Candidate Done");

        Contract::factory(100)->create();

        $this->command->info("_____________________");
        $this->command->info("# Admin Cred");
        $this->command->line('Email: robot@pss.com , Password: Vintrix@pss');
    }
}
