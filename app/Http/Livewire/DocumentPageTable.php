<?php

namespace App\Http\Livewire;

use ZipArchive;
use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Livewire\WithPagination;

class DocumentPageTable extends Component
{
    // public $documents;

    use WithPagination;

    public $documentChecked = [];

    public function paginationView()
    {
        return 'shared.pagination';
    }

    public function filesdownload(array $ids)
    {
        // $selectedCheckboxes = $request->input('document', []);

        // $documents[] = Document::where('id', $request->input('document', []))->get();

        // foreach($request->input('document', []) as $id) {
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
            // $files = File::files($sourcePath);
            // dd(count($documents));
            $a = [];
            foreach ($documents as $doc) {
                for($i = 0; $i < count($doc); $i++){
                    $zip->addFile(public_path('storage/'). $doc[$i]->document, $doc[$i]->nom . '.pdf');
                    // array_push($a, public_path('storage/'). $doc[0]->document);
                }
            }
            // dd($a);
            $zip->close();
        }

        // Renvoyez le fichier compressé à l'utilisateur
        return Response::download($zipFilePath, $zipFileName)->deleteFileAfterSend();

    }

    public function render()
    {
        return view('livewire.document-page-table', [
            'documents' => Document::paginate(20)
        ]);
    }
}
