<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Division;
use App\Models\Document;
use App\Models\Fonction;
use App\Models\Categorie;
use App\Models\Direction;
use App\Models\NatureDocument;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\DocumentFormRequest;
use App\Models\DemandeTransfert;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.document.documents');
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
            'source' => 'DPAF',
            'dua' => 10,
        ]);

        return view('admin.document.document-form',[
            'document' => $document,
            'services' => Service::getAllServices(),
            'divisions' => Division::getAllDivisions(),
            'fonctions' => Fonction::getAllFonctions(),
            'categories' => Categorie::getAllCategories(),
            'directions' => Direction::getAllDirections(),
            'natures' => NatureDocument::getAllNatureDocuments(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentFormRequest $request): RedirectResponse
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
        $data['motclefs'] = '#' . implode('#', $request->validated('motclefs'));
        unset($data['fonction']);
        if(array_key_exists('document', $data))
        {
            $documentCollection = $data['document'];
            $data['document'] = $documentCollection->storeAs('documents', $request->file('document')->getClientOriginalName(), 'public');
            $documentpath = 'public/' . $document->document;
            if(Storage::exists($documentpath)) Storage::delete('public/' . $document->document);
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document): View
    {
        return view('admin.document.document-form',[
            'document' => $document,
            'services' => Service::getAllServices(),
            'divisions' => Division::getAllDivisions(),
            'fonctions' => Fonction::getAllFonctions(),
            'categories' => Categorie::getAllCategories(),
            'directions' => Direction::getAllDirections(),
            'natures' => NatureDocument::getAllNatureDocuments(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentFormRequest $request, Document $document): RedirectResponse
    {
        $document->update($this->withDocuments($document, $request));
        $document->fonctions()->sync($request->fonction);
        return redirect()
            ->route('admin.document.index')
            ->with('success', 'Le Document a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document): RedirectResponse
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


    public function removeForStandardTranfer(Document $document, DemandeTransfert $transfert): RedirectResponse
    {
        $document->update([
            'demande_transfert_id' => null
        ]);
        return redirect()
            ->route('admin.transfert.show', ['slug' => $transfert->getSlug(), 'transfert' => $transfert])
            ->with('success', 'Le Document a bien été retiré de la Demande de Transfert');
    }

    public function removeForCentralTranfer(Document $document, DemandeTransfert $transfert): RedirectResponse
    {
        $document->update([
            'demande_transfert_id' => null
        ]);
        return redirect()
            ->route('admin.all-transferts.show', ['slug' => $transfert->getSlug(), 'transfert' => $transfert])
            ->with('success', 'Le Document a bien été retiré de la Demande de Transfert');
    }

}
