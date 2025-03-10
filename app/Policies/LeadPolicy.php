<?php

namespace App\Policies;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LeadPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('lead_read');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lead $model): bool
    {
        return $user->hasPermissionTo('lead_read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('lead_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lead $model): bool
    {
        return $user->hasPermissionTo('lead_update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lead $model): bool
    {
        return $user->hasPermissionTo('lead_delete');
    }

}
