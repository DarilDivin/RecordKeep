<?php

namespace App\Http\Livewire;

use ZipArchive;
use Livewire\Component;
use App\Models\Document;
use Illuminate\Database\Eloquent\Builder;
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

        /*
            Première requête n'ayant pas abouti
            $documents =
            Document::where('communicable', 1)
            ->whereHas('direction',
                fn (Builder $query) => $query->where('id', Auth::user()->direction_id)
            )
            ->whereHas('naturedocument',
                fn (Builder $query) => $query->where('visible', 1)
            )
            ->whereHas('fonctions',
                fn (Builder $query) => $query->whereHas('users',
                    fn (Builder $query) => $query->where('id', Auth::user()->id)
                )
            );
            Enchâiner des wheres de recherches
            dd($documents->orderBy('created_at', 'desc')->get());
        */

        $visiblesDocuments = Document::query()
            ->where('communicable', 1)
            ->whereHas('naturedocument',
                fn (Builder $query) => $query->where('visible', 1)
            )
        ;
        /* dump($visiblesDocuments->orderBy('created_at', 'desc')->get()->toArray()); */

        $notVisiblesDocuments = Document::query()
            ->where('communicable', 1)
            ->whereHas('naturedocument',
                fn (Builder $query) => $query->where('visible', 0)
            )
            ->whereHas('direction',
                fn (Builder $query) => $query->where('id', Auth::user()->direction_id)
            )
            ->whereHas('fonctions',
                fn (Builder $query) => $query->whereHas('users',
                    fn (Builder $query) => $query->where('id', Auth::user()->id)
                )
            )
        ;
        /* dump($notVisiblesDocuments->orderBy('created_at', 'desc')->get()->toArray()); */

        /* dump($notVisiblesDocuments->union($visiblesDocuments)->orderBy('created_at', 'desc')->get()->toArray());
        die(); */

        if(!empty($this->nom)){
            $visiblesDocuments = $visiblesDocuments->where('nom', 'LIKE', "%{$this->nom}%");
            $notVisiblesDocuments = $notVisiblesDocuments->where('nom', 'LIKE', "%{$this->nom}%");
        }

        if(!empty($this->dateDeb)){
            $visiblesDocuments = $visiblesDocuments->where('datecreation', '>=', $this->dateDeb);
            $notVisiblesDocuments = $notVisiblesDocuments->where('datecreation', '>=', $this->dateDeb);
        }

        if(!empty($this->dateFin)){
            $visiblesDocuments = $visiblesDocuments->where('datecreation', '<=', $this->dateFin);
            $notVisiblesDocuments = $notVisiblesDocuments->where('datecreation', '<=', $this->dateFin);
        }

        if(!empty($this->motclefs)){
            $visiblesDocuments = $visiblesDocuments->where('motclefs', 'LIKE', "%{$this->motclefs}%");
            $notVisiblesDocuments = $notVisiblesDocuments->where('motclefs', 'LIKE', "%{$this->motclefs}%");
        }

        return view('livewire.document-page-table', [
            'documents' => $notVisiblesDocuments->union($visiblesDocuments)
                ->orderBy('created_at', 'desc')
                ->paginate(20)
                /* ->sortByDesc('created_at') */
        ]);
    }
}
