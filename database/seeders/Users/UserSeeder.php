<?php

namespace Database\Seeders\Users;

use App\Models\Users\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()
            ->count(fake()->randomNumber(1, true))
            ->create();
    }
}
