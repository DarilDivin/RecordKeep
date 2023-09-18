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

    public function removeForStandardTranfer(User $user, DemandeTransfert $demandeTransfert): bool
    {
        return $user->can('Gestion des Demandes de Transferts');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Gestion des Demandes de Transferts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DemandeTransfert $demandeTransfert): bool
    {
        return $user->can('Gestion des Demandes de Transferts');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DemandeTransfert $demandeTransfert): bool
    {
        return $user->can('Gestion des Demandes de Transferts');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DemandeTransfert $demandeTransfert): bool
    {
        return $user->can('Gestion des Demandes de Transferts');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DemandeTransfert $demandeTransfert): bool
    {
        return $user->can('Gestion des Demandes de Transferts');
    }


    public function sending(User $user, DemandeTransfert $demandeTransfert): bool
    {
        return $user->can('Gestion des Demandes de Transferts');
    }

    public function removeOfStandardList(User $user, DemandeTransfert $demandeTransfert): bool
    {
        return $user->can('Gestion des Demandes de Transferts');
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

     public function removeForCentralTranfer(User $user, DemandeTransfert $demandeTransfert): bool
     {
        return $user->can('Gestion des Demandes de Transferts du MISP');
     }

     public function off(User $user, DemandeTransfert $demandeTransfert): bool
     {
        return $user->can('Gestion des Demandes de Transferts du MISP');
     }

     public function death(User $user, DemandeTransfert $demandeTransfert): bool
     {
        return $user->can('Gestion des Demandes de Transferts du MISP');
     }

     public function showBordereauForm(User $user, DemandeTransfert $demandeTransfert): bool
     {
        return $user->can('Gestion des Demandes de Transferts du MISP');
     }

     public function accept(User $user, DemandeTransfert $demandeTransfert): bool
     {
        return $user->can('Gestion des Demandes de Transferts du MISP');
     }

     public function removeOfCentralList(User $user, DemandeTransfert $demandeTransfert): bool
    {
        return $user->can('Gestion des Demandes de Transferts du MISP');
    }

}
