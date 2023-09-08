<?php

namespace App\Policies\Manager;

use App\Models\Document;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DocumentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return in_array('Gestionnaire-Standard', $user->roles->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Document $document): bool
    {
        return in_array('Gestionnaire-Standard', $user->roles->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array('Gestionnaire-Standard', $user->roles->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Document $document): bool
    {
        return in_array('Gestionnaire-Standard', $user->roles->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Document $document): bool
    {
        return in_array('Gestionnaire-Standard', $user->roles->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Document $document): bool
    {
        return in_array('Gestionnaire-Standard', $user->roles->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Document $document): bool
    {
        return in_array('Gestionnaire-Standard', $user->roles->pluck('name')->toArray());
    }


    public function indexForDocumentsArchived(User $user, Document $document): bool
    {
        return in_array('Gestionnaire-Central', $user->roles->pluck('name')->toArray());
    }

    public function showClassementForm(User $user, Document $document): bool
    {
        return in_array('Gestionnaire-Central', $user->roles->pluck('name')->toArray());
    }

    public function doClassement(User $user, Document $document): bool
    {
        return in_array('Gestionnaire-Central', $user->roles->pluck('name')->toArray());
    }
}
