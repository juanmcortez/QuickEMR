<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;

Route::controller(UserController::class)->group(function () {
    //
    Route::get('/', 'index')->name('users.list');
    //
    Route::get('/user/{user:username}/details', 'show')->name('users.show');
    //
});
