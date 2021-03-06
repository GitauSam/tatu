<?php

namespace Database\Seeders\Users;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Jack Doe',
            'status' => 1,
            'email' => 'jackdoe@tatu.com',
            'phone_number' => '254123456789',
            'password' => Hash::make('JackDoe1234'),
            'email_verified_at' => now()
        ]);

        $user->assignRole('admin');
    }
}
