<?php

namespace App\Policies\Common;

use App\Models\Users\User;
use App\Models\Common\Address;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Address $address): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Address $address): bool
    {
        return true;
    }

    public function delete(User $user, Address $address): bool
    {
        return true;
    }

    public function restore(User $user, Address $address): bool
    {
        return true;
    }

    public function forceDelete(User $user, Address $address): bool
    {
        return true;
    }
}
