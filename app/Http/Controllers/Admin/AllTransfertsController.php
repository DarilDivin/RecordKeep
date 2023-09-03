<?php

namespace App\Http\Controllers\Admin;

use App\Models\DemandeTransfert;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AllTransfertsController extends Controller
{
    /* FOR CENTRALES MANAGERS */

    /* ------------------------------------------------------------------------------------------------------ */

    public function index(): View
    {
        return view('admin.all-demande-transfert.transferts');
    }

    public function show(string $slug, DemandeTransfert $transfert): View | RedirectResponse
    {
        if($transfert->transfere){
            if($slug !== $transfert->getSlug()){
                return to_route('admin.transfert.show', [
                    'slug' => $transfert->getSlug(),
                    'transfert' => $transfert
                ]);
            }
            return view('admin.all-demande-transfert.transfert-show', [
                'transfert' => $transfert
            ]);
        }
    }

    public function destroy(DemandeTransfert $transfert): RedirectResponse
    {
        self::alert($transfert);
        if($transfert->transfere && empty($transfert->documents->toArray())){
            $transfert->delete();
            return redirect()
                ->route('admin.all-transferts.index')
                ->with('success', 'La Demande de Transfert  a bien été supprimé');
        }
        return redirect()->route('admin.all-transferts.index');
    }

    public function accept()
    {

    }

    public static function alert(DemandeTransfert $transfert)
    {
        if(!empty($transfert->documents->toArray())){
            return redirect()
                ->route('admin.transfert.index')
                ->with('error', 'Finalisez les Opérations pour cette Demande de Transfert avant de procéder à sa suppression');
        }
    }
}
