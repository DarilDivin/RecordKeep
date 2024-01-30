<?php

namespace App\Http\Controllers\Manager;

use App\Models\DemandeTransfert;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\BordereauTransfert;
use Illuminate\Http\RedirectResponse;

class AllTransfertsController extends Controller
{
    public function all(): View
    {
        $this->authorize('all', DemandeTransfert::class);
        return view('manager.all-demande-transfert.transferts');
    }

    public function one(string $slug, DemandeTransfert $transfert): View | RedirectResponse
    {
        $this->authorize('one', $transfert);
        if($slug !== $transfert->getSlug()){
            return to_route('manager.transfert.show', [
                'slug' => $transfert->getSlug(),
                'transfert' => $transfert
            ]);
        }
        return view('manager.all-demande-transfert.transfert-show', [
            'transfert' => $transfert
        ]);
        if($transfert->documents->count() == 0){
            return redirect()
            ->route('manager.transfert.all')
            ->with('error', 'La Demande de Transfert ne contient plus aucun document non archivé');
        }
    }

    public function showBordereauForm(DemandeTransfert $transfert)
    {
        $this->authorize('showBordereauForm', $transfert);
        if($transfert->documents->count() > 0){
            return view('manager.all-demande-transfert.bordereau-form', [
                'transfert' => $transfert
            ]);
        }
        return redirect()
            ->route('manager.transfert.all')
            ->with('error', 'La Demande de Transfert ne contient aucun document');
    }

    public function accept(DemandeTransfert $transfert)
    {
        $this->authorize('accept', $transfert);
        if($transfert->documents->count() > 0){
            request()->validate(['observation' => ['required']]);
            $transfert->update([
                'valide' => 1
            ]);
            $bordereau = BordereauTransfert::create([
                'observation' => request()->observation,
                'demande_transfert_id' => $transfert->id
            ]);
            return to_route('manager.transfert.all')->with('success', 'Votre Bordereau à été bien crée.  <a target="_blank" href="' . route('manager.transfert.bordereau-show', ['bordereau' => $bordereau->id]) . '"> Cliquez ici pour y accéder </a>');
        }
        return redirect()
            ->route('manager.transfert.all')
            ->with('error', 'La Demande de Transfert ne contient aucun document');
    }

    public function show(BordereauTransfert $bordereau)
    {
        $this->authorize('show', $bordereau->demandetransfert);
        return view('manager.all-demande-transfert.bordereau-preview', [
            'transfert' => $bordereau->demandetransfert
        ]);
    }

    public function cwithdraw (DemandeTransfert $transfert) {
        $transfert->update(['cw' => 1]);
        return redirect()
            ->route('manager.transfert.all')
            ->with('success', 'La Demande de Transfert a été retirée avec succès');
    }

}
