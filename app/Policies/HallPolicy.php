<?php

namespace App\Policies;

use App\Models\Hall;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HallPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the hall can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the hall can view the model.
     */
    public function view(User $user, Hall $model): bool
    {
        return true;
    }

    /**
     * Determine whether the hall can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the hall can update the model.
     */
    public function update(User $user, Hall $model): bool
    {
        return true;
    }

    /**
     * Determine whether the hall can delete the model.
     */
    public function delete(User $user, Hall $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the hall can restore the model.
     */
    public function restore(User $user, Hall $model): bool
    {
        return false;
    }

    /**
     * Determine whether the hall can permanently delete the model.
     */
    public function forceDelete(User $user, Hall $model): bool
    {
        return false;
    }
}
