<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Seeder;
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
        // \App\Models\User::factory(10)->create();

        Role::create(['title' => 'Super Admin']);


        Admin::create([
            'name'     => 'Super Admin',
            'role_id'     => '1', // super admin
            'email'    => 'admin@gmail.com',
            'password' =>  Hash::make('123123123'),
            'gender'   => 'male',
            'phone'    => '+7998068033',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

    }
}
