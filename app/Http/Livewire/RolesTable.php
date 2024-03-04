<?php

namespace App\Http\Livewire;

use DateTime;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RolesTable extends Component
{
    use WithPagination;

    public $role = '';

    public $orderField = 'name';

    public $orderDirection = 'ASC';

    public array $rolesChecked = [];

    protected $rules = [
        'role' => 'nullable|string'
    ];

    public function updatedRole()
    {
        $this->resetPage();
    }

    public function deletedRoles(array $ids)
    {
        Role::destroy($ids);
        $this->rolesChecked = [];
        session()->flash('success', 'Le(s) Rôle(s) ont bien été supprimé');
    }

    public function setOrderField(string | int | DateTime  $field)
    {
        if($field === $this->orderField){
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

        $roles = Role::query();

        if(!empty($this->role)){
            $roles = $roles->where('name', 'LIKE', "%{$this->role}%");
        }

        return view('livewire.roles-table', [
            'roles' => $roles
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(20)
        ]);
    }
}
