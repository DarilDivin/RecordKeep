<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;

class RoleDynamicSelect extends Component
{
    public $typeroles;

    public $permissions;

    public $selectedTypeRole;

    public $selectedPermissions;

    public $alwaysPermissions;

    public function updatedSelectedTypeRole($typeRole)
    {
        $this->permissions = Permission::where('type_role_id', $typeRole)->get()->toArray();
        $this->alwaysPermissions = null;
    }

    public function updatedSelectedPermissions($permissions_ids)
    {
        $permissions = [];
        foreach($permissions_ids as $id){
            $permissions[] = Permission::where('id', $id)->get()->toArray();
        }
        $this->alwaysPermissions = array_reduce($permissions, function ($carry, $item) {
            if($carry === null){
                return $item;
            }
            return array_merge($carry, $item);
        });
    }

    public function render()
    {
        return view('livewire.role-dynamic-select');
    }
}
