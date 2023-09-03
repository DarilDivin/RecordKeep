<?php

namespace App\Http\Livewire;

use DateTime;
use App\Models\Fonction;
use Livewire\Component;
use Livewire\WithPagination;

class FonctionsTable extends Component
{
    use WithPagination;

    public $fonction = '';

    public $orderField = 'fonction';

    public $orderDirection = 'ASC';

    public array $fonctionsChecked = [];

    protected $rules = [
        'fonction' => 'nullable|string'
    ];

    public function updatedFonction()
    {
        $this->resetPage();
    }

    public function deletedFonctions(array $ids)
    {
        Fonction::destroy($ids);
        $this->fonctionsChecked = [];
        session()->flash('success', 'Les Fonctions ont bien été supprimé');
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

        $fonctions = Fonction::query();

        if(!empty($this->fonction)){
            $fonctions = $fonctions->where('fonction', 'LIKE', "%{$this->fonction}%");
        }

        return view('livewire.fonctions-table', [
            'fonctions' => $fonctions
                ->orderBy($this->orderField, $this->orderDirection)
                ->get()
        ]);
    }

}
