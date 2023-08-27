<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserDynamicSelect extends Component
{
    public $roles;

    public $permissions = [];

    public $selectedRole;

    public function updatedSelectedRole(array $rolesIds)
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

