@extends('layouts.app')

@section('title', 'Demande d\'ouverture ou de modification d\'un compte APOGEE')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Demande d'ouverture ou de modification d'un compte APOGEE</h2>

        <!-- Back to Home Button -->
        <div class="text-center mb-3">
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>



        <div class="card shadow p-4">
            <form action="{{ route('generate.doc') }}" method="POST" onsubmit="showLoading()">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Etablissement</label>
                    <input type="text" name="etbl" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date de la demande</label>
                    <input type="date" name="dateDM" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nature de la demande</label>
                    <input type="text" name="demNTR" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nom et Prénom du demandeur</label>
                    <input type="text" name="nomPrenomUser" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nom d’utilisateur APOGEE</label>
                    <input type="text" name="userName" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fonction</label>
                    <input type="text" name="fonction" class="form-control" required>
                </div>

                <h4 class="mt-4">Centres</h4>

                <div class="mb-3">
                    <label class="form-label">Centre de gestion</label>
                    <input type="text" name="strg1" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Centre de traitement</label>
                    <input type="text" name="strg2" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Centre d'inscription pédagogique</label>
                    <input type="text" name="strg3" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Centre d'incompatibilité</label>
                    <input type="text" name="strg4" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Téléphone</label>
                    <input type="text" name="tele" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Adresse MAC de l'ordinateur</label>
                    <input type="text" name="mac" class="form-control" required>
                </div>

                <h4 class="mt-4">Privilèges du Compte Utilisateur d’APOGEE</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p1" value="✅">
                    <label class="form-check-label">Inscription Administrative</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p2" value="✅">
                    <label class="form-check-label">Inscription Pédagogique</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p3" value="✅">
                    <label class="form-check-label">Résultat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p4" value="✅">
                    <label class="form-check-label">Structure des enseignements</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p5" value="✅">
                    <label class="form-check-label">Dossier Étudiant</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p6" value="✅">
                    <label class="form-check-label">Modalités de contrôle des connaissances</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p7" value="✅">
                    <label class="form-check-label">Épreuves</label>
                </div>

                <h4 class="mt-4">Accès aux fonctionnalités réservées au responsable APOGÉE</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p8" value="✅">
                    <label class="form-check-label">T (Ouverture et Fermeture de la session)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p9" value="✅">
                    <label class="form-check-label">A</label>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Générer le PDF</button>
            </form>
        </div>
    </div>
             <!-- Loading Screen (Hidden by Default) -->
    <div id="loadingScreen" class="loading-overlay" style="display: none;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Génération en cours...</span>
        </div>
            <p class="loading-text">Génération du PDF en cours, veuillez patienter...</p>
    </div>
    
    <script>
    function showLoading() {
        document.getElementById('loadingScreen').style.display = 'flex';

        // Hide the loading screen after a delay (simulate PDF download start)
        setTimeout(function () {
            document.getElementById('loadingScreen').style.display = 'none';
        }, 7000); // Adjust this time based on how long PDF generation takes
    }
    </script>

@endsection
