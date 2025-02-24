<?php

namespace App\Policies;

use App\Models\User;
use App\Models\permission;
use Illuminate\Auth\Access\Response;

class PermissionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, permission $permission): bool
    {
        return $user->hasPermissionTo('permission_read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('permission_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, permission $permission): bool
    {
        return $user->hasPermissionTo('permission_update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, permission $permission): bool
    {
        return $user->hasPermissionTo('permission_delete');
    }

}
