<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsertionResultatModuleController;
use App\Http\Controllers\CompteFonctionnelApogeeGoogleDocsController;
use App\Http\Controllers\AuthController; // Custom Authentication Controller
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// =======================
// ROOT ROUTE FOR LOGIN / REDIRECT
// =======================

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home'); // Redirect authenticated users to the home route
    }
    return view('auth.login'); // Display login page for unauthenticated users
})->name('login');

// =======================
// GOOGLE OAUTH AUTHENTICATION
// =======================

// Redirect to Google
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');

// Handle Google Callback
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// PROTECTED ROUTES (Require Authentication)
// =======================
Route::middleware(['auth'])->group(function () {
    
    // Dashboard route
    Route::get('/home', function () {
        return view('home'); // Ensure you have a home.blade.php view
    })->name('home');

    Route::get('/Demands', function () {
        return view('Demands'); // 
    })->name('Demands');

    Route::get('/Profile', function () {
        return view('profile'); // 
    })->name('Profile');

    // Inscription Année Antérieure Routes
    Route::get('/inscription-annee-anterieure', [App\Http\Controllers\InscriptionAnneeAnterieureController::class, 'showForm'])->name('inscription-annee-anterieure');
    Route::post('/inscription-annee-anterieure', [App\Http\Controllers\InscriptionAnneeAnterieureController::class, 'generatePDF']);
    Route::post('/apogee-user/store', [App\Http\Controllers\ApogeeUserController::class, 'store'])->name('apogee-user.store');


    // Insertion Resultat Module Routes
    Route::get('/insertion-resultat-module', function () {
        return view('insertion-resultat-module-form');
    })->name('insertion.module.form');

    Route::post('/insertion-resultat-module', [InsertionResultatModuleController::class, 'generatePDF'])
         ->name('insertion.module.pdf');

    // Compte Fonctionnel Apogée Routes
    Route::get('/compte-fonctionnel-apogee', function () {
        return view('compte-fonctionnel-apogee'); // Ensure view exists in 'resources/views'
    })->name('compte-fonctionnel-apogee.show');

    Route::post('/generate-doc', [CompteFonctionnelApogeeGoogleDocsController::class, 'generateDocument'])->name('generate.doc');

    // Insertion Resultat Etudiant Form
    Route::get('/insertion-resultat-etudiant', function () {
        return view('insertion-resultat-etudiant-form');
    })->name('insertion.resultat.etudiant');

});
