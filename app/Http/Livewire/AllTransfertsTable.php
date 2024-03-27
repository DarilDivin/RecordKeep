<?php

namespace App\Http\Livewire;

use App\Models\DemandeTransfert;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AllTransfertsTable extends Component
{
    use WithPagination;

    public $libelle;

    public function updatedLibelle() : void
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'shared.pagination';
    }

    public function render() : View
    {
        $transferts = DemandeTransfert::query();

        if(!empty($this->libelle)){
            $transferts = $transferts->where('libelle', 'LIKE', "%{$this->libelle}%");
        }

        return view('livewire.all-transferts-table', [
            'transferts' => $transferts
                ->where('transfere', 1)
                ->where('cw', 0)
                ->latest()
                ->paginate(18),
        ]);
    }
}
