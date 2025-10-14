<?php

namespace App\Policies\Insurances;

use App\Models\Users\User;
use App\Models\Insurances\Subscriber;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriberPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Subscriber $subscriber): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Subscriber $subscriber): bool
    {
        return true;
    }

    public function delete(User $user, Subscriber $subscriber): bool
    {
        return true;
    }

    public function restore(User $user, Subscriber $subscriber): bool
    {
        return true;
    }

    public function forceDelete(User $user, Subscriber $subscriber): bool
    {
        return true;
    }
}
