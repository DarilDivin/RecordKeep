<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;

class RoleDynamicSelect extends Component
{
    public $role;

    public $typeroles;

    public $permissions;

    public $selectedTypeRole;

    public $selectedPermissions;

    public $alwaysPermissions;

    public function mount()
    {
        if(old('type_role_id')){
            $this->selectedTypeRole = old('type_role_id');
        }
        if(old('permissions')){
            $this->selectedPermissions = old('permissions');
        }
        /* $this->selectedTypeRole = $this->role->type_role_id; */
    }

    public function updatedSelectedTypeRole($typeRole)
    {
        $this->permissions = Permission::where('type_role_id', $typeRole)->get()->toArray();
        $this->alwaysPermissions = null;
    }

    public function updatedSelectedPermissions($permissions_ids)
    {
       /*  $permissions = [];
        foreach($permissions_ids as $id){
            $permissions[] = Permission::where('id', $id)->get()->toArray();
        }
        dd($permissions);
        $this->alwaysPermissions = array_reduce($permissions, function ($carry, $item) {
            if($carry === null){
                return $item;
            }
            return array_merge($carry, $item);
        });
        dd($this->alwaysPermissions); */
    }

    public function render()
    {
        return view('livewire.role-dynamic-select');
    }
}
