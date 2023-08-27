<?php

use App\Http\Controllers\Admin\BoiteArchiveController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ChemiseDossierController;
use App\Http\Controllers\Admin\DemandePretController;
use App\Http\Controllers\Admin\DemandeTransfertController;
use App\Http\Controllers\Admin\DirectionController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DocumentClassementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\FonctionController;
use App\Http\Controllers\Admin\NatureDocumentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RayonRangementController;
use App\Http\Controllers\Admin\RapportDepartController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SousPermissionController;
use App\Http\Controllers\Admin\TypeRoleController;
use App\Http\Controllers\StatistiquesController;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
$mailRegex = '[^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$]';


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('document', DocumentController::class)->except(['show']);
    Route::resource('transfert', DemandeTransfertController::class)->except('show');
    Route::resource('categorie', CategorieController::class)->except(['show']);
    Route::resource('nature', NatureDocumentController::class)->except(['show']);
    Route::resource('direction', DirectionController::class)->except(['show']);
    Route::resource('service', ServiceController::class)->except(['show']);
    Route::resource('division', DivisionController::class)->except(['show']);
    Route::resource('fonction', FonctionController::class)->except(['show']);
    Route::resource('chemise', ChemiseDossierController::class)->except(['show']);
    Route::resource('boite', BoiteArchiveController::class)->except(['show']);
    Route::resource('rayon', RayonRangementController::class)->except(['show']);
    Route::resource('user', UserController::class)->except('show');
    Route::resource('role', RoleController::class)->except('show');
    Route::resource('type-role', TypeRoleController::class)->except('show');
    Route::resource('permission', PermissionController::class)->except('show');
    Route::resource('sous-permission', SousPermissionController::class)->except('show');
});

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

Route::get('downloadPdf/{rapport}', [RapportDepartController::class, 'pdf'])->where(['rapport' => $idRegex]);

Route::get('admin/demandes-de-pret/encours', [DemandePretController::class, 'indexEncours'])->name('demande-de-prets-encours');
Route::get('admin/demandes-de-pret/validé', [DemandePretController::class, 'indexValidé'])->name('demande-de-prets-validé');

Route::get('admin/statistiques', [StatistiquesController::class, 'stat'])->name('admin.statistique');



Route::get('admin/document/classement', [DocumentClassementController::class, 'index'])
    ->name('admin.document.classed');

Route::get('admin/document/{document}/classement', [DocumentClassementController::class, 'showClassementForm'])
    ->name('admin.document.classement')
    ->where(['document' => $idRegex]);

Route::put('admin/document/{document}/classement', [DocumentClassementController::class, 'doClassement'])
    ->where(['document' => $idRegex]);

Route::get('admin/transfert/{slug}/{transfert}', [DemandeTransfertController::class, 'show'])
    ->name('admin.transfert.show')
    ->where([
        'transfert' => $idRegex,
        'slug' => $slugRegex
    ]);

Route::post('admin/document/destroy-docs', [DocumentController::class, 'destroyManyDocs'])
    ->name('admin.document.destroyDocs');
