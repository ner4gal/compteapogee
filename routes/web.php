<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultatEtudiantController;
use App\Http\Controllers\calculNotesController;
use App\Http\Controllers\InsertionResultatModuleController;
use App\Http\Controllers\CompteFonctionnelApogeeGoogleDocsController;
use App\Http\Controllers\DoctoratInscriptionController;
use App\Models\ResultatEtudiant;
use App\Http\Controllers\AuthController; // Custom Authentication Controller
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApogeeUserController;
use App\Models\InscAnneeAnterieure;
use App\Models\ResulataModule;
use App\Models\DemandeCalculNotesAnterieure;
use App\Models\DoctoratInscription;
use App\Http\Controllers\AdminDashboardController;

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
        $apogeeUser = \App\Models\ApogeeUser::where('email', auth()->user()->email)->first();
        $demandes = InscAnneeAnterieure::where('user_id', auth()->id())->latest()->get();
        $demandesResultatEtudiant = ResultatEtudiant::where('user_id', auth()->id())
                        ->latest()
                        ->get();
        $demandesReultatModul = ResulataModule::where('user_id', auth()->id())->latest()->get();
        $demandescalcul = DemandeCalculNotesAnterieure::where('user_id', auth()->id())->latest()->get();
        $demandeInscDoc = DoctoratInscription::where('user_id', auth()->id())->latest()->get();
        return view('home', compact('apogeeUser' , 'demandes' ,  'demandesResultatEtudiant' , 'demandesReultatModul' , 'demandescalcul', 'demandeInscDoc'));

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
    Route::get('/apogee-user/pdf', [ApogeeUserController::class, 'downloadPDF'])->name('apogee-user.pdf')->middleware('auth');


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

    // Insertion resultat etudiant PDF generation 
    Route::post('/insertion-resultat-etudiant', [ResultatEtudiantController::class, 'store'])
    ->name('resultat.etudiant.store');

    // demandes calcul notes
    Route::get('/calcul-notes', function () {
        return view('calcul_note'); // Ensure view exists in 'resources/views'
    })->name('calcul.notes.show');
    Route::get('/demande-calcul-notes', [CalculNotesController::class, 'create'])->name('demande.calcul.create');
    Route::post('/demande-calcul-notes', [CalculNotesController::class, 'store'])->name('demande.calcul.store');

    //inscription année anterieure doctora 
    Route::post('/doct_inscription_annee_anterieure', [DoctoratInscriptionController::class, 'store'])
     ->name('doctorat.inscription.store');

     Route::get('/doct_inscription_annee_anterieure', function () {
        return view('doct_inscription_annee_anterieure'); // Ensure view exists in 'resources/views'
    })->name('doctorat.inscription.show');

    // Admin Dashboard Route with inline admin check
    Route::get('/admindashboard', function () {
        // Ensure the user is authenticated
        $user = Auth::user();
        // Check if the authenticated user's email matches the admin email
        if (trim(strtolower($user->email)) !== 'karim.elalkaoui1@uit.ac.ma') {
            abort(403, 'Unauthorized access.');
        }
        // If it's the admin, return the admin dashboard view via the AdminDashboardController
        return app()->make(AdminDashboardController::class)->index();
    })->name('admindashboard');


});
