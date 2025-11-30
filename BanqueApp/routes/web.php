
<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\VirementController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ----------------------
// AUTHENTIFICATION
// ----------------------

// Page de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Traitement du login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ----------------------
// PAGE D'ACCUEIL APRÈS LOGIN
// ----------------------
Route::get('/', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');


// ----------------------
// ROUTES PROTÉGÉES PAR AUTH
// ----------------------
Route::middleware(['auth'])->group(function () {

    // ----------------------
    // ROUTES CLIENTS
    // ----------------------
    Route::get('/clients', [UserController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [UserController::class, 'create'])->name('clients.create');
    Route::post('/clients', [UserController::class, 'store'])->name('clients.store');
    Route::get('/clients/{id}/edit', [UserController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [UserController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{id}', [UserController::class, 'destroy'])->name('clients.destroy');
    Route::get('/clients/{id}', [UserController::class, 'show'])->name('clients.show');

    // ----------------------
    // ROUTES COMPTES
    // ----------------------
    Route::get('/comptes', [CompteController::class, 'index'])->name('comptes.index');
    Route::get('/comptes/create', [CompteController::class, 'create'])->name('comptes.create');
    Route::post('/comptes', [CompteController::class, 'store'])->name('comptes.store');
    Route::get('/comptes/{compte}/edit', [CompteController::class, 'edit'])->name('comptes.edit');
    Route::put('/comptes/{compte}', [CompteController::class, 'update'])->name('comptes.update');
    Route::delete('/comptes/{compte}', [CompteController::class, 'destroy'])->name('comptes.destroy');

    // ----------------------
    // ROUTES VIREMENTS
    // ----------------------
    Route::get('/virements', [VirementController::class, 'index'])->name('virements.index');
    Route::get('/virements/create', [VirementController::class, 'create'])->name('virements.create');
    Route::post('/virements', [VirementController::class, 'store'])->name('virements.store');

});
