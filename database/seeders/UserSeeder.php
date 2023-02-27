<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'David Maina',
            'email' => 'davidmaina@iwe.com',
            'password' => Hash::make('secret'),
        ]);

        User::create([
            'name' => 'Kate Njeri',
            'email' => 'katenjeri@iwe.com',
            'password' => Hash::make('secret'),
        ]);
    }
}
