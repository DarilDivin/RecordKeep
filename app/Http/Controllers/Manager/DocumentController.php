<?php

namespace App\Http\Controllers\Manager;

use App\Models\Service;
use App\Models\Division;
use App\Models\Document;
use App\Models\Fonction;
use App\Models\Direction;
use App\Models\NatureDocument;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Manager\DocumentFormRequest;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Document::class, 'document');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('manager.document.documents');
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $document =  new Document();
        /* $document->fill([
            'reference' => 'N°564/DPAF/MISP/SGHTE/DPRF/SA',
            'objet' => 'Autorisation de stage',
            'expediteur' => 'DPAF',
            'destinataire' => 'Daniel'
        ]); */

        $directions = Direction::orderBy('id')->get();
        /* $services = $directions->first()->services->sortBy('service'); */
        $services = Auth::user()->direction->services->sortBy('service');
        return view('manager.document.document-form',[
            'document' => $document,
            'services' => $services,
            'directions' => $directions,
            'fonctions' => Fonction::getAllFonctions(),
            'natures' => NatureDocument::getAllNatureDocuments(),
            'divisions' => $services->first()->divisions->sortBy('division')
        ]);
    }

    private function withDocuments(Document $document, DocumentFormRequest $request): array
    {
        $data = $request->validated();
        /*
            if(Service::find($data['service_id'])->service === 'Aucun') {
                $data['service_id'] = null;
            }
            if(Division::find($data['division_id'])->division === 'Aucune') {
                $data['division_id'] = null;
            }
        */
        $data['motclefs'] = '#' . implode('#', $request->validated('motclefs'));
        unset($data['fonctions']);
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
     * Store a newly created resource in storage.
     */
    public function store(DocumentFormRequest $request): RedirectResponse
    {
        /* $functionsIds = [];
        $functions = Fonction::all()->toArray();
        array_map(function ($function) use (&$functionsIds) {
            $functionsIds[] = (string)$function['id'];
        }, $functions);
        dump($functionsIds);
        dump(request()->fonctions);
        dump(count(array_intersect(request()->fonctions, $functionsIds)));
        dd(count($functionsIds) === count(array_intersect(request()->fonctions, $functionsIds))); */
        $document = Document::create(array_merge(
            $this->withDocuments(new Document(), $request), [
                'nom' => $request->objet
            ]
        ));
        $document->fonctions()->sync($request->fonctions);
        return redirect()
            ->route('manager.document.index')
            ->with('success', 'Le Document a bien été crée');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document): View
    {
        return view('manager.document.document-form',[
            'document' => $document,
            'fonctions' => Fonction::getAllFonctions(),
            'directions' => Direction::orderBy('id')->get(),
            'natures' => NatureDocument::getAllNatureDocuments(),
            'services' => $document->direction->services->sortBy('service'),
            'divisions' => $document->service->divisions->sortBy('division')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentFormRequest $request, Document $document): RedirectResponse
    {
        $document->update(array_merge(
            $this->withDocuments($document, $request), [
                'nom' => $request->objet
            ]
        ));
        $document->fonctions()->sync($request->fonctions);
        return redirect()
            ->route('manager.document.index')
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
            ->route('manager.document.index')
            ->with('success', 'Le Document a bien été supprimé');
    }

}
