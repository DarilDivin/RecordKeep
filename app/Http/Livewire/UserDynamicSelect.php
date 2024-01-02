<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserDynamicSelect extends Component
{
    public $user;

    public $roles;

    public $permissions = [];

    public $selectedRoles;

    public $userPermissions;

    /* public function mount() {
        if (old('roles')) {
            array_map(function ($role) {
                $this->selectedRoles[] = (int)$role;
            }, old('roles'));
            dd($this->selectedRoles);
        }
    } */

    public function updatedselectedRoles(array $rolesIds)
    {
        $permissions = [];
        foreach($rolesIds as $role_id)
        {
            $permissions[] = Role::find($role_id)->permissions->toArray();
        }
        $this->permissions = array_reduce($permissions, function ($carry, $item) {
            if($carry === null){
                return $item;
            };
            return array_merge($carry, $item);
        });
        /* dd($this->permissions);
        if(!is_null($tab)){
            $this->permissions = array_map(function ($item) {
                return (object)$item;
            }, $tab);
        } */
    }

    public function render()
    {
        return view('livewire.user-dynamic-select');
    }
}

