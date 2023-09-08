<?php

namespace App\Policies\Manager;

use App\Models\BoiteArchive;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BoiteArchivePolicy
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
    public function view(User $user, BoiteArchive $boiteArchive): bool
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
    public function update(User $user, BoiteArchive $boiteArchive): bool
    {
        return in_array('Gestionnaire-Standard', $user->roles->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BoiteArchive $boiteArchive): bool
    {
        return in_array('Gestionnaire-Standard', $user->roles->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BoiteArchive $boiteArchive): bool
    {
        return in_array('Gestionnaire-Standard', $user->roles->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BoiteArchive $boiteArchive): bool
    {
        return in_array('Gestionnaire-Standard', $user->roles->pluck('name')->toArray());
    }
}
