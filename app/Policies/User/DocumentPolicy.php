<?php

namespace App\Policies\User;

use App\Models\Document;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DocumentPolicy
{

    public function index (User $user): void
    {
        /* return
        $user->can("Consulter un Document") ||
        $user->can("Rechercher un Document") ||
        $user->can("Télécharger un Document"); */
    }

    public function show (User $user, Document $document): bool
    {
        /* return
        $user->can("Consulter un Document") ||
        $user->can("Rechercher un Document") ||
        $user->can("Télécharger un Document") ||
        $user->can("Demander un Prêt"); */
        return $user->direction_id === $document->direction_id;
    }

    /* public function download (User $user, Document $document)
    {
        return $user->can("Télécharger un Document");
    }

    public function demande (User $user, Document $document)
    {

    }

    public function acceptDemande (User $user, Document $document)
    {

    }

    public function rejectDemande (User $user, Document $document)
    {

    } */

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): void
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Document $document): void
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): void
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Document $document): void
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Document $document): void
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Document $document): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Document $document): void
    {
        //
    }
}
