<?php

namespace App\Policies\Encounters;

use App\Models\Users\User;
use App\Models\Encounters\Encounter;
use Illuminate\Auth\Access\HandlesAuthorization;

class EncounterPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Encounter $encounter): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Encounter $encounter): bool
    {
        return true;
    }

    public function delete(User $user, Encounter $encounter): bool
    {
        return true;
    }

    public function restore(User $user, Encounter $encounter): bool
    {
        return true;
    }

    public function forceDelete(User $user, Encounter $encounter): bool
    {
        return true;
    }
}
