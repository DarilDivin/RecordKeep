<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\StatistiquesController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\TypeRoleController;
use App\Http\Controllers\Admin\FonctionController;
use App\Http\Controllers\Admin\DirectionController;
use App\Http\Controllers\Admin\PermissionController;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
$mailRegex = '[^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$]';


Route::group(['middleware' => ['auth', 'role:Administrateur'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('user', UserController::class)->except('show');
    Route::resource('role', RoleController::class)->except('show');
    Route::resource('service', ServiceController::class)->except(['show']);
    Route::resource('type-role', TypeRoleController::class)->except('show');
    Route::resource('division', DivisionController::class)->except(['show']);
    Route::resource('fonction', FonctionController::class)->except(['show']);
    Route::resource('permission', PermissionController::class)->except('show');
    Route::resource('direction', DirectionController::class)->except(['show']);
});

/* ------------------------------------------------------------------------------------------------------------------------------------- */

Route::get('admin/statistiques', [StatistiquesController::class, 'stat'])->name('admin.statistique');
