<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Frequency;
use Illuminate\Auth\Access\HandlesAuthorization;

class FrequencyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the frequency can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list frequencies');
    }

    /**
     * Determine whether the frequency can view the model.
     */
    public function view(User $user, Frequency $model): bool
    {
        return $user->hasPermissionTo('view frequencies');
    }

    /**
     * Determine whether the frequency can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create frequencies');
    }

    /**
     * Determine whether the frequency can update the model.
     */
    public function update(User $user, Frequency $model): bool
    {
        return $user->hasPermissionTo('update frequencies');
    }

    /**
     * Determine whether the frequency can delete the model.
     */
    public function delete(User $user, Frequency $model): bool
    {
        return $user->hasPermissionTo('delete frequencies');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete frequencies');
    }

    /**
     * Determine whether the frequency can restore the model.
     */
    public function restore(User $user, Frequency $model): bool
    {
        return false;
    }

    /**
     * Determine whether the frequency can permanently delete the model.
     */
    public function forceDelete(User $user, Frequency $model): bool
    {
        return false;
    }
}
