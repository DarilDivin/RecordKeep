<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class PermissionDynamicSelect extends Component
{
    public $permission;

    public $typeroles;

    public $roles;

    public $selectedTypeRole;

    public $selectedRoles;

    public $alwaysRoles;

    public function mount()
    {
        /* if(old('type_role_id')){
            $this->selectedTypeRole = old('type_role_id');
        }
        if(old('roles')){
            $this->selectedRoles = old('roles');
        } */
        $this->selectedTypeRole = $this->permission->type_role_id;
    }

    public function updatedSelectedTypeRole($typeRole)
    {
        $this->roles = Role::where('type_role_id', $typeRole)->get()->toArray();
        $this->alwaysRoles = null;
    }

    public function updatedSelectedRoles($roles_ids)
    {
        $roles = [];
        foreach($roles_ids as $id){
            $roles[] = Role::where('id', $id)->get()->toArray();
        }
        $this->alwaysRoles = array_reduce($roles, function ($carry, $item) {
            if($carry === null){
                return $item;
            }
            return array_merge($carry, $item);
        });
    }

    public function render()
    {
        return view('livewire.permission-dynamic-select');
    }
}
