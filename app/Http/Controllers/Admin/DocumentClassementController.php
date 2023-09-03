<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassementFormRequest;
use App\Models\BoiteArchive;
use App\Models\ChemiseDossier;
use App\Models\DemandeTransfert;
use App\Models\Document;
use App\Models\RayonRangement;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DocumentClassementController extends Controller
{
    public function index(): View
    {
        return view('admin.document.classed-documents');
    }

    public function showClassementForm(Document $document, DemandeTransfert $transfert): View
    {
        $motclefsArray = explode('#', $document->motclefs);
        unset($motclefsArray[0]);
        $motclefsString = implode(', ', $motclefsArray);
        return view('admin.document.document-classement', [
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
        $data = $request->validated();
        $document->update([
            'archive' => 1,
            'chemise_dossier_id' => $data['chemise_dossier_id'],
            'code' => ChemiseDossier::find($data['chemise_dossier_id'])->code . $document->id
        ]);

        return redirect()
                ->route('admin.all-transferts.show', ['slug' => $transfert->getSlug(), 'transfert' => $transfert])
                ->with('success', "Le document N° $document->id a bien été classé");
    }
}
