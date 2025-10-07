<?php

namespace Database\Seeders\Common;

use App\Models\Common\Address;
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
