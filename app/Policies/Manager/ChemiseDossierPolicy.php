<?php

namespace App\Policies\Manager;

use App\Models\ChemiseDossier;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ChemiseDossierPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
         return $user->can('Gestion des Categories');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ChemiseDossier $chemiseDossier): bool
    {
         return $user->can('Gestion des Categories');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
         return $user->can('Gestion des Chemises Dossiers');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ChemiseDossier $chemiseDossier): bool
    {
         return $user->can('Gestion des Chemises Dossiers');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ChemiseDossier $chemiseDossier): bool
    {
         return $user->can('Gestion des Chemises Dossiers');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ChemiseDossier $chemiseDossier): bool
    {
         return $user->can('Gestion des Chemises Dossiers');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ChemiseDossier $chemiseDossier): bool
    {
         return $user->can('Gestion des Chemises Dossiers');
    }
}
