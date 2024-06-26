<?php

namespace App\Http\Livewire;

use DateTime;
use Livewire\Component;
use App\Models\Document;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class DocumentsTable extends Component
{

    use WithPagination;

    public $nom = '';

    public $datecreation = '';

    public $selectedService;

    public $selectedDivision;

    public $orderField = 'nom';

    public $orderDirection = 'ASC';

    public array $documentsChecked = [];

    protected $rules = [
        'nom' => 'nullable|string',
        'datecreation' => 'nullable',
    ];

    public function updatedNom()
    {
        $this->resetPage();
    }

    public function destroyDocuments(array $ids)
    {
        Document::destroy($ids);
        $this->documentsChecked = [];
        return session()->flash('success', 'Les Documents ont bien été supprimé');
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

        $documents = Document::query();

        if(!empty($this->nom)){
            $documents = $documents->where('nom', 'LIKE', "%{$this->nom}%");
        }

        if(!empty($this->datecreation)){
            $documents = $documents->where('datecreation', 'LIKE', "%{$this->datecreation}%");
        }

        return view('livewire.documents-table', [
            'documents' => $documents
                ->where('direction_id', Auth::user()->direction?->id)
                ->where('demande_transfert_id', null)
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(20),
        ]);
    }
}
