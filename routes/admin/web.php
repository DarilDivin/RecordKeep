<?php

use App\Http\Controllers\Admin\BoiteArchiveController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ChemiseDossierController;
use App\Http\Controllers\Admin\DirectionController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DocumentClassementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\FonctionController;
use App\Http\Controllers\Admin\NatureDocumentController;
use App\Http\Controllers\Admin\RayonRangementController;
use App\Http\Controllers\Admin\ServiceController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('document', DocumentController::class)->except(['show']);
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
});

$documentRegex = '[0-9]*';

Route::get('admin/document/classement', [DocumentClassementController::class, 'index'])
    ->name('admin.document.classed');

Route::get('admin/document/{document}/classement', [DocumentClassementController::class, 'showClassementForm'])
    ->name('admin.document.classement')
    ->where(['document' => $documentRegex]);

Route::put('admin/document/{document}/classement', [DocumentClassementController::class, 'doClassement'])
    ->where(['document' => $documentRegex]);
