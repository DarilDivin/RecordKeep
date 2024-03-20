<?php

namespace App\Policies\Manager;

use App\Models\User;
use App\Models\Document;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class DocumentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
         return $user->can('Gestion des Documents');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Document $document): bool
    {
         return $user->can('Gestion des Documents');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
         return $user->can('Gestion des Documents');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Document $document): bool
    {
         return $user->can('Gestion des Documents') &&
         $document->demande_transfert_id === null &&
         Auth::user()->direction->id === $document->direction_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Document $document): bool
    {
         return $user->can('Gestion des Documents') &&
         $document->demande_transfert_id === null &&
         Auth::user()->direction->id === $document->direction_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Document $document): bool
    {
        return $user->can('Gestion des Documents');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Document $document): bool
    {
        return $user->can('Gestion des Documents') &&
        $document->demande_transfert_id === null &&
        Auth::user()->direction->id === $document->direction_id;
    }


    public function indexForDocumentsArchived(User $user): bool
    {
        return $user->can('Gestion des Classements');
    }

    public function showClassementForm(User $user, Document $document): bool
    {
        return $user->can('Gestion des Classements') &&
        $document->demandetransfert->transfere === 1;
    }

    public function doClassement(User $user, Document $document): bool
    {
        return $user->can('Gestion des Classements') &&
        $document->demandetransfert->transfere === 1;
    }
}
