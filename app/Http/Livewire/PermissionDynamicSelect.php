<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class PermissionDynamicSelect extends Component
{

    public $roles;

    public $typeroles;

    public $permission;

    public $alwaysRoles;

    public $selectedRoles;

    public $permissionRoles;

    public $selectedTypeRole;

    public function mount()
    {
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
