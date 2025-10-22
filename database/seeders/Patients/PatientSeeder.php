<?php

namespace Database\Seeders\Patients;

use App\Models\Codes\Custom;
use Illuminate\Database\Seeder;
use App\Models\Encounters\Item;
use App\Models\Patients\Patient;
use App\Models\Encounters\Encounter;
use App\Models\Insurances\Subscriber;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        Patient::factory()
            ->count(fake()->randomNumber(2))
            ->create()
            ->each(function ($patient) {
                //
                Subscriber::factory()
                    ->create([
                        'pid_sub' => $patient->pid,
                        'type' => 'primary',
                    ]);
                //
                if (fake()->randomElement([true, false])) {
                    Subscriber::factory()
                        ->create([
                            'pid_sub' => $patient->pid,
                            'type' => 'secondary',
                        ]);
                }
                //
                Encounter::factory()
                    ->count(fake()->randomNumber(1, true))
                    ->create([
                        'pid_enc' => $patient->pid,
                    ])
                    ->each(function ($encounter) {
                        Item::factory()
                            ->count(fake()->randomNumber(1, true))
                            ->create([
                                'enc_itm' => $encounter->enc,
                            ])->each(function ($item) {
                                $customcode = Custom::where('type', 'cpt4')
                                    ->orWhere('type', 'anes')
                                    ->orWhere('type', 'hcpcs')
                                    ->inRandomOrder()
                                    ->first();
                                $item->update([
                                    'code' => $customcode->id,
                                    'fee' => $customcode->default_fee,
                                    'units' => $customcode->default_units,
                                ]);
                            });
                    });
            });
    }
}
