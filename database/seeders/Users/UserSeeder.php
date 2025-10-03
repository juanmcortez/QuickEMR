<?php

namespace Database\Seeders\Users;

use App\Models\Users\User;
use App\Models\Common\Email;
use App\Models\Common\Address;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()
            ->count(fake()->randomNumber(1, true))
            ->create()
            ->after(function ($user) {
                Email::factory()->create();
                Address::factory()->create();
            });
    }
}
