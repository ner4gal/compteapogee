<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultatEtudiantController;
use App\Http\Controllers\calculNotesController;
use App\Http\Controllers\InsertionResultatModuleController;
use App\Http\Controllers\DoctoratInscriptionController;
use App\Models\ResultatEtudiant;
use App\Http\Controllers\AuthController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApogeeUserController;
use App\Models\InscAnneeAnterieure;
use App\Models\ResulataModule;
use App\Models\DemandeCalculNotesAnterieure;
use App\Models\DoctoratInscription;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AnnulationInscriptionAnneeAnterieureController;
use App\Models\AnnulationInscription;
use App\Http\Controllers\SuppressionNoteEtudiantController;
use App\Models\SuppressionNoteEtudiant;
use App\Http\Middleware\CheckApogeeUser;
use App\Models\ApogeeUser;

// =======================
// PUBLIC ROUTES
// =======================
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth.login');
})->name('login');

// Google OAuth routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// AUTHENTICATED ROUTES (NO APOGEE CHECK)
// =======================
Route::middleware(['auth'])->group(function () {
    // Profile routes (always accessible)
    Route::get('/Profile', function () {
        $apogeeUser = ApogeeUser::where('email', auth()->user()->email)->first();
        return view('profile', compact('apogeeUser'));
    })->name('Profile');

    // Apogee user registration routes
    Route::post('/apogee-user/store', [ApogeeUserController::class, 'store'])->name('apogee-user.store');
    Route::get('/apogee-user/pdf', [ApogeeUserController::class, 'downloadPDF'])->name('apogee-user.pdf');
});

