<?php

namespace Database\Seeders\Patients;

use Illuminate\Database\Seeder;
use App\Models\Patients\Patient;
use App\Models\Encounters\Encounter;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        Patient::factory()
            ->count(fake()->randomNumber(3))
            ->create()
            ->each(function ($patient) {
                Encounter::factory()
                    ->count(fake()->randomNumber(1, true))
                    ->create([
                        'pid_enc' => $patient->pid,
                    ]);
            });
    }
}
