<?php

namespace Database\Factories\Insurances;

use App\Models\Insurances\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'attention' => null,
            'effective_date' => $this->faker->dateTimeBetween('-2 years', '-1 day'),
            'termination_date' => null,
            'participating' => $this->faker->randomElement([true, false]),
            'self_pay' => $this->faker->randomElement([true, false]),
            'do_not_bill' => $this->faker->randomElement([true, false]),
            'do_not_import' => $this->faker->randomElement([true, false]),
            'payer_id' => $this->faker->randomNumber(6, true),
            'payer_id_eligibility' => null,
        ];
    }
}
