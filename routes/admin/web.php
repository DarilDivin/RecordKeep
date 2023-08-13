<?php

use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\DirectionController;
use App\Http\Controllers\Admin\DivisionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\FonctionController;
use App\Http\Controllers\Admin\NatureController;
use App\Http\Controllers\Admin\RapportDepartController;
use App\Http\Controllers\Admin\ServiceController;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
$mailRegex = '[^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$]';


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('document', DocumentController::class)->except(['show']);
    Route::resource('categorie', CategorieController::class)->except(['show']);
    Route::resource('nature', NatureController::class)->except(['show']);
    Route::resource('direction', DirectionController::class)->except(['show']);
    Route::resource('service', ServiceController::class)->except(['show']);
    Route::resource('division', DivisionController::class)->except(['show']);
    Route::resource('fonction', FonctionController::class)->except(['show']);
    Route::resource('user', UserController::class)->except('show');
});

Route::get('manager/rapport-de-depart-de-pret', [RapportDepartController::class, 'index'])->name('rapport-depart-list');
Route::get('manager/rapport-de-depart-de-pret/create/{document}-{name}-{email}', [RapportDepartController::class, 'create'])
    ->name('rapport-depart-create')
    ->where([
        'document' => $idRegex
    ]);
Route::post('manager/rapport-de-depart-de-pret/store', [RapportDepartController::class, 'store'])->name('rapport-depart-store');
