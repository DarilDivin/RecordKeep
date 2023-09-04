<?php

namespace App\Http\Livewire;

use DateTime;
use Livewire\Component;
use App\Models\Document;
use Livewire\WithPagination;

class ClassedDocumentsTable extends Component
{

    use WithPagination;

    public $nom = '';

    public $code = '';

    public $orderField = 'nom';

    public $orderDirection = 'ASC';

    public array $documentsChecked = [];

    protected $rules = [
        'nom' => 'nullable|string',
    ];

    public function updatedNom()
    {
        $this->resetPage();
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

        if(!empty($this->code)){
            $documents = $documents->where('code', 'LIKE', "%{$this->code}%");
        }

        return view('livewire.classed-documents-table', [
            'documents' => $documents
                ->where('archive', 1)
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(20)
        ]);
    }
}
