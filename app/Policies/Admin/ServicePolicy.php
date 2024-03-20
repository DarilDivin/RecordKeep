<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Auth\Access\Response;

class ServicePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('Gestion des Services');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Service $service): bool
    {
        return $user->can('Gestion des Services')
            && Str::lower($service->service) !== "aucun";
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Gestion des Services');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Service $service): bool
    {
        return $user->can('Gestion des Services')
            && Str::lower($service->service) !== "aucun";
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Service $service): bool
    {
        return $user->can('Gestion des Services')
            && Str::lower($service->service) !== "aucun";
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Service $service): bool
    {
        return $user->can('Gestion des Services');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Service $service): bool
    {
        return $user->can('Gestion des Services')
            && Str::lower($service->service) !== "aucun";
    }
}
