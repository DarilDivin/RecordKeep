<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassementFormRequest;
use App\Models\BoiteArchive;
use App\Models\ChemiseDossier;
use App\Models\Document;
use App\Models\RayonRangement;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DocumentClassementController extends Controller
{
    public function index(): View
    {
        return view('admin.document.classed-document', [
            'classedDocuments' => Document::where('archive', '=', '1')->get()
        ]);
    }

    public function showClassementForm(Document $document): View
    {
        $motclefsArray = explode('#', $document->motclefs);
        unset($motclefsArray[0]);
        $motclefsString = implode(', ', $motclefsArray);
        return view('admin.document.document-classement', [
            'document' => $document,
            'motclefs' => $motclefsString,
            'chemises' => ChemiseDossier::getAllChemises(),
            'boites' => BoiteArchive::getAllBoites(),
            'rayons' => RayonRangement::getAllRayons()
        ]);
    }

    public function doClassement(ClassementFormRequest $request, Document $document): RedirectResponse
    {
        $ch_code = ChemiseDossier::find($request->validated('chemise_dossier_id'))->code;

        $document->update(array_merge($request->validated(), [
            'archive' => 1,
            'code' => $ch_code . $document->id
        ]));

        return redirect()->route('admin.document.index')->with('success', 'Le document a bien été classé');
    }
}
