<?php

namespace App\Policies\Commons;

use App\Models\Users\User;
use App\Models\Commons\Email;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmailPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Email $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Email $model): bool
    {
        return true;
    }

    public function delete(User $user, Email $model): bool
    {
        return true;
    }

    public function restore(User $user, Email $model): bool
    {
        return true;
    }

    public function forceDelete(User $user, Email $model): bool
    {
        return true;
    }
}
