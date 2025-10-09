<?php

namespace Database\Seeders\Insurances;

use Illuminate\Database\Seeder;
use App\Models\Insurances\Company;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::factory()
            ->count(fake()->randomNumber(2, true))
            ->create();
    }
}
