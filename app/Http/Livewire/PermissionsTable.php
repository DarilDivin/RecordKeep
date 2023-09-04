<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;

class PermissionsTable extends Component
{

    use WithPagination;

    public $permission = '';

    public $orderField = 'name';

    public $orderDirection = 'ASC';

    public array $permissionsChecked = [];

    protected $rules = [
        'permission' => 'nullable|string'
    ];

    public function updatedPermission()
    {
        $this->resetPage();
    }

    public function deletedPermissions(array $ids)
    {
        Permission::destroy($ids);
        $this->permissionsChecked = [];
        session()->flash('success', 'Les Permissions ont bien été supprimé');
    }

    public function setOrderField($field)
    {
        if($this->orderField === $field){
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC' : 'ASC';
        }
        else {
            $this->orderField = $field;
            $this->reset('orderDirection');
        }
    }

    public function paginationView()
    {
        return 'shared.pagination';
    }

    public function render()
    {
        $this->validate();

        $permissions = Permission::query();

        if(!empty($this->permission)){
            $permissions = $permissions->where('name', 'LIKE', "%{$this->permission}%");
        }

        return view('livewire.permissions-table', [
            'permissions' => $permissions
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(20)
        ]);
    }
}
