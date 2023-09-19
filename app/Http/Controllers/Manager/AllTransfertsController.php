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
    /* FOR CENTRALES MANAGERS */

    /* ------------------------------------------------------------------------------------------------------ */

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

    public function removeForCentralTranfer(Document $document, DemandeTransfert $transfert): RedirectResponse
    {
        $this->authorize('removeForCentralTranfer', $transfert);
        $document->update([
            'demande_transfert_id' => null
        ]);
        return redirect()
            ->route('manager.transfert.one', ['slug' => $transfert->getSlug(), 'transfert' => $transfert])
            ->with('success', 'Le Document a bien été retiré de la Demande de Transfert');
    }

    public function off(DemandeTransfert $transfert): RedirectResponse
    {
        $this->authorize('off', $transfert);
        if($transfert->valide){
            return redirect()
                ->route('manager.transfert.all')
                ->with('error', 'La Demande de Transfert  a déjà été validée');
        }
        if($transfert->transfere && !$transfert->valide){
            $transfert->delete();
            foreach($transfert->documents->pluck('id') as $documentId){
                $document = Document::find($documentId);
                $document->update([
                    'archive' => 0,
                    'chemise_dossier_id' => null,
                    'demande_transfert_id' => null
                ]);
            }
            return redirect()
                ->route('manager.transfert.all')
                ->with('success', 'La Demande de Transfert  a bien été annulé et les documents ont été restitué');
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

    public function removeOfCentralList(DemandeTransfert $transfert): RedirectResponse
    {
        $this->authorize('removeOfCentralList', $transfert);
        if($transfert->valid && $transfert->documents->where('archive', 0)->count() === 0) {
            $transfert->update([
                'cr' => 1
            ]);
            return redirect()
                ->route('manager.transfert.all')
                ->with('succes', 'La Demande de Transfert a bien été retiré de la Liste');
        }
        return redirect()
            ->route('manager.transfert.index')
            ->with('error', 'Finalisez les Opérations de cette Demande de Transfert avant tout retrait !');
    }


  /*   ---------------------------------------------------------------------------------------------------------------------------------------------------- */

    /* INUTILES */

    public function death(DemandeTransfert $transfert): RedirectResponse
    {
        $this->authorize('death', $transfert);
        self::alert($transfert);
        if($transfert->transfere && empty($transfert->documents->toArray())){
            $transfert->delete();
            return redirect()
                ->route('manager.transfert.all')
                ->with('success', 'La Demande de Transfert  a bien été supprimé');
        }
        return redirect()->route('manager.all-transferts.index');
    }

    public static function alert(DemandeTransfert $transfert)
    {
        if(!empty($transfert->documents->toArray())){
            return redirect()
                ->route('manager.transfert.all')
                ->with('error', 'Finalisez les Opérations pour cette Demande de Transfert avant de procéder à sa suppression');
        }
    }
}
