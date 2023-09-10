<?php

namespace App\Policies\Manager;

use App\Models\RayonRangement;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RayonRangementPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
         return $user->can('Gestion des Rayons Rangements');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RayonRangement $rayonRangement): bool
    {
         return $user->can('Gestion des Rayons Rangements');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
         return $user->can('Gestion des Rayons Rangements');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RayonRangement $rayonRangement): bool
    {
         return $user->can('Gestion des Rayons Rangements');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RayonRangement $rayonRangement): bool
    {
         return $user->can('Gestion des Rayons Rangements');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RayonRangement $rayonRangement): bool
    {
         return $user->can('Gestion des Rayons Rangements');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RayonRangement $rayonRangement): bool
    {
         return $user->can('Gestion des Rayons Rangements');
    }
}
