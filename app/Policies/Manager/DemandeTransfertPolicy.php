<?php

namespace App\Policies\Manager;

use App\Models\DemandeTransfert;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DemandeTransfertPolicy
{

    /* FOR STANDARDS MANAGERS */

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('Gestion des Demandes de Transferts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DemandeTransfert $demandeTransfert): bool
    {
        return $user->can('Gestion des Demandes de Transferts');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): void
    {

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DemandeTransfert $demandeTransfert): void
    {

    }

    public function sending(User $user, DemandeTransfert $demandeTransfert): bool
    {
        return $user->can('Gestion des Demandes de Transferts')
        && $demandeTransfert->transferable === 1;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DemandeTransfert $demandeTransfert): bool
    {
        return $user->can('Gestion des Demandes de Transferts')
        && $demandeTransfert->valide === 1;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DemandeTransfert $demandeTransfert): void
    {

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DemandeTransfert $demandeTransfert): void
    {

    }


     /* FOR CENTRALES MANAGERS */

     public function all(User $user): bool
     {
        return $user->can('Gestion des Demandes de Transferts du MISP');
     }

     public function one(User $user, DemandeTransfert $demandeTransfert): bool
     {
        return $user->can('Gestion des Demandes de Transferts du MISP');
     }

     public function showBordereauForm(User $user, DemandeTransfert $demandeTransfert): bool
     {
        return $user->can('Gestion des Demandes de Transferts du MISP')
            && $demandeTransfert->transfere === 1;
     }

     public function accept(User $user, DemandeTransfert $demandeTransfert): bool
     {
        return $user->can('Gestion des Demandes de Transferts du MISP')
         && $demandeTransfert->transfere === 1;
     }

}