// =======================
// PROTECTED ROUTES (REQUIRE APOGEE USER)
// =======================
Route::middleware(['auth', CheckApogeeUser::class])->group(function () {
    // Dashboard
    Route::get('/home', function () {
        $apogeeUser = \App\Models\ApogeeUser::where('email', auth()->user()->email)->first();
        $demandes = InscAnneeAnterieure::where('user_id', auth()->id())->latest()->get();
        $demandesResultatEtudiant = ResultatEtudiant::where('user_id', auth()->id())->latest()->get();
        $demandesReultatModul = ResulataModule::where('user_id', auth()->id())->latest()->get();
        $demandescalcul = DemandeCalculNotesAnterieure::where('user_id', auth()->id())->latest()->get();
        $demandeInscDoc = DoctoratInscription::where('user_id', auth()->id())->latest()->get();
        $demandeAnluAnne = AnnulationInscription::where('user_id', auth()->id())->latest()->get();
        $demandeSupp = SuppressionNoteEtudiant::where('user_id', auth()->id())->latest()->get();
        return view('home', compact('apogeeUser', 'demandes', 'demandesResultatEtudiant', 'demandesReultatModul', 'demandescalcul', 'demandeInscDoc', 'demandeAnluAnne', 'demandeSupp'));
    })->name('home');

    // All other protected routes
    Route::get('/Demands', function () {
        return view('Demands');
    })->name('Demands');

    // Inscription Année Antérieure
    Route::get('/inscription-annee-anterieure', [App\Http\Controllers\InscriptionAnneeAnterieureController::class, 'showForm'])->name('inscription-annee-anterieure');
    Route::post('/inscription-annee-anterieure', [App\Http\Controllers\InscriptionAnneeAnterieureController::class, 'generatePDF']);

    // Insertion Resultat Module
    Route::get('/insertion-resultat-module', function () {
        return view('insertion-resultat-module-form');
    })->name('insertion.module.form');
    Route::post('/insertion-resultat-module', [InsertionResultatModuleController::class, 'generatePDF'])->name('insertion.module.pdf');
    Route::get('/insertion-resultat-module/{id}', [InsertionResultatModuleController::class, 'show'])->name('insertion.resultat.module.show');
    Route::put('/insertion-resultat-module/{id}', [InsertionResultatModuleController::class, 'update'])->name('insertion.module.update');


    // Compte Fonctionnel Apogée
    Route::get('/compte-fonctionnel-apogee', function () {
        return view('compte-fonctionnel-apogee');
    })->name('compte-fonctionnel-apogee.show');
    Route::post('/generate-doc', [ApogeeUserController::class, 'generateDocument'])->name('generate.doc');
    Route::put('/apogee/{id}', [ApogeeUserController::class, 'update'])->name('apogee.update');
    Route::get('/apogee/pdf', [ApogeeUserController::class, 'downloadPDF'])->name('apogee.download');
    Route::get('/apogee/{id}/show', [ApogeeUserController::class, 'show'])->name('apogee.show');
    Route::get('/apogee/confirm', [ApogeeUserController::class, 'showProfileForm'])->name('AppogetConfirme');
    Route::get('/apogee/create', [ApogeeUserController::class, 'showCreationForm'])->name('CreateAppogetDemand');
    Route::get('/apogee/creation', [ApogeeUserController::class, 'showCreationForm'])->name('apogee.creation');


    Route::post('/generate-doc-modif', [ApogeeUserController::class, 'generateModificationPDF'])->name('generate.doc.modif');


    // Resultat Etudiant
    Route::get('/insertion-resultat-etudiant', function () {
        return view('insertion-resultat-etudiant-form');
    })->name('insertion.resultat.etudiant');
    Route::post('/insertion-resultat-etudiant', [ResultatEtudiantController::class, 'store'])->name('resultat.etudiant.store');

    // Calcul Notes
    Route::get('/calcul-notes', function () {
        return view('calcul_note');
    })->name('calcul.notes.show');
    Route::get('/demande-calcul-notes', [CalculNotesController::class, 'create'])->name('demande.calcul.create');
    Route::post('/demande-calcul-notes', [CalculNotesController::class, 'store'])->name('demande.calcul.store');
    Route::get('/demande-calcul-notes/{id}', [CalculNotesController::class, 'show'])->name('demande.calcul.show');
    Route::put('/calcul-notes/{id}', [CalculNotesController::class, 'update'])->name('demande.calcul.update');
    Route::put('/admin/calcul-notes/{id}/update-status', [CalculNotesController::class, 'updateStatus'])->name('admin.calcul-notes.update-status');
   Route::delete('/admin/calcul-notes/{id}', [CalculNotesController::class, 'destroy'])->name('admin.calcul-notes.destroy');


    // Doctorat Inscription
    Route::post('/doct_inscription_annee_anterieure', [DoctoratInscriptionController::class, 'store'])->name('doctorat.inscription.store');
    Route::get('/doct_inscription_annee_anterieure', function () {
        return view('doct_inscription_annee_anterieure');
    })->name('doctorat.inscription.show');
    Route::put('/admin/doctorat/{id}/update-status', [DoctoratInscriptionController::class, 'updateStatus'])
    ->name('admin.doctorat.update-status');
    Route::delete('/admin/doctorat/{id}', [DoctoratInscriptionController::class, 'destroy'])
    ->name('admin.doctorat.destroy');

    // Annulation Inscription
    Route::get('/demande-annulation-inscription-annee-anterieure', [AnnulationInscriptionAnneeAnterieureController::class, 'showForm'])->name('annulation.inscription.form');
    Route::post('/inscription-annee-anterieure', [AnnulationInscriptionAnneeAnterieureController::class, 'generatePDF'])->name('annulation.inscription.generate');
    Route::get('/demande-annulation-inscription/{id}', [AnnulationInscriptionAnneeAnterieureController::class, 'show'])->name('annulation.inscription.show');

    // Suppression Note
    Route::get('/demande-suppression-note-annee-anterieure', [SuppressionNoteEtudiantController::class, 'showForm'])->name('suppression.note.etudiant.form');
    Route::post('/suppression-note-annee-anterieure', [SuppressionNoteEtudiantController::class, 'store'])->name('suppression.note.etudiant.store');
    Route::prefix('suppression-note-etudiant')->group(function () {
        Route::get('/{id}', [SuppressionNoteEtudiantController::class, 'show'])->name('suppression.note.etudiant.show');
        Route::put('/{id}', [SuppressionNoteEtudiantController::class, 'update'])->name('suppression.note.etudiant.update');
        Route::delete('/{id}', [SuppressionNoteEtudiantController::class, 'destroy'])->name('suppression.note.etudiant.destroy');
    });

    // Admin Dashboard (special case)
    Route::get('/admindashboard', function () {
        $user = Auth::user();
        if (trim(strtolower($user->email)) !== 'karim.elalkaoui1@uit.ac.ma') {
            abort(403, 'Unauthorized access.');
        }
        return app()->make(AdminDashboardController::class)->index();
    })->name('admindashboard');
    Route::prefix('admin')->group(function () {
        Route::put('/users/{user}/update-status', [AdminDashboardController::class, 'updateStatus'])
             ->name('admin.update-status');
    });
});