<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Users\UserSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the models
        $this->call([
            UserSeeder::class,
        ]);
    }
}
