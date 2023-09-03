<?php

namespace App\Http\Livewire;

use App\Models\DemandeTransfert;
use Livewire\Component;

class AllTransfertsTable extends Component
{
    public $libelle;

    public function render()
    {
        $transferts = DemandeTransfert::query();

        if(!empty($this->libelle)){
            $transferts = $transferts->where('libelle', 'LIKE', "%{$this->libelle}%");
        }

        return view('livewire.all-transferts-table', [
            'transferts' => $transferts
                    ->where('transfere', 1)
                    ->latest()
                    ->get()
        ]);
    }
}
