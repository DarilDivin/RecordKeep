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

    public $selectedRayon;

    public $selectedBoite;

    public $selectedChemise;

    public function mount()
    {
        if(!is_null($this->document->chemisedossier)){
            $this->selectedChemise = $this->document->chemise_dossier_id;
            $this->selectedBoite = $this->document->chemisedossier->boite_archive_id;
            $this->selectedRayon = $this->document->chemisedossier->boitearchive->rayon_rangement_id;
        }
    }

    public function updatedSelectedRayon($rayon_id)
    {
        $this->boites = BoiteArchive::where('rayon_rangement_id', $rayon_id)->pluck('libelle', 'id');
        if(!empty(array_key_first($this->boites->toArray()))){
            $this->chemises = ChemiseDossier::where('boite_archive_id', array_key_first($this->boites->toArray()))->pluck('libelle', 'id');
        }
        else {
            $this->chemises = [];
        }
    }

    public function updatedSelectedBoite($boite_id)
    {
        $this->chemises = ChemiseDossier::where('boite_archive_id', $boite_id)->pluck('libelle', 'id');
        $this->selectedRayon = BoiteArchive::find($boite_id)->rayon_rangement_id;
    }

    public function updatedSelectedChemise($chemise_id)
    {
        $this->selectedBoite = ChemiseDossier::find($chemise_id)->boite_archive_id;
        $this->selectedRayon = BoiteArchive::find($this->selectedBoite)->rayon_rangement_id;
    }

    public function render()
    {
        return view('livewire.classement-dynamic-select');
    }
}
