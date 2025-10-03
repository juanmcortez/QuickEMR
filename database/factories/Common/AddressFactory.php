<?php

namespace Database\Factories\Common;

use App\Models\Common\Address;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
{
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street_name' => $this->faker->streetName,
            'street_name_extended' => null,
            //
            'city' => $this->faker->city(),
            'state_code' => 'CBA',
            'postal_code' => $this->faker->postcode(),
            //
            'country_code' => 'AR',
            //
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
