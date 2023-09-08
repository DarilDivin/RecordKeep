<?php

namespace App\Http\Controllers\Manager;

use App\Models\Document;
use App\Models\DemandeTransfert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\DemandeTransfertFormRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DemandeTransfertController extends Controller
{
    /* FOR STANDARDS MANAGERS */

    /* ------------------------------------------------------------------------------------------------------ */

    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->authorizeResource(DemandeTransfert::class, 'transfert');
    }

    public function index(): View
    {
        return view('manager.demande-transfert.transferts', [
            'showButton' => DemandeTransfert::where('transfere', 0)->get()->toArray(),
            'currentTransfert' => DemandeTransfert::where('transfere', 0)->get()->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View | RedirectResponse
    {
        if(!empty(DemandeTransfert::where('transfere', 0)->get()->toArray())){
            return redirect()
                ->route('manager.transfert.index')
                ->with('error', 'Vous avez déjà une Demande de Transfert non validée en attente');
        }
        return view('manager.demande-transfert.transfert-form', [
            'transfert' => new DemandeTransfert(),
            'documents' => Document::getDocumentsNotHaveTransfer()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DemandeTransfertFormRequest $request): RedirectResponse
    {
        $demande = DemandeTransfert::create([
            'user_id' => Auth::user()->id,
            'transfere' => 0,
            'libelle' => $request->validated('libelle')
        ]);
        if(array_key_exists('documents', $request->validated())){
            foreach($request->documents as $documentId){
                $document = Document::find($documentId);
                $document->update([
                    'demande_transfert_id' => $demande->id
                ]);
            }
        }
        return redirect()
            ->route('manager.transfert.index')
            ->with('success', 'La Demande de Transfert a bien été créé');
    }


    public function show(string $slug, DemandeTransfert $transfert): View | RedirectResponse
    {
        self::alertAfterTransfert($transfert);
        if(!$transfert->transfere){
            if($slug !== $transfert->getSlug()){
                return to_route('manager.transfert.show', [
                    'slug' => $transfert->getSlug(),
                    'transfert' => $transfert
                ]);
            }
            return view('manager.demande-transfert.transfert-show', [
                'transfert' => $transfert
            ]);
        }
        return redirect()->route('manager.transfert.index');
    }

    public function removeForStandardTranfer(Document $document, DemandeTransfert $transfert): RedirectResponse
    {
        $this->authorize('removeForStandardTranfer', $transfert);
        $document->update([
            'demande_transfert_id' => null
        ]);
        return redirect()
            ->route('manager.transfert.show', ['slug' => $transfert->getSlug(), 'transfert' => $transfert])
            ->with('success', 'Le Document a bien été retiré de la Demande de Transfert');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DemandeTransfert $transfert): View | RedirectResponse
    {
        $documents = Document::where('demande_transfert_id', null)
            ->orWhere('demande_transfert_id', $transfert->id)
            ->pluck('nom', 'id');
        if(empty(DemandeTransfert::where('transfere', 0)->get()->toArray())){
            return redirect()
                ->route('manager.transfert.index')
                ->with('error', 'Créer une nouvelle Demande de Transfert pour pouvoir éffectuer cette action');
        }
        return view('manager.demande-transfert.transfert-form', [
            'transfert' => $transfert,
            'documents' => $documents
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DemandeTransfertFormRequest $request, DemandeTransfert $transfert): RedirectResponse
    {
        $transfert->update([
            'libelle' => $request->validated('libelle')
        ]);
        foreach($transfert->documents->pluck('id') as $id){
            $document = Document::find($id);
            $document->update([
                'demande_transfert_id' => null
            ]);
        }
        if(array_key_exists('documents', $request->validated())){
            foreach($request->documents as $documentId){
                $document = Document::find($documentId);
                $document->update([
                    'demande_transfert_id' => $transfert->id
                ]);
            }
        }
        return redirect()
            ->route('manager.transfert.index')
            ->with('success', 'La Demande de Transfert a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DemandeTransfert $transfert): RedirectResponse
    {
        self::alertAfterTransfert($transfert);
        if(!$transfert->transfere){
            $transfert->delete();
            foreach($transfert->documents->pluck('id') as $documentId){
                $document = Document::find($documentId);
                $document->update([
                    'demande_transfert_id' => null
                ]);
            }
            return redirect()
                ->route('manager.transfert.index')
                ->with('success', 'La Demande de Transfert  a bien été supprimé');
        }
        return redirect()->route('manager.transfert.index');
    }

    public function sending(DemandeTransfert $transfert): RedirectResponse
    {
        $this->authorize('sending', $transfert);
        if(empty($transfert->documents->toArray())){
            return redirect()
                ->route('manager.transfert.index')
                ->with('error', 'Impossible de valider un transfert vide.');
        }
        self::alertAfterTransfert($transfert);
        if(!$transfert->transfere && !empty($transfert->documents->toArray())){
            $transfert->update([
                'transfere' => 1
            ]);
            return redirect()
                ->route('manager.transfert.index')
                ->with('success', 'Les Documents ont bien été transféré');
        }
        return redirect()->route('manager.transfert.index');
    }


    public static function alertAfterTransfert(DemandeTransfert $transfert)
    {
        if($transfert->transfere){
            return redirect()
                ->route('manager.transfert.index')
                ->with('error', 'Aucune action n\'est plus possible sur cette Demande de Transfert');
        }
    }
}
