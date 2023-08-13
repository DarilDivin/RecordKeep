<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
$mailRegex = '[^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$]';

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/documents', [DocumentController::class, 'index'])->name('document.index');

Route::get('/documents/{slug}-{document}', [DocumentController::class, 'show'])->name('document.show')->where([
    'document' => $idRegex,
    'slug' => $slugRegex
]);

Route::post('/documents/{document}/demande', [DocumentController::class, 'demande'])->name('document.demande')->where([
    'document' => $idRegex,
]);

// Route::get('/documents/demande/accept/{document}/{email}-{name}', [DocumentController::class, 'acceptDemande'])->name('document.demande.accept');
// ->where([
//     'destination' => $mailRegex,
// ]);


Route::get('/documents/demande/reject/{destination}', [DocumentController::class, 'rejectDemande'])->name('document.demande.reject');
// ->where([
//     'destination' => $mailRegex,
// ]);


Route::post('/documents/demande/accept/{document}/{email}-{name}', [DocumentController::class, 'acceptDemande'])->name('document.demande.accept');
