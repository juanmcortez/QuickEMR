<?php

namespace App\Http\Controllers\Patients;

use Illuminate\View\View;
use App\Models\Patients\Patient;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * List all resources of the model
     *
     * @return View
     */
    public function index(): View
    {
        return view('pages.patients.list', ['patients' => Patient::paginate(25)]);
    }

    /**
     * List a resource of the model
     *
     * @param  Patient  $patient
     * @return View
     */
    public function show(Patient $patient): View
    {
        return view('pages.patients.show', compact('patient'));
    }
}
