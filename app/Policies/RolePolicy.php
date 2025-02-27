<?php

namespace App\Policies;

use App\Models\User;
use App\Models\role;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('role_read');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, role $role): bool
    {
        return $user->hasPermissionTo('role_read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('role_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, role $role): bool
    {
        return $user->hasPermissionTo('role_update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, role $role): bool
    {
        return $user->hasPermissionTo('role_delete');
    }
}
