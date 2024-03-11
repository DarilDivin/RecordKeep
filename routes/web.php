<?php

use App\Http\Controllers\Admin\AdminRegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('loader');
})->middleware('guest')->name('Presentation');

Route::get('/presentation', function () {
    return view('index');
})->middleware('guest')->name('index');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified', 'permission:Consulter un Document|Rechercher un Document|Télécharger un Document|Demander un Prêt']);

Route::post( '/user-register', [AdminRegisteredUserController::class, 'store'])
    ->middleware(['auth', 'permission:Gestion des Utilisateurs'])
    ->name('user.register');
