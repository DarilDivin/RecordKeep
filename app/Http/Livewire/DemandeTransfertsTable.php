<?php

namespace App\Http\Livewire;

use App\Models\DemandeTransfert;
use Livewire\Component;
use Livewire\WithPagination;

class DemandeTransfertsTable extends Component
{
    use WithPagination;

    public $libelle;

    public $showButton;

    public $currentTransfert;

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

        return view('livewire.demande-transferts-table', [
            'transferts' => $transferts
                ->latest()
                ->paginate(18)
        ]);
    }
}
