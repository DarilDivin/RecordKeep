<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Document;

class DocumentsTable extends Component
{

    public $documents;

    public function render()
    {
        $this->documents = Document::latest('created_at')->get();

        return view('livewire.documents-table', [
            'documents' => $this->documents
        ]);
    }
}
