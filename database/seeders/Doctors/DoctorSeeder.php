<?php

namespace Database\Seeders\Doctors;

use App\Models\Doctors\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        Doctor::factory()
            ->count(fake()->randomNumber(1, true))
            ->create();
    }
}
