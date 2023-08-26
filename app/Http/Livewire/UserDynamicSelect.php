<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserDynamicSelect extends Component
{
    public $roles;

    public $permissions;

    public $selectedRole;

    public function updatingSelectedRole(array $rolesIds)
    {
        $permissions = [];
        foreach($rolesIds as $role_id)
        {
            $permissions[] = Role::find($role_id)->permissions->toArray();
        }
        $tab = array_reduce($permissions, function ($carry, $item) {
            if($carry === null){
                return $item;
            };
            return array_merge($carry, $item);
        });

        $this->permissions = array_map(function ($item) {
            return (object)$item;
        }, $tab);
    }

    public function render()
    {
        return view('livewire.user-dynamic-select');
    }
}

