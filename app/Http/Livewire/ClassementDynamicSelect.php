<?php

namespace App\Http\Livewire;

use App\Models\BoiteArchive;
use App\Models\ChemiseDossier;
use App\Models\RayonRangement;
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
        /* dd($this->selectedRayon); */

        if(old('chemise_dossier_id')) {
            $this->selectedChemise = old('chemise_dossier_id');
        }

        if(old('boite_archive_id')) {
            $this->chemises = BoiteArchive::find(old('boite_archive_id'))->chemisedossiers->sortBy('libelle');
            $this->boites = RayonRangement::find(old('rayon_rangement_id'))->boitearchives->sortBy('libelle');
            $this->selectedBoite = old('boite_archive_id');
        }

        if(old('rayon_rangement_id')) {
            $this->boites = RayonRangement::find(old('rayon_rangement_id'))->boitearchives->sortBy('libelle');
            $this->selectedRayon = old('rayon_rangement_id');
        }

    }

    public function updatedSelectedRayon($rayon_id)
    {
        $this->boites = BoiteArchive::where('rayon_rangement_id', $rayon_id)->orderBy('libelle', 'ASC')->get();
        if($this->boites->isNotEmpty()) {
            $this->chemises = ChemiseDossier::where('boite_archive_id', $this->boites->sortBy('libelle')->first()->id)->get();
        }
        else {
            $this->chemises = [];
        }
    }

    public function updatedSelectedBoite($boite_id)
    {
        $this->chemises = ChemiseDossier::where('boite_archive_id', $boite_id)->orderBy('libelle', 'ASC')->get();
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
