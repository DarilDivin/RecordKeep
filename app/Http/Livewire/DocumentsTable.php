<?php

namespace App\Http\Livewire;

use DateTime;
use Livewire\Component;
use App\Models\Division;
use App\Models\Document;
use Livewire\WithPagination;
use App\Models\DemandeTransfert;

class DocumentsTable extends Component
{

    use WithPagination;

    public $nom = '';

    public $services;

    public $divisions;

    public $datecreation = '';

    public $selectedService;

    public $selectedDivision;

    public $orderField = 'nom';

    public $orderDirection = 'ASC';

    public array $documentsChecked = [];

    protected $queryString = [
        'nom' => ['except' => ''],
        'selectedService' => ['except' => ''],
        'selectedDivision' => ['except' => ''],
        'datecreation' => ['except' => ''],
        'orderField' => ['except' => 'nom'],
        'orderDirection' => ['except' => 'ASC']
    ];

    protected $rules = [
        'nom' => 'nullable|string',
        'datecreation' => 'nullable',
    ];

    public function updatedNom()
    {
        $this->resetPage();
    }

    public function updatedDateCreation()
    {
        $this->resetPage();
    }

    public function updatedSelectedService($service_id)
    {
        $this->divisions = Division::where('service_id', $service_id)->pluck('division', 'id');
    }

    public function updatedSelectedDivision($division_id)
    {
        $this->selectedService = Division::find($division_id)->service_id;
    }

    public function destroyDocuments(array $ids)
    {
        Document::destroy($ids);
        $this->documentsChecked = [];
        return session()->flash('success', 'Les Documents ont bien été supprimé');
    }

    public function createTransfertDocuments(array $ids)
    {
        $demandeTransfert = DemandeTransfert::orderBy('created_at', 'desc')->limit(1)->get()->toArray();
        if(empty($demandeTransfert)){
            return session()->flash('error', "Vous n'avez aucune Demande de Transfert de crée !");
        }
        else{
            foreach($ids as $id){
                $document = Document::find($id);
                $document->update([
                    'demande_transfert_id' => $demandeTransfert[0]['id']
                ]);
            }
        }
        $this->documentsChecked = [];
        return session()->flash('success', 'Les Documents ont bien été ajouté à votre Demande de Transfert');
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

        $documents = Document::query();

        if($this->selectedService){
            $documents = $documents->where('service_id', $this->selectedService);
        }

        if($this->selectedDivision){
            $documents = $documents->where('division_id', $this->selectedDivision);
        }

        if(!empty($this->nom)){
            $documents = $documents->where('nom', 'LIKE', "%{$this->nom}%");
        }

        if(!empty($this->datecreation)){
            $documents = $documents->where('datecreation', 'LIKE', "%{$this->datecreation}%");
        }

        return view('livewire.documents-table', [
            'documents' => $documents
                    ->orderBy($this->orderField, $this->orderDirection)
                    ->get(),
        ]);
    }
}
