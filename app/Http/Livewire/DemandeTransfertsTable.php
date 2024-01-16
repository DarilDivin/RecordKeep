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
                ->where('user_id', Auth::user()->id)
                ->latest()
                ->paginate(18)
        ]);
    }
}
