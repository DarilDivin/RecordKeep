<?php

namespace App\Http\Livewire;

use App\Models\DemandeTransfert;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DemandeTransfertsTable extends Component
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

        return view('livewire.demande-transferts-table', [
            'transferts' => $transferts
                ->where('direction_id', Auth::user()->direction_id)
                ->where('sw', 0)
                ->latest()
                ->paginate(18),
            'user' => Auth::user()
        ]);
    }
}
