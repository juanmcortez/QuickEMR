<?php

namespace Database\Factories\Insurances;

use App\Enum\InsuranceType;
use App\Models\Commons\Profile;
use App\Models\Patients\Patient;
use App\Models\Insurances\Company;
use App\Models\Insurances\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberFactory extends Factory
{
    protected $model = Subscriber::class;

    public function definition(): array
    {
        return [
            'type' => InsuranceType::random()->value,
            'effective_date' => fake()->dateTimeBetween('-2 years', '-1 day'),
            'termination_date' => null,
            //
            'icd_sub' => Company::inRandomOrder()->first()->icd,
            'pid_sub' => Patient::inRandomOrder()->first()->pid,
            'profile_id' => Profile::factory()->create(),
        ];
    }
}
