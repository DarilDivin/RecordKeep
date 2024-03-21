<?php

namespace App\Http\Livewire;

use App\Models\BoiteArchive;
use DateTime;
use Livewire\Component;
use App\Models\ChemiseDossier;
use Livewire\WithPagination;

class ChemisesTable extends Component
{
    use WithPagination;

    public $code = '';

    public $chemise = '';

    public $selectedBoite;

    public $orderField = 'code';

    public $orderDirection = 'ASC';

    public array $chemisesChecked = [];

    protected $rules = [
        'chemise' => 'nullable|string'
    ];

    public function updatedChemise()
    {
        $this->resetPage();
    }

    public function updatedCode()
    {
        $this->resetPage();
    }

    public function deletedChemises(array $ids)
    {
        ChemiseDossier::destroy($ids);
        $this->chemisesChecked = [];
        session()->flash('success', 'Le(s) Chemise(s) de Dossiers ont bien été supprimé');
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

        $chemises = ChemiseDossier::query();

        if($this->selectedBoite){
            $chemises = $chemises->where('boite_archive_id', $this->selectedBoite);
        }

        if(!empty($this->chemise)){
            $chemises = $chemises->where('libelle', 'LIKE', "%{$this->chemise}%");
        }

        if(!empty($this->code)){
            $chemises = $chemises->where('code', 'LIKE', "%{$this->code}%");
        }

        return view('livewire.chemises-table', [
            'chemises' => $chemises
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(20),
            'boites' => BoiteArchive::all()
        ]);
    }

}
