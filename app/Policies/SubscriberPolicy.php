<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Subscriber;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the subscriber can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list subscribers');
    }

    /**
     * Determine whether the subscriber can view the model.
     */
    public function view(User $user, Subscriber $model): bool
    {
        return $user->hasPermissionTo('view subscribers');
    }

    /**
     * Determine whether the subscriber can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create subscribers');
    }

    /**
     * Determine whether the subscriber can update the model.
     */
    public function update(User $user, Subscriber $model): bool
    {
        return $user->hasPermissionTo('update subscribers');
    }

    /**
     * Determine whether the subscriber can delete the model.
     */
    public function delete(User $user, Subscriber $model): bool
    {
        return $user->hasPermissionTo('delete subscribers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete subscribers');
    }

    /**
     * Determine whether the subscriber can restore the model.
     */
    public function restore(User $user, Subscriber $model): bool
    {
        return false;
    }

    /**
     * Determine whether the subscriber can permanently delete the model.
     */
    public function forceDelete(User $user, Subscriber $model): bool
    {
        return false;
    }
}
