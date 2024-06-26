<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\DocumentController;
use App\Http\Controllers\Manager\CategorieController;
use App\Http\Controllers\Manager\DemandePretController;
use App\Http\Controllers\Manager\BoiteArchiveController;
use App\Http\Controllers\Manager\AllTransfertsController;
use App\Http\Controllers\Manager\RapportDepartController;
use App\Http\Controllers\Manager\RapportRetourController;
use App\Http\Controllers\Manager\ChemiseDossierController;
use App\Http\Controllers\Manager\NatureDocumentController;
use App\Http\Controllers\Manager\RayonRangementController;
use App\Http\Controllers\Manager\DemandeTransfertController;
use App\Http\Controllers\Manager\DocumentClassementController;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
$mailRegex = '[^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$]';

Route::group(['middleware' => ['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Documents'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('document', DocumentController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Catégories'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('categorie', CategorieController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Boîtes Archives'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('boite', BoiteArchiveController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Rayons Rangements'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('rayon', RayonRangementController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'verified', 'hasConfirmedPwd','permission:Gestion des Chemises Dossiers'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('chemise', ChemiseDossierController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Natures de Documents'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('nature', NatureDocumentController::class)->except(['show']);
});

/* ------------------------------------------------------------------------------------------------------------------------------------- */

/* FOR STANDARDS MANAGERS */

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Transferts'])
->get('manager/transfert', [DemandeTransfertController::class, 'index'])
->name('manager.transfert.index')
->where([
    'transfert' => $idRegex
]);

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Transferts'])
->get('manager/transfert/{slug}/{transfert}', [DemandeTransfertController::class, 'show'])
->name('manager.transfert.show')
->where([
    'transfert' => $idRegex,
    'slug' => $slugRegex
]);

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Transferts'])
->patch('manager/{transfert}/transfert', [DemandeTransfertController::class, 'sending'])
->name('manager.transfert.sending')
->where([
    'transfert' => $idRegex
]);

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Transferts'])
->patch('manager/transfert/{transfert}', [DemandeTransfertController::class, 'swithdraw'])
->name('manager.transfert.swithdraw')
->where([
    'transfert' => $idRegex
]);

/* ------------------------------------------------------------------------------------------------------------------------------------- */

/* FOR CENTRAL MANAGER */

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Transferts du MISP'])
->get('manager/all-transferts', [AllTransfertsController::class, 'all'])
->name('manager.transfert.all');

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Transferts du MISP'])
->get('manager/all-transferts/{slug}/{transfert}', [AllTransfertsController::class, 'one'])
->name('manager.transfert.one')
->where([
    'transfert' => $idRegex,
    'slug' => $slugRegex
]);

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Transferts du MISP'])
->get('manager/all-transferts/{transfert}/bordereau-form', [AllTransfertsController::class, 'showBordereauForm'])
->name('manager.transfert.bordereau-form')
->where([
    'transfert' => $idRegex
]);

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Transferts du MISP'])
->patch('manager/all-transferts/{transfert}/bordereau-create', [AllTransfertsController::class, 'accept'])
->name('manager.transfert.bordereau-create')
->where([
    'transfert' => $idRegex
]);

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Transferts du MISP'])
->get('manager/all-transferts/{bordereau}/bordereau-show', [AllTransfertsController::class, 'show'])
->name('manager.transfert.bordereau-show')
->where([
    'transfert' => $idRegex
]);

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Transferts du MISP'])
->patch('manager/all-transfert/{transfert}', [AllTransfertsController::class, 'cwithdraw'])
->name('manager.transfert.cwithdraw')
->where([
    'transfert' => $idRegex
]);


/* ------------------------------------------------------------------------------------------------------------------------------------- */

/* FOR CENTRAL MANAGER */

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Classements'])
    ->get('manager/document/classement', [DocumentClassementController::class, 'index'])
    ->name('manager.document.classed');

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Classements'])
    ->get('manager/document/{document}/{transfert}/classement', [DocumentClassementController::class, 'showClassementForm'])
    ->name('manager.document.classement')
    ->where([
        'document' => $idRegex,
        'transfert' => $idRegex
    ]);

Route::middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Classements'])
    ->put('manager/document/{document}/{transfert}/classement', [DocumentClassementController::class, 'doClassement'])
    ->where([
        'document' => $idRegex,
        'transfert' => $idRegex
    ]);

/* ------------------------------------------------------------------------------------------------------------------------------------- */


Route::get('manager/demandes-de-pret/', [DemandePretController::class, 'index'])
->middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Prêts'])
->name('demande-de-prets');

Route::get('manager/rapport-pret', [RapportDepartController::class, 'index'])
->name('rapport-depart-list')
->middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Prêts']);

/* ------------------------------------------------------------------------------------------------------------------------------------- */

Route::get('downloadPdf/{rapport}', [RapportDepartController::class, 'pdf'])
->middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Prêts'])
->where(['rapport' => $idRegex]);

/* ------------------------------------------------------------------------------------------------------------------------------------- */

Route::get('manager/rapport-depart/create/{demande}', [RapportDepartController::class, 'create'])
->name('rapport-depart-create')
->middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Prêts'])
->where([
    'demande' => $idRegex
]);
Route::post('manager/rapport-depart/store/{demande}', [RapportDepartController::class, 'store'])
->middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Prêts'])
->name('rapport-depart-store');

Route::get('manager/rapport-preview/{rapport}', [RapportDepartController::class, 'show'])
->name('rapport-show')
->middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Prêts'])
->where([
    'rapport' => $idRegex
]);

/* ------------------------------------------------------------------------------------------------------------------------------------- */

Route::get('manager/rapport-retour/create/{rapportDepart}', [RapportRetourController::class, 'create'])
->name('rapport-retour-create')
->middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Prêts'])
->where([
    'rapportDepart' => $idRegex
]);

Route::post('manager/rapport-retour/store/{rapportDepart}', [RapportRetourController::class, 'store'])
->name('rapport-retour-store')
->middleware(['auth', 'verified', 'hasConfirmedPwd', 'permission:Gestion des Demandes de Prêts']);
