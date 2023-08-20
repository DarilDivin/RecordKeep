<?php

namespace App\Http\Livewire;

use DateTime;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RolesTable extends Component
{
    use WithPagination;

    public $roles;

    public $search = '';

    public $orderField = 'name';

    public $orderDirection = 'ASC';

    public array $rolesChecked = [];

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function deletedRoles(array $ids)
    {
        Role::destroy($ids);
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

    public function render()
    {
        $this->roles = Role::where('name', 'LIKE', "%{$this->search}%")
            ->orderBy($this->orderField, $this->orderDirection)
            ->get();

        return view('livewire.roles-table', [
            'roles' => $this->roles
        ]);
    }
}
