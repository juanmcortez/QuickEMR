<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Doctors\DoctorController;
use App\Http\Controllers\Patients\PatientController;
use App\Http\Controllers\Commons\DashboardController;

/* ********************* */
/* ***** Dashboard ***** */
Route::get('/', DashboardController::class)->name('dashboard');

/* ******************** */
/* ***** Patients ***** */
Route::controller(PatientController::class)->group(function () {
    //
    Route::get('/patients/list', 'index')->name('patients.list');
    //
    Route::get('/patient/{patient:pid}/details', 'show')->name('patients.show');
    //
});

/* ******************* */
/* ***** Doctors ***** */
Route::controller(DoctorController::class)->group(function () {
    //
    Route::get('/doctors/list', 'index')->name('doctors.list');
    //
    Route::get('/doctor/{doctor:did}/details', 'show')->name('doctors.show');
    //
});

/* ***************** */
/* ***** Users ***** */
Route::controller(UserController::class)->group(function () {
    //
    Route::get('/users/list', 'index')->name('users.list');
    //
    Route::get('/user/{user:username}/details', 'show')->name('users.show');
    //
});
