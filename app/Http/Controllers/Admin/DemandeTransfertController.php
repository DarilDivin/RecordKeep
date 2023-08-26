<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DemandeTransfertFormRequest;
use App\Models\DemandeTransfert;
use App\Models\Document;
use Illuminate\Contracts\View\View;

class DemandeTransfertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.demande-tranfert.transferts', [
            'transferts' => DemandeTransfert::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.demande-tranfert.transfert-form', [
            'transfert' => new DemandeTransfert(),
            'documents' => Document::getAllDocuments()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DemandeTransfertFormRequest $request)
    {
        $data = $request->validated();
        unset($data['documents']);
        $demande = DemandeTransfert::create($data);
        foreach($request->documents as $documentId){
            $document = Document::find($documentId);
            $document->update([
                'demande_transfert_id' => $demande->id
            ]);
        }
        return redirect()
            ->route('admin.transfert.index')
            ->with('success', 'La Demande de Transfert a bien été créé');
    }


    public function show(string $slug, DemandeTransfert $transfert)
    {
        if($slug !== $transfert->getSlug()){
            return to_route('admin.transfert.show', [
                'slug' => $transfert->getSlug(),
                'transfert' => $transfert
            ]);
        }
        return view('admin.demande-tranfert.transfert-show', [
            'documents' => $transfert->documents
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DemandeTransfert $transfert)
    {
        return view('admin.demande-tranfert.transfert-form', [
            'transfert' => $transfert,
            'documents' => Document::getAllDocuments()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DemandeTransfertFormRequest $request, DemandeTransfert $transfert)
    {
        $transfert->update($request->validated());
        return redirect()
            ->route('admin.transfert.index')
            ->with('success', 'La Demande de Transfert a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DemandeTransfert $transfert)
    {
        $transfert->delete();
        return redirect()
            ->route('admin.transfert.index')
            ->with('success', 'La Demande de Transfert  a bien été supprimée');
    }
}
