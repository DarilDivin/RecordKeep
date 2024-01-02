<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;
use App\Models\TypeRole;

class RoleDynamicSelect extends Component
{
    public $role;

    public $typeroles;

    public $permissions;

    public $rolePermissions;

    public $selectedTypeRole;

    public $alwaysPermissions;

    public $selectedPermissions;

    public function mount()
    {
        $this->selectedTypeRole = $this->role->type_role_id;
        if (old('type_role_id')) {
            $this->selectedTypeRole = old('type_role_id');
            $this->permissions = TypeRole::find($this->selectedTypeRole)->severalPermissions->toArray();
        }
    }

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
