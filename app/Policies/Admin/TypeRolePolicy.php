<?php

namespace App\Policies\Admin;

use App\Models\TypeRole;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TypeRolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('Gestion des Types de Rôles');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TypeRole $typeRole): bool
    {
        return $user->can('Gestion des Types de Rôles');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Gestion des Types de Rôles');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TypeRole $typeRole): bool
    {
        return $user->can('Gestion des Types de Rôles');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TypeRole $typeRole): bool
    {
        return $user->can('Gestion des Types de Rôles');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TypeRole $typeRole): bool
    {
        return $user->can('Gestion des Types de Rôles');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TypeRole $typeRole): bool
    {
        return $user->can('Gestion des Types de Rôles');
    }
}
