<?php

namespace Database\Seeders\Commons;

use App\Models\Commons\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        Address::factory()
            ->count(fake()->randomNumber(1, true))
            ->create();
    }
}
