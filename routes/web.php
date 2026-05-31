<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\LivreController;
use Illuminate\Support\Facades\Route;


// Routes publiques (Accessibles sans être connecté)
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.post');

// Routes protégées (Seulement pour les utilisateurs connectés)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Tes ressources de bibliothèque
    Route::resource('books', LivreController::class);
    Route::resource('authors', AuteurController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('loans', EmpruntController::class);
    Route::resource('publishers', EditionController::class);

});