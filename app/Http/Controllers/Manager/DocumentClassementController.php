<?php

namespace App\Http\Controllers\Manager;

use Carbon\Carbon;
use App\Models\Document;
use Illuminate\Support\Str;
use App\Models\ChemiseDossier;
use App\Models\RayonRangement;
use App\Models\DemandeTransfert;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Manager\ClassementFormRequest;

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

        $rayons = RayonRangement::orderBy('id')->get();
        $boites = $rayons->first()->boitearchives->sortBy('libelle');

        return view('manager.document.document-classement', [
            'rayons' => $rayons,
            'boites' => $boites,
            'document' => $document,
            'transfert' => $transfert,
            'motclefs' => $motclefsString,
            'chemises' => $boites->first()->chemisedossiers->sortBy('libelle'),
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

        if (Str::contains(url()->previous(), 'all-transferts')) {
            return redirect()
            ->route('manager.transfert.one', ['slug' => $transfert->getSlug(), 'transfert' => $transfert])
            ->with('success', "Le document N° $document->id a bien été classé");
        }
        else if (Str::contains(url()->previous(), 'document')) {
            return redirect()
            ->route('manager.document.classed')
            ->with('success', "Le document N° $document->id a bien été classé");
        }
    }
}
