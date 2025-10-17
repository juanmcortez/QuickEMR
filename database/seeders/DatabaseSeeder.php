<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Users\UserSeeder;
use Database\Seeders\Codes\CustomSeeder;
use Database\Seeders\Doctors\DoctorSeeder;
use Database\Seeders\Patients\PatientSeeder;
use Database\Seeders\Insurances\CompanySeeder;

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
            DoctorSeeder::class,
            CompanySeeder::class,
            CustomSeeder::class,
            PatientSeeder::class,
        ]);
    }
}
