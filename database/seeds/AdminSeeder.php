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
        $first = App\User::create([
            'user_type_id' => 1,
            'api_token' => Str::random(10),
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'is_active' => 1,
            'remember_token' => Str::random(10),
        ]);
        $second = App\User::create([
            'user_type_id' => 1,
            'api_token' => Str::random(10),
            'email' => 'user@example.com',
            'password' => Hash::make('123456'),
            'is_active' => 1,
            'remember_token' => Str::random(10),
        ]);

        App\Profile::create([
            'user_id' => $first->id,
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'mobile_number' => '083798374673',
        ]);

        App\Profile::create([
            'user_id' => $second->id,
            'first_name' => 'User',
            'last_name' => 'User',
            'mobile_number' => '0837983746732',
        ]);
    }
}
