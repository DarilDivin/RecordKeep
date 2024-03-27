<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RapportPret;
use Livewire\WithPagination;

class RapportPretsTable extends Component
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

    public function render()
    {

        $rapports = RapportPret::query();

        if (!empty($this->user)) {
            $rapports = RapportPret::whereHas('demandePret', function ($query) {
                $query->whereHas('user', function ($query) {
                    $query->where('nom', 'LIKE', "%{$this->user}%")->OrWhere('prenoms', 'LIKE', "%{$this->user}%");
                });
            });
        }

        if (!empty($this->document)) {
            $rapports = RapportPret::whereHas(
                'demandePret',
                fn ($query) => $query->whereHas(
                    'document',
                    fn ($query) => $query->where('nom', 'LIKE', "%{$this->document}%")
                )
            );
        }

        return view('livewire.rapport-prets-table', [
            'rapports' => $rapports->where('type', '=', 'Départ')
            ->orderBy('created_at', 'desc')
            ->paginate(15),
        ]);
    }
}
