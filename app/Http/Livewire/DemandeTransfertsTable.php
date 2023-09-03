<?php

namespace App\Http\Livewire;

use App\Models\DemandeTransfert;
use Livewire\Component;

class DemandeTransfertsTable extends Component
{
    public $libelle;

    public $showButton;

    public $currentTransfert;

    public function render()
    {
        $transferts = DemandeTransfert::query();

        if(!empty($this->libelle)){
            $transferts = $transferts->where('libelle', 'LIKE', "%{$this->libelle}%");
        }

        return view('livewire.demande-transferts-table', [
            'transferts' => $transferts
                    ->latest()
                    ->get()
        ]);
    }
}
