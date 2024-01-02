<?php

namespace App\Http\Livewire;

use App\Models\DemandeTransfert;
use Livewire\Component;
use Livewire\WithPagination;

class AllTransfertsTable extends Component
{
    use WithPagination;

    public $libelle;

    public function updatedLibelle()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'shared.pagination';
    }

    public function render()
    {
        $transferts = DemandeTransfert::query();

        if(!empty($this->libelle)){
            $transferts = $transferts->where('libelle', 'LIKE', "%{$this->libelle}%");
        }

        return view('livewire.all-transferts-table', [
            'transferts' => $transferts
                ->where('transfere', 1)
                ->where('cr', 0)
                ->latest()
                ->paginate(18)
        ]);
    }
}
