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
            'name' => 'Arslane',
            'prenom' => 'Mourad',
            'email' => 'mourad@example.com',
            'password' => Hash::make('20252025'),
            'role' => 'admin', 
        ]);

       
    }
}
