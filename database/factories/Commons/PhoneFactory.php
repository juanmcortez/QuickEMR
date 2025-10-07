<?php

namespace Database\Factories\Commons;

use App\Enum\PhoneType;
use App\Models\Commons\Phone;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'is_primary' => $this->faker->boolean,
            'type' => PhoneType::random(),
            //
            'country_code' => '+'.$this->faker->randomNumber(2, true).' '.$this->faker->randomNumber(2),
            //
            'area_code' => $this->faker->randomNumber(3, true),
            'number_code' => $this->faker->randomNumber(3, true),
            'number_line' => $this->faker->randomNumber(4, true),
            //
            'notes' => $this->faker->realText(175),
            //
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
