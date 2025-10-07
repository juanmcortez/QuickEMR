<?php

namespace App\Policies\Patients;

use App\Models\Users\User;
use App\Models\Patients\Patient;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatientPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Patient $patient): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Patient $patient): bool
    {
        return true;
    }

    public function delete(User $user, Patient $patient): bool
    {
        return true;
    }

    public function restore(User $user, Patient $patient): bool
    {
        return true;
    }

    public function forceDelete(User $user, Patient $patient): bool
    {
        return true;
    }
}
