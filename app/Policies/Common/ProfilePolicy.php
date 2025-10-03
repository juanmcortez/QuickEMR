<?php

namespace App\Policies\Common;

use App\Models\Users\User;
use App\Models\Common\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Profile $profile): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Profile $profile): bool
    {
        return true;
    }

    public function delete(User $user, Profile $profile): bool
    {
        return true;
    }

    public function restore(User $user, Profile $profile): bool
    {
        return true;
    }

    public function forceDelete(User $user, Profile $profile): bool
    {
        return true;
    }
}
