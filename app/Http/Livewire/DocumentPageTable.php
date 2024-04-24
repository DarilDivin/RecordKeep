<?php

namespace App\Http\Livewire;

use ZipArchive;
use Livewire\Component;
use App\Models\Document;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class DocumentPageTable extends Component
{

    use WithPagination;

    public $nom = '';

    public $dateDeb = '';

    public $dateFin = '';

    public $motclefs = '';

    public $documentChecked = [];

    public function updatedNom()
    {
        $this->resetPage();
    }

    public function updatedDateFin()
    {
        $this->resetPage();
    }

    public function updatedDateDeb()
    {
        $this->resetPage();
    }

    public function updatedMotclefs()
    {
        $this->resetPage();
    }

    public function filesdownload(array $ids)
    {
        foreach($ids as $id) {
            $documents[] = Document::where('id', $id)->get();
        }

        // dd($documents);

        // Chemin vers le dossier contenant les fichiers à compresser
        $sourcePath = storage_path('app/public/documents'); // Remplacez le chemin par votre propre chemin

        // Créez un dossier temporaire pour stocker le fichier compressé
        $zipFileName = 'documents.zip';
        $tempPath = storage_path('app/temp');

        if (!File::exists($tempPath)) {
            File::makeDirectory($tempPath, 0755, true);
        }

        // Chemin complet du fichier compressé
        $zipFilePath = $tempPath . '/' . $zipFileName;


        // Utilisez la classe ZipArchive pour créer le fichier compressé
        $zip = new ZipArchive();
        // dd($zip);

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
            /* $files = File::files($sourcePath);
            dd(count($documents));
            $a = []; */
            foreach ($documents as $doc) {
                for($i = 0; $i < count($doc); $i++){
                    $zip->addFile(public_path('storage/'). $doc[$i]->document, $doc[$i]->nom . '.pdf');
                    $doc[$i]->update([
                        'nbrdownload' => ++$doc[$i]->nbrdownload
                    ]);
                }
            }
            // dd($a);
            $zip->close();
        }

        // Renvoyez le fichier compressé à l'utilisateur
        return Response::download($zipFilePath, $zipFileName)->deleteFileAfterSend();

    }

    public function incrementConsult(Document $document)
    {
        $document->update([
            'nbrconsult' => ++$document->nbrconsult
        ]);
    }

    public function paginationView()
    {
        return 'shared.pagination';
    }

    public function render()
    {
        $visiblesDocuments = Document::query()
            ->where('communicable', 1)
            ->whereHas('naturedocument', function ($query) {
                $query->where('visible', 1);
            })
            ->get()
        ;
        /* dump($visiblesDocuments->toArray()); */

        $notVisiblesDocuments = Document::query()
            ->where('communicable', 1)
            ->whereHas('naturedocument', function ($query) {
                $query->where('visible', 0);
            })
            ->whereHas('direction', function ($query) {
                $query->where('id', Auth::user()->direction_id);
            })
            ->whereHas('fonctions', function ($query) {
                $query->whereHas('users', function ($query) {
                    $query->where('id', Auth::user()->id);
                });
            })
            ->get()
        ;
        /* dump($notVisiblesDocuments->toArray()); */

        /* dump($notVisiblesDocuments->merge($visiblesDocuments)->toArray()); */

        /*
            $tab1 = ['Euvince', 'Daniel'];
            $tab2 = ['Euvincia', 'Daniellia', 'Euvince'];
            dd(array_unique(array_merge($tab1,$tab2)));
            dd(Document::all()->merge(Document::take(2)->get())->toArray());
        */

        /* Première requête n'ayant pas abouti
            $documents =
            Document::where('communicable', 1)
            ->whereHas('direction', function ($query) {
                $query->where('id', Auth::user()->direction_id);
            })
            ->whereHas('naturedocument', function ($query) {
                $query->where('visible', 1);
            })
            ->whereHas('fonctions', function ($query) {
                $query->whereHas('users', function ($query) {
                    $query->where('id', Auth::user()->id);
                });
            });

            dd($documents->get());
        */

        $documents = $notVisiblesDocuments->merge($visiblesDocuments);

        if(!empty($this->nom)){
            $documents = $documents->where('nom', 'LIKE', "%{$this->nom}%");
        }

        if(!empty($this->dateDeb)){
            $documents = $documents->where('datecreation', '>=', $this->dateDeb);
        }

        if(!empty($this->dateFin)){
            $documents = $documents->where('datecreation', '<=', $this->dateFin);
        }

        if(!empty($this->motclefs)){
            $documents = $documents->where('motclefs', 'LIKE', "%{$this->motclefs}%");
        }

        return view('livewire.document-page-table', [
            'documents' => $documents
                /* ->orderBy('created_at', 'desc')
                ->paginate(20) */
        ]);
    }
}
