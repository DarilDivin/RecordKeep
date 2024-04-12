<?php

namespace App\Http\Livewire;

use App\Models\DemandeTransfert;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DemandeTransfertsTable extends Component
{
    use WithPagination;

    public string $libelle;

    public string $direction;

    public function updatedLibelle() : void
    {
        $this->resetPage();
    }

    public function updatedDirection() : void
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'shared.pagination';
    }

    public function render() :View
    {
        $transferts = DemandeTransfert::query();

        if(!empty($this->libelle)) {
            $transferts = $transferts->where('libelle', 'LIKE', "%{$this->libelle}%");
        }

        /* if (!empty($this->direction)) {
            $transferts = DemandeTransfert::whereHas('direction', function ($query) {
                $query->where('direction', 'LIKE', "%{$this->direction}%");
            });
        } */

        if (!empty($this->direction)) {
            $transferts = DemandeTransfert::whereHas(
                'direction',
                fn ($query) => $query->where('direction', 'LIKE', "%{$this->direction}%")
            );
        }

        return view('livewire.demande-transferts-table', [
            'transferts' => $transferts
                ->where('direction_id', Auth::user()->direction_id)
                ->where('sw', 0)
                ->latest()
                ->paginate(15),
            'user' => Auth::user()
        ]);
    }
}
