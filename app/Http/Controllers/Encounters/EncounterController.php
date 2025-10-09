<?php

namespace App\Http\Controllers\Encounters;

use Illuminate\View\View;
use App\Models\Patients\Patient;
use App\Http\Controllers\Controller;
use App\Models\Encounters\Encounter;

class EncounterController extends Controller
{
    public function show(Patient $patient, Encounter $encounter): View
    {
        return view('pages.encounters.show', compact(['patient', 'encounter']));
    }
}
