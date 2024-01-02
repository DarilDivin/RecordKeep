<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\DocumentController;
use App\Http\Controllers\Manager\CategorieController;
use App\Http\Controllers\Manager\DemandePretController;
use App\Http\Controllers\Manager\BoiteArchiveController;
use App\Http\Controllers\Manager\RapportRetourController;
use App\Http\Controllers\Manager\RapportDepartController;
use App\Http\Controllers\Manager\ChemiseDossierController;
use App\Http\Controllers\Manager\NatureDocumentController;
use App\Http\Controllers\Manager\RayonRangementController;
use App\Http\Controllers\Manager\DocumentClassementController;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
$mailRegex = '[^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$]';

Route::group(['middleware' => ['auth', 'permission:Gestion des Documents'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('document', DocumentController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'permission:Gestion des Catégories'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('categorie', CategorieController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'permission:Gestion des Boîtes Archives'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('boite', BoiteArchiveController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'permission:Gestion des Rayons Rangements'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('rayon', RayonRangementController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'permission:Gestion des Chemises Dossiers'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('chemise', ChemiseDossierController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'permission:Gestion des Natures de Documents'], 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::resource('nature', NatureDocumentController::class)->except(['show']);
});

/* ------------------------------------------------------------------------------------------------------------------------------------- */

Route::middleware(['auth', 'permission:Gestion des Classements'])
    ->get('manager/document/classement', [DocumentClassementController::class, 'index'])
    ->name('manager.document.classed');

Route::middleware(['auth', 'permission:Gestion des Classements'])
    ->get('manager/document/{document}/{transfert}/classement', [DocumentClassementController::class, 'showClassementForm'])
    ->name('manager.document.classement')
    ->where([
        'document' => $idRegex,
        'transfert' => $idRegex
    ]);

Route::middleware(['auth', 'permission:Gestion des Classements'])
    ->put('manager/document/{document}/{transfert}/classement', [DocumentClassementController::class, 'doClassement'])
    ->where([
        'document' => $idRegex,
        'transfert' => $idRegex
    ]);

/* ------------------------------------------------------------------------------------------------------------------------------------- */

/* FOR STANDARDS MANAGER */


/* ------------------------------------------------------------------------------------------------------------------------------------- */

/* FOR CENTRALES MANAGER */




/* ------------------------------------------------------------------------------------------------------------------------------------- */


// Route::get('manager/rapport-de-depart-de-pret', [RapportDepartController::class, 'index'])->name('rapport-depart-list');
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

Route::get('manager/rapport-pret', [RapportDepartController::class, 'index'])
    ->name('rapport-depart-list')
    ->middleware(['auth', 'permission:Gestion des Demandes de Prêts']);

Route::get('manager/rapport-de-retour-de-pret/create/{rapportDepart}', [RapportRetourController::class, 'create'])
    ->name('rapport-retour-create')
    ->middleware(['auth', 'permission:Gestion des Demandes de Prêts'])
    ->where([
        'rapportDepart' => $idRegex
    ]);

Route::post('manager/rapport-de-retour-de-pret/store/', [RapportRetourController::class, 'store'])
    ->name('rapport-retour-store')
    ->middleware(['auth', 'permission:Gestion des Demandes de Prêts']);

Route::get('manager/rapport-preview/{rapport}', [RapportDepartController::class, 'show'])
    ->name('rapport-show')
    ->middleware(['auth', 'permission:Gestion des Demandes de Prêts'])
    ->where([
        'rapport' => $idRegex
    ]);

/* ------------------------------------------------------------------------------------------------------------------------------------- */

Route::get('downloadPdf/{rapport}', [RapportDepartController::class, 'pdf'])
    ->middleware(['auth', 'permission:Gestion des Demandes de Prêts'])
    ->where(['rapport' => $idRegex]);

/* ------------------------------------------------------------------------------------------------------------------------------------- */

Route::get('manager/demandes-de-pret/', [DemandePretController::class, 'index'])->name('demande-de-prets');
// Route::get('manager/demandes-de-pret/validé', [DemandePretController::class, 'indexValidé'])->name('demande-de-prets-validé');


/* ------------------------------------------------------------------------------------------------------------------------------------- */
