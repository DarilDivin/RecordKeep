<?php

namespace App\Http\Controllers;

use App\Events\AcceptDemandeEvent;
use App\Events\DemandePretEvent;
use App\Http\Requests\DocumentDemandeRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Requests\SearchDocumentRequest;
use App\Jobs\DemandePretJob;
use App\Mail\AcceptDemandeMail;
use App\Mail\DocumentDemandeMail;
use App\Mail\RejectDemandeMail;
use App\Models\DemandePret;
use Illuminate\Support\Facades\Mail;

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
        // DemandePret::create($request->validated());

        DemandePretJob::dispatch($document, $request->validated());

        return back()->with('success', 'Votre demande a bien été envoyée');
    }

    public function acceptDemande(Document $document, string $email, string $name)
    {
        // Mail::send(new AcceptDemandeMail($email));

        // event(new AcceptDemandeEvent($email))

        dd(request()->prenoms);

        // DemandePret::create();

        // return redirect(route('rapport-depart-create', ['document' => $document, 'name' => $name, 'email' => $email]));
    }

    public function rejectDemande(string $destination)
    {
        Mail::send(new RejectDemandeMail($destination));

        return to_route('document.index')->with('success', 'Votre demande a bien été envoyée');
    }
}
