<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DemandePret;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;

class DemandePretsTable extends Component
{

    use WithPagination;

    public string $user;

    public string $document;

    public function updatedUser() : void
    {
        $this->resetPage();
    }

    public function updatedDocument() : void
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'shared.pagination';
    }

    public function render() : View
    {
        $demandes = DemandePret::query();

        if (!empty($this->user)) {
            $demandes = DemandePret::whereHas(
                'user',
                fn ($query) => $query->where('nom', 'LIKE', "%{$this->user}%")->OrWhere('prenoms', 'LIKE', "%{$this->user}%")
            );
        }

        if (!empty($this->document)) {
            $demandes = DemandePret::whereHas(
                'document',
                fn ($query) => $query->where('nom', 'LIKE', "%{$this->document}%")
            );
        }

        return view('livewire.demande-prets-table', [
            'demandes' => $demandes
            ->paginate(15)
        ]);
    }
}
