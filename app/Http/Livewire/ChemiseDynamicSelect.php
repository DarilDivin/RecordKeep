<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BoiteArchive;

class ChemiseDynamicSelect extends Component
{
    public $boites;

    public $rayons;

    public $chemise;

    public $selectedRayon;

    public $selectedBoite;

    public function mount()
    {
        if(!is_null($this->chemise->boitearchive)){
            $this->selectedBoite = $this->chemise->boite_archive_id;
            $this->selectedRayon = $this->chemise->boitearchive->rayon_rangement_id;
        }
    }

    public function updatedSelectedRayon($rayon_id)
    {
        $this->boites = BoiteArchive::where('rayon_rangement_id', $rayon_id)->pluck('libelle', 'id');
    }

    public function updatedSelectedBoite($boite_id)
    {
        $this->selectedRayon = BoiteArchive::find($boite_id)->rayon_rangement_id;
    }

    public function render()
    {
        return view('livewire.chemise-dynamic-select');
    }
}
