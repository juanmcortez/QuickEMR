<?php

namespace Database\Factories\Encounters;

use App\Models\Encounters\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'code_type' => $this->faker->randomElement(['CPT4', 'HCPCS', 'ANES']),
            'code' => $this->faker->randomNumber(5, true),
            'fee' => $this->faker->randomFloat(2, 10, 9999),
            'units' => $this->faker->randomNumber(1, true),
        ];
    }
}
