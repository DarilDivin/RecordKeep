<?php

namespace App\Policies\Manager;

use App\Models\DemandeTransfert;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AllTransfertPolicy
{
     /* FOR CENTRALES MANAGERS */

     public function all(User $user): bool
     {
         return in_array('Gestionnaire-Central', $user->roles->pluck('name')->toArray());
     }

     public function one(User $user, DemandeTransfert $demandeTransfert): bool
     {
         return in_array('Gestionnaire-Central', $user->roles->pluck('name')->toArray());
     }

     public function removeForCentralTranfer(User $user, DemandeTransfert $demandeTransfert): bool
     {
         return in_array('Gestionnaire-Central', $user->roles->pluck('name')->toArray());
     }

     public function death(User $user, DemandeTransfert $demandeTransfert): bool
     {
         return in_array('Gestionnaire-Central', $user->roles->pluck('name')->toArray());
     }

     public function accept(User $user, DemandeTransfert $demandeTransfert): bool
     {
         return in_array('Gestionnaire-Central', $user->roles->pluck('name')->toArray());
     }
}
