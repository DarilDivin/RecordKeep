<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Document;

class Statistiques extends Component
{
    public function incrementConsult(Document $document)
    {
        $document->update([
            'nbrconsult' => ++$document->nbrconsult
        ]);
    }

    public function render()
    {
        return view('livewire.statistiques');
    }
}
