<?php

namespace Database\Factories\Encounters;

use App\Models\Codes\Custom;
use App\Models\Encounters\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition(): array
    {
        $random_code = Custom::whereType('cpt4')
            ->orWhere('type', 'anes')
            ->orWhere('type', 'hcpcs')
            ->inRandomOrder()
            ->first();
        //
        return [
            'code' => $random_code->id,
            'fee' => fake()->randomElement([$random_code->default_fee, $this->faker->randomFloat(2, 0.01, 199.99)]),
            'units' => fake()->randomElement([$random_code->default_units, $this->faker->randomNumber(1, true)]),
        ];
    }
}
