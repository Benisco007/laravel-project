<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EleveController; // IMPORTATION INDISPENSABLE
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesseurController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard par défaut (Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profil Utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes pour l'Admin uniquement
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/eleves', [AdminController::class, 'listeEleves'])->name('admin.eleves.index');
    Route::get('/admin/programmation', [AdminController::class, 'programmation'])->name('admin.programmation');
    Route::get('/admin/programmation/nouveau', [AdminController::class, 'createCours'])->name('admin.cours.create');
    Route::post('/admin/programmation/store', [AdminController::class, 'storeCours'])->name('admin.cours.store');
    Route::get('/admin/professeurs/nouveau', [AdminController::class, 'createProfesseur'])->name('admin.professeur.create');
    Route::post('/admin/professeurs/store', [AdminController::class, 'storeProfesseur'])->name('admin.professeur.store');
    Route::delete('/admin/eleves/{user}', [AdminController::class, 'destroyEleve'])->name('admin.eleves.destroy');
});

// Routes pour l'Élève uniquement (UNE SEULE FOIS)
Route::middleware(['auth', 'role:eleve'])->group(function () {
    Route::get('/eleve/dashboard', [EleveController::class, 'dashboard'])->name('eleve.dashboard');
    Route::post('/eleve/noter', [EleveController::class, 'noter'])->name('eleve.noter');
});

// Routes pour le Professeur uniquement
Route::middleware(['auth', 'role:professeur'])->group(function () {
    Route::get('/professeur/dashboard', [ProfesseurController::class, 'dashboard'])->name('professeur.dashboard');
});

require __DIR__ . '/auth.php';
