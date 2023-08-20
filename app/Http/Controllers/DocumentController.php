<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DemandePret;
use App\Jobs\DemandePretJob;
use App\Mail\AcceptDemandeMail;
use App\Mail\RejectDemandeMail;
use App\Events\DemandePretEvent;
use App\Mail\DocumentDemandeMail;
use App\Events\AcceptDemandeEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SearchDocumentRequest;
use App\Http\Requests\DocumentDemandeRequest;

class DocumentController extends Controller
{
    public function index(SearchDocumentRequest $request)
    {
        $documents = Document::query()->orderBy('created_at', 'desc');

        if ($nom = $request->validated('nom')) {
            $documents = $documents->where('nom', 'like', "%{$nom}%");
        }
        if ($dateDébut = $request->validated('dateDébut')) {
            $documents = $documents->where('datecreation', '>=', $dateDébut);
        }
        if ($dateFin = $request->validated('dateFin')) {
            $documents = $documents->where('datecreation', '<=', $dateFin);
        }
        if ($motclé = $request->validated('motclé')) {
            $documents = $documents->where('motclefs', 'like', "%{$motclé}%");
        }

        return view('user.DocumentPage', [
            'documents' => $documents->paginate(10),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Document $document)
    {
        $expectedSlug = $document->getSlug();
        if ($slug != $expectedSlug) {
            return to_route('document.show', ['slug' => $expectedSlug, 'document' => $document]);
        }

        return view('user.DemandePrêt', [
            'document' => $document
        ]);
    }

    public function demande(Document $document, DocumentDemandeRequest $request)
    {
        $lastCreatedDemande = DemandePret::create(array_merge($request->validated(), [
            'user_id' => Auth::user()->id,
            'document_id' => $document->id,
            'etat' => 'encour'
        ]));

        $routeAccept = route('document.demande.accept', ['demande' => $lastCreatedDemande]);
        $routeReject = route('document.demande.reject', ['demande' => $lastCreatedDemande]);
        DemandePretJob::dispatch($lastCreatedDemande, $routeAccept, $routeReject);

        return back()->with('success', 'Votre demande a bien été envoyée');
    }

    public function acceptDemande(DemandePret $demande)
    {

        $demande->update(['etat' => 'validé']);

        Mail::send(new AcceptDemandeMail($demande->user->email));

        return redirect(route('rapport-depart-create', ['demande' => $demande]));
    }

    public function rejectDemande(DemandePret $demande)
    {

        DemandePret::destroy($demande);

        Mail::send(new RejectDemandeMail($demande->user->email));

        return to_route('document.index')->with('success', 'Votre demande a bien été envoyée');
    }
}
