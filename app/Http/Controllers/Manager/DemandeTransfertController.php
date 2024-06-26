<?php

namespace App\Http\Controllers\Manager;

use App\Models\DemandeTransfert;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DemandeTransfertController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(DemandeTransfert::class, 'transfert');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('manager.demande-transfert.transferts');
    }


    public function show(string $slug, DemandeTransfert $transfert): View | RedirectResponse
    {
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

    public function sending (DemandeTransfert $transfert) {
        $this->authorize('sending', $transfert);
        $transfert->update(['transfere' => 1]);
        return redirect()
            ->route('manager.transfert.index')
            ->with('success', 'Le Transfert a été éffectué avec succès');
    }

    public function swithdraw (DemandeTransfert $transfert) {
        $transfert->update(['sw' => 1]);
        return redirect()
            ->route('manager.transfert.index')
            ->with('success', 'La Demande de Transfert a été retirée avec succès');
    }

}
