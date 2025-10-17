<?php

namespace Database\Factories\Codes;

use App\Enum\CodeType;
use Illuminate\Support\Str;
use App\Models\Codes\Custom;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomFactory extends Factory
{
    protected $model = Custom::class;

    public function definition(): array
    {
        $code_type = CodeType::random()->value;
        $fake_ndc = '0000'.fake()->randomNumber(1, true).'-'.fake()->randomNumber(4, true).'-'.fake()->randomNumber(2, true);
        //
        return [
            'type' => $code_type,
            'code' => fake()->randomNumber(5, true),
            'code_short' => null,
            'description' => fake()->randomElement(['null', Str::ucfirst(Str::lower(fake()->realText(128)))]),
            'default_modifier' => null,
            'default_ndc' => ($code_type === 'hcpcs') ? $fake_ndc : null,
            'default_units' => $this->faker->randomNumber(1, true),
            'default_fee' => $this->faker->randomFloat(2, 10, 9999),
        ];
    }
}
