<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
     public function run()
    {
        // Appeler le UserSeeder
        $this->call(UserSeeder::class);

        // Ici tu peux appeler d'autres seeders si nécessaire
        // $this->call(CompteSeeder::class);
    }
}
