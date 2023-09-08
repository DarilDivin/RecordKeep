<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\DocumentController;
use App\Http\Controllers\Manager\DemandePretController;
use App\Http\Controllers\Manager\CategorieController;
use App\Http\Controllers\Manager\BoiteArchiveController;
use App\Http\Controllers\Manager\AllTransfertsController;
use App\Http\Controllers\Manager\RapportDepartController;
use App\Http\Controllers\Manager\ChemiseDossierController;
use App\Http\Controllers\Manager\NatureDocumentController;
use App\Http\Controllers\Manager\RayonRangementController;
use App\Http\Controllers\Manager\DemandeTransfertController;
use App\Http\Controllers\Manager\DocumentClassementController;
use App\Http\Controllers\Manager\RapportRetourController;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
$mailRegex = '[^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$]';

Route::group(['middleware' => ['auth', 'role:Gestionnaire-Standard'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('document', DocumentController::class)->except(['show']);
    Route::resource('boite', BoiteArchiveController::class)->except(['show']);
    Route::resource('categorie', CategorieController::class)->except(['show']);
    Route::resource('rayon', RayonRangementController::class)->except(['show']);
    Route::resource('nature', NatureDocumentController::class)->except(['show']);
    Route::resource('chemise', ChemiseDossierController::class)->except(['show']);
    Route::resource('transfert', DemandeTransfertController::class)->except(['show', 'edit', 'update']);
});

Route::group(['middleware' => ['auth', 'role:Gestionnaire-Central'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('transfert', DemandeTransfertController::class)->except(['show', 'edit', 'update']);
});

/* ------------------------------------------------------------------------------------------------------------------------------------- */

Route::middleware(['auth', 'role:Gestionnaire-Central'])
    ->get('manager/document/classement', [DocumentClassementController::class, 'index'])
    ->name('manager.document.classed');

Route::middleware(['auth', 'role:Gestionnaire-Central'])
    ->get('manager/document/{document}/{transfert}/classement', [DocumentClassementController::class, 'showClassementForm'])
    ->name('manager.document.classement')
    ->where([
        'document' => $idRegex,
        'transfert' => $idRegex
    ]);

Route::middleware(['auth', 'role:Gestionnaire-Central'])
    ->put('manager/document/{document}/{transfert}/classement', [DocumentClassementController::class, 'doClassement'])
    ->where([
        'document' => $idRegex,
        'transfert' => $idRegex
    ]);

/* ------------------------------------------------------------------------------------------------------------------------------------- */

/* FOR STANDARDS MANAGER */


Route::middleware(['auth', 'role:Gestionnaire-Standard'])
    ->get('manager/transfert/{slug}/{transfert}', [DemandeTransfertController::class, 'show'])
    ->name('manager.transfert.show')
    ->where([
        'transfert' => $idRegex,
        'slug' => $slugRegex
    ]);

Route::middleware(['auth', 'role:Gestionnaire-Standard'])
    ->get('manager/transfert/{transfert}/edit', [DemandeTransfertController::class, 'edit'])
    ->name('manager.transfert.edit')
    ->where([
        'transfert' => $idRegex
    ]);

Route::middleware(['auth', 'role:Gestionnaire-Standard'])
    ->put('manager/transfert/{transfert}', [DemandeTransfertController::class, 'update'])
    ->name('manager.transfert.update')
    ->where([
        'transfert' => $idRegex
    ]);

Route::middleware(['auth', 'role:Gestionnaire-Standard'])
    ->get('manager/transfert/{transfert}', [DemandeTransfertController::class, 'sending'])
    ->name('manager.transfert.sending')
    ->where([
        'transfert' => $idRegex
    ]);

Route::middleware(['auth', 'role:Gestionnaire-Standard'])
    ->put('manager/document-remove-for-standard-transfer/{document}/{transfert}', [DemandeTransfertController::class, 'removeForStandardTranfer'])
    ->name('manager.document.sremove')
    ->where([
        'document' => $idRegex
    ]);


/* ------------------------------------------------------------------------------------------------------------------------------------- */

/* FOR CENTRALES MANAGER */


Route::middleware(['auth', 'role:Gestionnaire-Central'])
    ->get('manager/all-transferts', [AllTransfertsController::class, 'all'])
    ->name('manager.all-transferts.index');

Route::middleware(['auth', 'role:Gestionnaire-Central'])
    ->get('manager/all-transferts/{slug}/{transfert}', [AllTransfertsController::class, 'one'])
    ->name('manager.all-transferts.show')
    ->where([
        'transfert' => $idRegex,
        'slug' => $slugRegex
    ]);

Route::middleware(['auth', 'role:Gestionnaire-Central'])
    ->delete('manager/all-transferts/{transfert}', [AllTransfertsController::class, 'death'])
    ->name('manager.all-transferts.destroy')
    ->where([
        'transfert' => $idRegex
    ]);

Route::middleware(['auth', 'role:Gestionnaire-Central'])
    ->put('manager/document-remove-for-central-transfer/{document}/{transfert}', [AllTransfertsController::class, 'removeForCentralTranfer'])
    ->name('manager.document.cremove')
    ->where([
        'document' => $idRegex
    ]);


/* ------------------------------------------------------------------------------------------------------------------------------------- */


Route::get('manager/rapport-de-depart-de-pret', [RapportDepartController::class, 'index'])->name('rapport-depart-list');
Route::get('manager/rapport-de-depart-de-pret/create/{demande}', [RapportDepartController::class, 'create'])
    ->name('rapport-depart-create')
    ->where([
        'demande' => $idRegex
    ]);
Route::post('manager/rapport-de-depart-de-pret/store/', [RapportDepartController::class, 'store'])
    ->name('rapport-depart-store');

Route::get('manager/rapport-preview/{rapport}', [RapportDepartController::class, 'show'])
    ->name('rapport-show')
    ->where([
        'rapport' => $idRegex
    ]);

/* ------------------------------------------------------------------------------------------------------------------------------------- */

// Route::get('manager/rapport-de-depart-de-pret', [RapportDepartController::class, 'index'])->name('rapport-depart-list');
Route::get('manager/rapport-de-retour-de-pret/create/{rapportDepart}', [RapportRetourController::class, 'create'])
    ->name('rapport-retour-create')
    ->where([
        'rapportDepart' => $idRegex
    ]);
Route::post('manager/rapport-de-retour-de-pret/store/', [RapportRetourController::class, 'store'])
    ->name('rapport-retour-store');

Route::get('manager/rapport-preview/{rapport}', [RapportDepartController::class, 'show'])
    ->name('rapport-show')
    ->where([
        'rapport' => $idRegex
    ]);

/* ------------------------------------------------------------------------------------------------------------------------------------- */

Route::get('downloadPdf/{rapport}', [RapportDepartController::class, 'pdf'])->where(['rapport' => $idRegex]);

/* ------------------------------------------------------------------------------------------------------------------------------------- */

Route::get('manager/demandes-de-pret/encours', [DemandePretController::class, 'indexEncours'])->name('demande-de-prets-encours');
Route::get('manager/demandes-de-pret/validé', [DemandePretController::class, 'indexValidé'])->name('demande-de-prets-validé');


/* ------------------------------------------------------------------------------------------------------------------------------------- */
