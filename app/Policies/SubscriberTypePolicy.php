<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SubscriberType;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriberTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the subscriberType can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('manage subscribertypes');
    }

    /**
     * Determine whether the subscriberType can view the model.
     */
    public function view(User $user, SubscriberType $model): bool
    {
        return $user->hasPermissionTo('manage subscribertypes');
    }

    /**
     * Determine whether the subscriberType can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage subscribertypes');
    }

    /**
     * Determine whether the subscriberType can update the model.
     */
    public function update(User $user, SubscriberType $model): bool
    {
        return $user->hasPermissionTo('manage subscribertypes');
    }

    /**
     * Determine whether the subscriberType can delete the model.
     */
    public function delete(User $user, SubscriberType $model): bool
    {
        return $user->hasPermissionTo('manage subscribertypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('manage subscribertypes');
    }

    /**
     * Determine whether the subscriberType can restore the model.
     */
    public function restore(User $user, SubscriberType $model): bool
    {
        return false;
    }

    /**
     * Determine whether the subscriberType can permanently delete the model.
     */
    public function forceDelete(User $user, SubscriberType $model): bool
    {
        return false;
    }
}
