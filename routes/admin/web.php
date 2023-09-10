<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\StatistiquesController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\FonctionController;
use App\Http\Controllers\Admin\DirectionController;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
$mailRegex = '[^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$]';


Route::group(['middleware' => ['auth', 'permission:Gestion des Rôles'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('role', RoleController::class)->except('show');
});

Route::group(['middleware' => ['auth', 'permission:Gestion des Fonctions'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('fonction', FonctionController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'permission:Gestion des Divisions'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('division', DivisionController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'permission:Gestion des Services'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('service', ServiceController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'permission:Gestion des Directions'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('direction', DirectionController::class)->except(['show']);
});

Route::group(['middleware' => ['auth', 'permission:Gestion des Utilisateurs'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('user', UserController::class)->except('show');
});

/* ------------------------------------------------------------------------------------------------------------------------------------- */

Route::get('admin/statistiques', [StatistiquesController::class, 'stat'])
    ->middleware(['auth', 'permission:Gestion des Classements|Gestion des Utilisateurs'])
    ->name('admin.statistique');
