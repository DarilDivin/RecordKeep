<?php

namespace App\Http\Livewire;

use App\Models\BoiteArchive;
use App\Models\ChemiseDossier;
use Livewire\Component;

class ClassementDynamicSelect extends Component
{

    public $document;

    public $chemises;

    public $boites;

    public $rayons;

    public $selectedRayon = null;

    public $selectedBoite = null;

    public $selectedChemise = null;

    public function updatedSelectedRayon($rayon_id)
    {
        $this->boites = BoiteArchive::where('rayon_rangement_id', $rayon_id)->pluck('libelle', 'id');
        if(!empty(array_key_first($this->boites->toArray()))){
            $this->chemises = ChemiseDossier::where('boite_archive_id', array_key_first($this->boites->toArray()))->pluck('libelle', 'id');
        }
    }

    public function updatedSelectedBoite($boite_id)
    {
        $this->chemises = ChemiseDossier::where('boite_archive_id', $boite_id)->pluck('libelle', 'id');
        $this->selectedRayon = BoiteArchive::find($boite_id)->rayon_rangement_id;
    }

    public function updatedSelectedChemise($chemise_id)
    {

    }

    public function render()
    {
        return view('livewire.classement-dynamic-select');
    }
}
