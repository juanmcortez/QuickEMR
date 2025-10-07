<?php

namespace App\Http\Controllers\Doctors;

use Illuminate\View\View;
use App\Models\Doctors\Doctor;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * List all resources of the model
     *
     * @return View
     */
    public function index(): View
    {
        return view('pages.doctors.list', ['doctors' => Doctor::all()]);
    }

    /**
     * List a resource of the model
     *
     * @param  Doctor  $doctor
     * @return View
     */
    public function show(Doctor $doctor): View
    {
        return view('pages.doctors.show', compact('doctor'));
    }
}
