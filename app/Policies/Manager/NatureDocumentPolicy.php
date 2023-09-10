<?php

namespace App\Policies\Manager;

use App\Models\NatureDocument;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NatureDocumentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
         return $user->can('Gestion des Natures de Documents');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, NatureDocument $natureDocument): bool
    {
         return $user->can('Gestion des Natures de Documents');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
         return $user->can('Gestion des Natures de Documents');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, NatureDocument $natureDocument): bool
    {
         return $user->can('Gestion des Natures de Documents');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, NatureDocument $natureDocument): bool
    {
         return $user->can('Gestion des Natures de Documents');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, NatureDocument $natureDocument): bool
    {
         return $user->can('Gestion des Natures de Documents');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, NatureDocument $natureDocument): bool
    {
         return $user->can('Gestion des Natures de Documents');
    }
}
