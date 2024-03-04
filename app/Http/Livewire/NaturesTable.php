<?php

namespace App\Http\Livewire;

use DateTime;
use App\Models\NatureDocument;
use Livewire\Component;
use Livewire\WithPagination;

class NaturesTable extends Component
{
    use WithPagination;

    public $nature = '';

    public $orderField = 'nature';

    public $orderDirection = 'ASC';

    public array $naturesChecked = [];

    protected $rules = [
        'nature' => 'nullable|string'
    ];

    public function updatedNature()
    {
        $this->resetPage();
    }

    public function deletedNatures(array $ids)
    {
        NatureDocument::destroy($ids);
        $this->naturesChecked = [];
        session()->flash('success', 'Le(s) Nature(s) de Document(s) ont bien été supprimé');
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

        $natures = NatureDocument::query();

        if(!empty($this->nature)){
            $natures = $natures->where('nature', 'LIKE', "%{$this->nature}%");
        }

        return view('livewire.natures-table', [
            'natures' => $natures
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(20)
        ]);
    }

}
