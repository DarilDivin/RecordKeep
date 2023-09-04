<?php

namespace App\Http\Livewire;

use DateTime;
use Livewire\Component;
use App\Models\Document;
use Livewire\WithPagination;

class ShowAllTransfertTable extends Component
{
    use WithPagination;

    public $nom = '';

    public $transfert;

    public $orderField = 'nom';

    public $orderDirection = 'ASC';

    public array $documentsChecked = [];

    protected $rules = [
        'nom' => 'nullable|string'
    ];

    public function updatedNom()
    {
        $this->resetPage();
    }

    public function removeDocuments(array $ids)
    {
        foreach($ids as $id){
            $document = Document::find($id);
            $document->update([
                'demande_transfert_id' => null
            ]);
        }
        $this->documentsChecked = [];
        session()->flash('success', 'Les Documents ont bien été retiré de la Demande de Transfert');
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

        $documents = Document::query()->where('demande_transfert_id', $this->transfert->id);

        if(!empty($this->nom)){
            $documents = $documents->where('nom', 'LIKE', "%{$this->nom}%");
        }

        return view('livewire.show-all-transfert-table', [
            'documents' => $documents
                ->where('archive', 0)
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(20)
        ]);
    }

}
