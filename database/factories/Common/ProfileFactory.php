<?php

namespace Database\Factories\Common;

use App\Enum\PhoneType;
use App\Models\Common\Email;
use App\Models\Common\Phone;
use App\Models\Common\Address;
use App\Models\Common\Profile;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->randomElement([null, $this->faker->name()]),
            'last_name' => $this->faker->lastName(),
            //
            'birthdate' => $this->faker->dateTimeBetween('-75 years', '-1 Month')->format('Y-m-d'),
            //
            'email_address_id' => Email::factory()->create(),
            //
            'primary_address_id' => Address::factory()->create(),
            'secondary_address_id' => Address::factory()->create(),
            //
            'primary_phone_id' => Phone::factory()->create([
                'is_primary' => true,
                'type' => PhoneType::Mobile->value,
            ]),
            'secondary_phone_id' => Phone::factory()->create([
                'is_primary' => false,
                'type' => PhoneType::Home->value,
            ]),
            //
            'registration_date' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
