<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Patients\PatientController;

Route::controller(PatientController::class)->group(function () {
    //
    Route::get('/', 'index')->name('patients.list');
    //
    Route::get('/patient/{patient:pid}/details', 'show')->name('patients.show');
    //
});

Route::controller(UserController::class)->group(function () {
    //
    Route::get('/users/list', 'index')->name('users.list');
    //
    Route::get('/user/{user:username}/details', 'show')->name('users.show');
    //
});
