<?php

namespace Database\Factories\Doctors;

use App\Models\Doctors\Doctor;
use App\Models\Commons\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition(): array
    {
        return [
            'profile_id' => Profile::factory()->create(),
            'job_title' => $this->faker->jobTitle,
        ];
    }
}
