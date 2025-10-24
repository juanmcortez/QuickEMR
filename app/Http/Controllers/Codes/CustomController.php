<?php

namespace App\Http\Controllers\Codes;

use Illuminate\View\View;
use App\Models\Codes\Custom;
use App\Http\Controllers\Controller;

class CustomController extends Controller
{
    /**
     * List all resources of the model
     *
     * @return View
     */
    public function index(): View
    {
        return view('pages.codes.custom.list', ['customs' => Custom::all()]);
    }

    /**
     * List a resource of the model
     *
     * @param  Custom  $custom
     * @return View
     */
    public function show(Custom $custom): View
    {
        return view('pages.codes.custom.show', compact('custom'));
    }
}
