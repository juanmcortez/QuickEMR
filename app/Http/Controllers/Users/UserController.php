<?php

namespace App\Http\Controllers\Users;

use Illuminate\View\View;
use App\Models\Users\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * List all resources of the model
     *
     * @return View
     */
    public function index(): View
    {
        return view('pages.users.list', ['users' => User::query()->orderBy('username')->get()]);
    }

    /**
     * List a resource of the model
     *
     * @param  User  $user
     * @return View
     */
    public function show(User $user): View
    {
        return view('pages.users.show', compact('user'));
    }
}
