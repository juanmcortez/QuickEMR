<?php

namespace Database\Seeders\Common;

use App\Models\Common\Email;
use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    public function run(): void
    {
        Email::factory()
            ->count(fake()->randomNumber(1, true))
            ->create();
    }
}
