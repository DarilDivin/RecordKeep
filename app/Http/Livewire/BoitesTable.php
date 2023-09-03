<?php

namespace App\Http\Livewire;

use DateTime;
use Livewire\Component;
use App\Models\BoiteArchive;
use Livewire\WithPagination;
use App\Models\RayonRangement;

class BoitesTable extends Component
{
    use WithPagination;

    public $boite = '';

    public $code = '';

    public $selectedRayon;

    public $orderField = 'libelle';

    public $orderDirection = 'ASC';

    public array $boitesChecked = [];

    protected $rules = [
        'boite' => 'nullable|string'
    ];

    public function updatedBoite()
    {
        $this->resetPage();
    }

    public function updatedCode()
    {
        $this->resetPage();
    }

    public function deletedBoites(array $ids)
    {
        BoiteArchive::destroy($ids);
        $this->boitesChecked = [];
        session()->flash('success', 'Les Boites d\'Archive ont bien été supprimé');
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

        $boites = BoiteArchive::query();

        if($this->selectedRayon){
            $boites = $boites->where('rayon_rangement_id', $this->selectedRayon);
        }

        if(!empty($this->boite)){
            $boites = $boites->where('libelle', 'LIKE', "%{$this->boite}%");
        }

        if(!empty($this->code)){
            $boites = $boites->where('code', 'LIKE', "%{$this->code}%");
        }

        return view('livewire.boites-table', [
            'boites' => $boites
                ->orderBy($this->orderField, $this->orderDirection)
                ->get(),
            'rayons' => RayonRangement::getAllRayons()
        ]);
    }

}
