<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FamilyDetails;
use Illuminate\Auth\Access\HandlesAuthorization;

class FamilyDetailsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the familyDetails can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('manage allfamilydetails');
    }

    /**
     * Determine whether the familyDetails can view the model.
     */
    public function view(User $user, FamilyDetails $model): bool
    {
        return $user->hasPermissionTo('manage allfamilydetails');
    }

    /**
     * Determine whether the familyDetails can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage allfamilydetails');
    }

    /**
     * Determine whether the familyDetails can update the model.
     */
    public function update(User $user, FamilyDetails $model): bool
    {
        return $user->hasPermissionTo('manage allfamilydetails');
    }

    /**
     * Determine whether the familyDetails can delete the model.
     */
    public function delete(User $user, FamilyDetails $model): bool
    {
        return $user->hasPermissionTo('manage allfamilydetails');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('manage allfamilydetails');
    }

    /**
     * Determine whether the familyDetails can restore the model.
     */
    public function restore(User $user, FamilyDetails $model): bool
    {
        return false;
    }

    /**
     * Determine whether the familyDetails can permanently delete the model.
     */
    public function forceDelete(User $user, FamilyDetails $model): bool
    {
        return false;
    }
}
