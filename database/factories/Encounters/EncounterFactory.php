<?php

namespace Database\Factories\Encounters;

use App\Models\Doctors\Doctor;
use App\Models\Encounters\Encounter;
use Illuminate\Database\Eloquent\Factories\Factory;

class EncounterFactory extends Factory
{
    protected $model = Encounter::class;

    public function definition(): array
    {
        return [
            'date_of_entry' => fake()->dateTimeBetween('-3 Months', '-2 Days'),
            'date_of_service' => fake()->dateTimeBetween('-2 years', '-2 Days'),
            'date_of_service_to' => null,
            'date_of_admission' => null,
            'date_of_discharge' => null,
            'rendering_id' => Doctor::inRandomOrder()->first()->did,
            'referring_id' => fake()->randomElement([null, Doctor::inRandomOrder()->first()->did]),
            'ordering_id' => fake()->randomElement([null, Doctor::inRandomOrder()->first()->did]),
            'supervising_id' => fake()->randomElement([null, Doctor::inRandomOrder()->first()->did]),
        ];
    }
}
