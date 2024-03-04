<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
$mailRegex = '[^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$]';



Route::get('/changer mot de passe', [UserController::class, 'changePasswordView'])->name('changePasswordView')->middleware('auth');
Route::post('/changePassword', [UserController::class, 'changePassword'])->name('changePassword')->middleware('auth');

Route::get('/documents', [DocumentController::class, 'index'])->name('document.index')->middleware(['auth', 'role:Utilisateur', 'hasConfirmedPwd']);

Route::get('/documents/{slug}-{document}', [DocumentController::class, 'show'])->name('document.show')->where([
    'document' => $idRegex,
    'slug' => $slugRegex
])->middleware(['auth', 'permission:Demander un Prêt|Consulter un Document|Rechercher un Document|Télécharger un Document']);

Route::post('/document/download/{document}', [DocumentController::class, 'download'])->name('document.download')->where([
    'demande' => $idRegex,
])->middleware(['auth', 'permission:Télécharger un Document']);

Route::post('/documents/{document}/demande', [DocumentController::class, 'demande'])->name('document.demande')->where([
    'document' => $idRegex,
])->middleware(['auth', 'permission:Demander un Prêt']);

Route::get('/documents/demande/accept/{demande}', [DocumentController::class, 'acceptDemande'])->name('document.demande.accept')
->where([
    'demande' => $idRegex,
])->middleware(['auth', 'permission:Gestion des Demandes de Prêts']);

Route::get('/documents/demande/reject/{demande}', [DocumentController::class, 'rejectDemande'])->name('document.demande.reject')
->where([
    'demande' => $idRegex,
])->middleware(['auth', 'permission:Gestion des Demandes de Prêts']);

Route::get('/settings', function() {
    return view('user.settings');
})->name('settings')->middleware(['auth', 'role:Utilisateur|Administrateur|Gestionnaire-Standard|Gestionnaire-Central']);

Route::get('/contact-us', [ContactUsController::class, 'index'])
    ->name('contactUs');

Route::post('/contact-us-send', [ContactUsController::class, 'send'])->name('contactUsSend');
