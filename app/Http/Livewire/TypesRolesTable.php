<?php

namespace App\Http\Livewire;

use DateTime;
use App\Models\TypeRole;
use Livewire\Component;
use Livewire\WithPagination;

class TypesRolesTable extends Component
{
    use WithPagination;

    public $libelle = '';

    public $orderField = 'libelle';

    public $orderDirection = 'ASC';

    public array $typesChecked = [];

    protected $rules = [
        'libelle' => 'nullable|string'
    ];

    public function updatedLibelle()
    {
        $this->resetPage();
    }

    public function deletedTypesRoles(array $ids)
    {
        TypeRole::destroy($ids);
        $this->typesChecked = [];
        session()->flash('success', 'Les Types de Rôles ont bien été supprimé');
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
        $this->validate();

        $typeroles = TypeRole::query();

        if(!empty($this->libelle)){
            $typeroles = $typeroles->where('libelle', 'LIKE', "%{$this->libelle}%");
        }

        return view('livewire.types-roles-table', [
            'typeroles' => $typeroles
                ->orderBy($this->orderField, $this->orderDirection)
                ->get()
        ]);
    }

}
