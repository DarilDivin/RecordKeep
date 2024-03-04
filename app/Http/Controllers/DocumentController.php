<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DemandePret;
use App\Jobs\DemandePretJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\DocumentDemandeRequest;
use App\Jobs\AcceptDemandePretJob;
use App\Jobs\RejectDemandePretJob;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DocumentController extends Controller
{

    public function index(): View
    {
        return view('user.DocumentPage');
    }

    public function show(string $slug, Document $document): View | RedirectResponse
    {
        $expectedSlug = $document->getSlug();
        if ($slug != $expectedSlug) {
            return to_route('document.show', ['slug' => $expectedSlug, 'document' => $document]);
        }

        return view('user.DemandePrêt', [
            'document' => $document
        ]);
    }

    public function download(Document $document)
    {
        $documentPath = 'public/' . $document->document;
        $document->update([
            'nbrdownload' => ++$document->nbrdownload,
        ]);
        $time = time();
        $documentName = "$time" . "$document->name" . ".pdf";
        return Storage::download($documentPath, $documentName);
    }

    public function demande(Document $document, DocumentDemandeRequest $request)
    {
        if (
            Auth::user()->demandeprets
            ->where('etat', '=', 'Encours')
            ->where('document_id', $document->id)
            ->count() > 0
        ){
            return back()->with(
                'error',
                'Vous avez déjà une demande de prêt pour ce document en cours de traitement, patientez.'
            );
        }

        $lastCreatedDemande = DemandePret::create(array_merge($request->validated(), [
            'user_id' => Auth::user()->id,
            'document_id' => $document->id,
            'etat' => 'Encours'
        ]));

        $routeAccept = route('document.demande.accept', ['demande' => $lastCreatedDemande]);
        $routeReject = route('document.demande.reject', ['demande' => $lastCreatedDemande]);
        DemandePretJob::dispatch($lastCreatedDemande, $routeAccept, $routeReject);

        return back()->with('success', 'Votre demande de prêt a bien été envoyée');
    }

    public function acceptDemande(DemandePret $demande)
    {
        if ($demande->document->demandeprets->where('etat', '=', 'Validé')->count() > 0) {
            return back()->with('error', 'Le document demandé fait déjà objet de prêt.');
        } else {
            if ($demande->etat === 'Encours') {
                AcceptDemandePretJob::dispatch($demande->user->email);
            }
            $demande->update(['etat' => 'Validé']);
            $demande->document()->update([
                'prete' => 1,
                'disponibilite' => 0
            ]);
            return redirect(route('rapport-depart-create', ['demande' => $demande]));
        }
    }

    public function rejectDemande(DemandePret $demande)
    {
        $demande->delete();
        RejectDemandePretJob::dispatch($demande->user->email);
        $demande->document()->update([
            'prete' => 0,
            'disponibilite' => 1
        ]);
        return
            to_route('demande-de-prets')
            ->with('success', 'Le prêteur a bien été notifié que sa Demande de Prêt a été refusée');
    }
}
