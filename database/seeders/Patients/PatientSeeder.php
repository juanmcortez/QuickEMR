<?php

namespace Database\Seeders\Patients;

use Illuminate\Database\Seeder;
use App\Models\Patients\Patient;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        Patient::factory()
            ->count(fake()->randomNumber(3))
            ->create();
    }
}
