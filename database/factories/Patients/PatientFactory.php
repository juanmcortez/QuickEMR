<?php

namespace Database\Factories\Patients;

use App\Models\Common\Profile;
use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition(): array
    {
        return [
            'profile_id' => Profile::factory()->create(),
            'accession_number_ptlvl' => $this->faker->randomElement([null, $this->faker->word()]),
        ];
    }
}
