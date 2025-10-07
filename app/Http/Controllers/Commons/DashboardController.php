<?php

namespace App\Http\Controllers\Commons;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('pages.dashboard');
    }
}
