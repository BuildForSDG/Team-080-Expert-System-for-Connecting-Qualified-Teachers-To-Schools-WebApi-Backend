<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'phonenumber' => '083798374673',
            'user_type_id' => 1,
            'gender' => 'Male',
            'country_id' => 1,
            'state_id' => 1,
            'api_token' => Str::random(10),
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'is_active' => 1,
            'remember_token' => Str::random(10),
        ]);
        App\User::create([
            'first_name' => 'User',
            'last_name' => 'User',
            'phonenumber' => '0837983746732',
            'user_type_id' => 1,
            'gender' => 'Female',
            'country_id' => 1,
            'state_id' => 1,
            'api_token' => Str::random(10),
            'email' => 'user@example.com',
            'password' => Hash::make('123456'),
            'is_active' => 1,
            'remember_token' => Str::random(10),
        ]);
    }
}
