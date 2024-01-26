<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Document;
use App\Models\DemandePret;
use App\Jobs\DemandePretJob;
use App\Mail\AcceptDemandeMail;
use App\Mail\RejectDemandeMail;
use App\Events\DemandePretEvent;
use App\Mail\DocumentDemandeMail;
use App\Events\AcceptDemandeEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\DocumentDemandeRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DocumentController extends Controller
{

    /* public function __construct()
    {
        $this->authorize(Document::class, 'document');
    } */

    public function index(): View
    {
        /* $this->authorize('index', Document::class); */
        return view('user.DocumentPage');
    }

    public function show(string $slug, Document $document): View | RedirectResponse
    {
        /* $this->authorize('show', $document); */
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
            'etat' => 'Encours'
        ]));

        $routeAccept = route('document.demande.accept', ['demande' => $lastCreatedDemande]);
        $routeReject = route('document.demande.reject', ['demande' => $lastCreatedDemande]);
        DemandePretJob::dispatch($lastCreatedDemande, $routeAccept, $routeReject);

        return back()->with('success', 'Votre demande a bien été envoyée');
    }

    public function acceptDemande(DemandePret $demande)
    {

        $demande->update(['etat' => 'Validé']);
        Mail::send(new AcceptDemandeMail($demande->user->email));
        return redirect(route('rapport-depart-create', ['demande' => $demande]));
    }

    public function rejectDemande(DemandePret $demande)
    {

        DemandePret::destroy($demande);
        Mail::send(new RejectDemandeMail($demande->user->email));
        return to_route('document.index')->with('success', 'Le prêteur a bien été notifié que sa Demande de Prêt a été refusée');
    }

    public function download(Document $document)
    {
        $documentPath = 'public/'. $document->document;
        $document->update([
            'nbrdownload' => ++$document->nbrdownload,
        ]);
        $time = time();
        $documentName = "$time"."$document->name".".pdf";
        return Storage::download($documentPath, $documentName);
    }



    /**
     *@param array<int> $postIds;
     */

    // public function filesdownload(Request $request)
    // {
    //     // $selectedCheckboxes = $request->input('document', []);

    //     // $documents[] = Document::where('id', $request->input('document', []))->get();

    //     // foreach($request->input('document', []) as $id) {
    //     foreach($request->input('document', []) as $id) {
    //     $documents[] = Document::where('id', $id)->get();
    //     }

    //     // dd($documents);

    //     // Chemin vers le dossier contenant les fichiers à compresser
    //     $sourcePath = storage_path('app/public/documents'); // Remplacez le chemin par votre propre chemin

    //     // Créez un dossier temporaire pour stocker le fichier compressé
    //     $zipFileName = 'documents.zip';
    //     $tempPath = storage_path('app/temp');

    //     if (!File::exists($tempPath)) {
    //         File::makeDirectory($tempPath, 0755, true);
    //     }

    //     // Chemin complet du fichier compressé
    //     $zipFilePath = $tempPath . '/' . $zipFileName;


    //     // Utilisez la classe ZipArchive pour créer le fichier compressé
    //     $zip = new ZipArchive();
    //     // dd($zip);

    //     if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
    //         // $files = File::files($sourcePath);
    //         // dd(count($documents));
    //         $a = [];
    //         foreach ($documents as $doc) {
    //             for($i = 0; $i < count($doc); $i++){
    //                 $zip->addFile(public_path('storage/'). $doc[$i]->document, $doc[$i]->nom . '.pdf');
    //                 // array_push($a, public_path('storage/'). $doc[0]->document);
    //             }
    //         }
    //         // dd($a);
    //         $zip->close();
    //     }

    //     // Renvoyez le fichier compressé à l'utilisateur
    //     return Response::download($zipFilePath, $zipFileName)->deleteFileAfterSend();

    // }
}
