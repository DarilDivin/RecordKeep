<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DocumentFormRequest;
use App\Models\Document;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

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
            'signature' => 'N°564/DPAF/MISP/SGHTE/DPRF/SA',
            'objet' => 'Autorisation de stage',
            'emetteur' => 'DPAF',
            'recepteur' => 'Daniel',
            'dua' => 10,
        ]);

        return view('admin.document.document-form',[
            'document' => $document,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentFormRequest $request)
    {
        Document::create($this->withDocuments(new Document(), $request));
        return redirect()
            ->route('admin.document.index')
            ->with('success', 'Le Document a bien été crée');
    }

    private function withDocuments(Document $document, DocumentFormRequest $request): array
    {
        $data = $request->validated();
        $document = $data['document'];
        /* if($document->document) Storage::delete($document->document, 'public'); */
        $data['document'] = $document->store('documents', 'public');
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return view('admin.document.document-form', [
            'document' => $document
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

    }
}
