<?php

namespace App\Http\Controllers\Manager;

use App\Models\Document;
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
        if($transfert->transfere && $transfert->documents->where('archive', 0)->count() > 0){
            if($slug !== $transfert->getSlug()){
                return to_route('manager.transfert.show', [
                    'slug' => $transfert->getSlug(),
                    'transfert' => $transfert
                ]);
            }
            return view('manager.all-demande-transfert.transfert-show', [
                'transfert' => $transfert
            ]);
        }
        return redirect()->route('manager.transfert.all');
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
            BordereauTransfert::create([
                'observation' => request()->observation,
                'demande_transfert_id' => $transfert->id
            ]);
            return view('manager.all-demande-transfert.bordereau-preview', [
                'transfert' => $transfert
            ]);
        }
        return redirect()
            ->route('manager.transfert.all')
            ->with('error', 'La Demande de Transfert ne contient aucun document');
    }
}
