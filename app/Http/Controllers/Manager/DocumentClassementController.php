<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\ClassementFormRequest;
use App\Models\BoiteArchive;
use App\Models\ChemiseDossier;
use App\Models\DemandeTransfert;
use App\Models\Document;
use App\Models\RayonRangement;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DocumentClassementController extends Controller
{

    public function index(): View
    {
        $this->authorize('indexForDocumentsArchived', Document::class);
        return view('manager.document.classed-documents');
    }

    public function showClassementForm(Document $document, DemandeTransfert $transfert): View
    {
        $this->authorize('showClassementForm', $document);
        $motclefsArray = explode('#', $document->motclefs);
        unset($motclefsArray[0]);
        $motclefsString = implode(', ', $motclefsArray);
        return view('manager.document.document-classement', [
            'document' => $document,
            'transfert' => $transfert,
            'motclefs' => $motclefsString,
            'chemises' => ChemiseDossier::getAllChemises(),
            'boites' => BoiteArchive::getAllBoites(),
            'rayons' => RayonRangement::getAllRayons()
        ]);
    }

    public function doClassement(ClassementFormRequest $request, Document $document, DemandeTransfert $transfert): RedirectResponse
    {
        $this->authorize('doClassement', $document);
        $data = $request->validated();
        $document->update([
            'archive' => 1,
            'archived_at' => Carbon::now(),
            'chemise_dossier_id' => $data['chemise_dossier_id'],
            'code' => ChemiseDossier::find($data['chemise_dossier_id'])->code . 'D' . $document->id
        ]);

        return redirect()
            ->route('manager.transfert.one', ['slug' => $transfert->getSlug(), 'transfert' => $transfert])
            ->with('success', "Le document N° $document->id a bien été classé");
    }
}
