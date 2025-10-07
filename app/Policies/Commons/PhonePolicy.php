<?php

namespace App\Policies\Commons;

use App\Models\Users\User;
use App\Models\Commons\Phone;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhonePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Phone $phone): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Phone $phone): bool
    {
        return true;
    }

    public function delete(User $user, Phone $phone): bool
    {
        return true;
    }

    public function restore(User $user, Phone $phone): bool
    {
        return true;
    }

    public function forceDelete(User $user, Phone $phone): bool
    {
        return true;
    }
}
