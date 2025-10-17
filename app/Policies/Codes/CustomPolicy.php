<?php

namespace App\Policies\Codes;

use App\Models\Users\User;
use App\Models\Codes\Custom;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Custom $custom): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Custom $custom): bool
    {
        return true;
    }

    public function delete(User $user, Custom $custom): bool
    {
        return true;
    }

    public function restore(User $user, Custom $custom): bool
    {
        return true;
    }

    public function forceDelete(User $user, Custom $custom): bool
    {
        return true;
    }
}
