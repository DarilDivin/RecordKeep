<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DemandePret;
use App\Jobs\DemandePretJob;
use Illuminate\Http\Request;
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

        // dd($documents->items());

        return view('user.DocumentPage', [
            'documents' => $documents->paginate(10),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Document $document)
    {
        $expectedSlug = $document->getSlug();
        // dd($expectedSlug);
        // dd($document->naturedocument);
        if($slug != $expectedSlug) {
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
        ]));

        // dd(Mail::send(new DocumentDemandeMail($lastCreatedDemande)));

        // dd(route('document.demande.accept', ['demande' => $lastCreatedDemande]));
        DemandePretJob::dispatch($lastCreatedDemande);

        return back()->with('success', 'Votre demande a bien été envoyée');
    }

    public function acceptDemande(DemandePret $demande)
    {
        // dd($demande->user->email);
        Mail::send(new AcceptDemandeMail($demande->user->email));

        // event(new AcceptDemandeEvent($email))

        // dd(request()->prenoms);

        // DemandePret::create();

        // return redirect(route('rapport-depart-create', ['document' => $document, 'name' => $name, 'email' => $email]));
    }

    public function rejectDemande(DemandePret $demande)
    {
        Mail::send(new RejectDemandeMail($demande->user->email));

        return to_route('document.index')->with('success', 'Votre demande a bien été envoyée');
    }
}
