<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Targhy',
            'prenom' => 'Saoussan',
            'email' => 'saoussantarghi@gmail.com',
            'password' => Hash::make('saoussantarghy'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Saigou',
            'prenom' => 'Oulaya',
            'email' => 'oulayasaigou18@gmail.com',
            'password' => Hash::make('oulayasaigou'),
            'role' => 'admin',
        ]);
    }
}

