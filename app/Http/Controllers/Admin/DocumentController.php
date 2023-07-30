<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Document;
use App\Models\Direction;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\DocumentFormRequest;
use App\Models\Division;
use App\Models\Fonction;
use App\Models\NatureDocument;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.document.documents',[
            'documents' => Document::all()
        ]);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $document =  new Document();
        $document->fill([
            'nom' => 'Autorisation de stage',
            'signature' => 'N°564/DPAF/MISP/SGHTE/DPRF/SA',
            'objet' => 'Autorisation de stage',
            'emetteur' => 'DPAF',
            'recepteur' => 'Daniel',
            'dua' => 10,
        ]);

        return view('admin.document.document-form',[
            'document' => $document,
            'directions' => Direction::getAllDirections(),
            'services' => Service::getAllServices(),
            'divisions' => Division::getAllDivisions(),
            'natures' => NatureDocument::getAllNatureDocuments(),
            'fonctions' => Fonction::getAllFonctions()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentFormRequest $request)
    {
        $document = Document::create($this->withDocuments(new Document(), $request));
        $document->fonctions()->sync($request->fonction);
        return redirect()
            ->route('admin.document.index')
            ->with('success', 'Le Document a bien été crée');
    }

    private function withDocuments(Document $document, DocumentFormRequest $request): array
    {
        $data = $request->validated();
        unset($data['fonction']);
        $documentCollection = $data['document'];
        /* if($document->document) Storage::delete($document->document, 'public'); */
        $data['document'] = $documentCollection->store('documents', 'public');
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return view('admin.document.document-form',[
            'document' => $document,
            'directions' => Direction::getAllDirections(),
            'services' => Service::getAllServices(),
            'divisions' => Division::getAllDivisions(),
            'natures' => NatureDocument::getAllNatureDocuments(),
            'fonctions' => Fonction::getAllFonctions()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentFormRequest $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $document->delete();
        if($document->document !== '')
        {
            $documentpath = 'public/' . $document->document;
            if(Storage::exists($documentpath)) Storage::delete('public/' . $document->document);
        }
        return redirect()
            ->route('admin.document.index')
            ->with('success', 'Le Document a bien été supprimé');
    }
}
