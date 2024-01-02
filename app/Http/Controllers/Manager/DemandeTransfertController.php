<?php

namespace App\Http\Controllers\Manager;

use App\Models\DemandeTransfert;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DemandeTransfertController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->authorizeResource(DemandeTransfert::class, 'transfert');
    }

    public function index(): View
    {
        $userTransfert =
            DemandeTransfert::query()
            ->where('transfere', 0)
            ->where('user_id', Auth::user()->id)
            ->get()->toArray();
        return view('manager.demande-transfert.transferts', [
            'userTransfert' => $userTransfert
        ]);
    }


    public function show(string $slug, DemandeTransfert $transfert): View | RedirectResponse
    {
        if(!$transfert->sr && $transfert->user_id === Auth::user()->id) {
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
}
