<?php

namespace Database\Seeders\Codes;

use App\Models\Codes\Custom;
use Illuminate\Database\Seeder;

class CustomSeeder extends Seeder
{
    public function run(): void
    {
        Custom::factory()
            ->count(fake()->randomNumber(2, true))
            ->create();
    }
}
