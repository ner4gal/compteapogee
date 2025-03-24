@extends('layouts.app')

@section('title', 'Demande d\'insertion ou modification d\'un résultat (Par Étudiant)')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Demande d'insertion ou modification d'un résultat des années antérieures sur le système APOGEE (Par Étudiant)</h2>

        <!-- Back to Home Button -->
        <div class="text-center mb-3">
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>

        <!-- Loading Screen (Hidden by Default) -->
        <div id="loadingScreen" class="loading-overlay" style="display: none;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Génération en cours...</span>
            </div>
            <p class="loading-text">Génération du PDF en cours, veuillez patienter...</p>
        </div>

        <div class="card shadow p-4">
            <form  method="POST" onsubmit="showLoading()">
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
                    <label class="form-label">Nom & Prénom</label>
                    <input type="text" name="NomPrenom" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Numéro APOGEE</label>
                    <input type="text" name="NumApogee" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cycle</label>
                    <input type="text" name="typ" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Filière</label>
                    <input type="text" name="flr" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Semestre</label>
                    <input type="text" name="Semestre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Année universitaire concernée</label>
                    <input type="text" name="AnneeCon" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nature de la demande</label>
                    <input type="text" name="nrtDM" class="form-control" required>
                </div>

                <h4 class="mt-4">Liste des Modules</h4>

                <!-- Modules Container -->
                <div id="modules-container" class="mb-3">
                    <!-- Default Module Input -->
                    <div class="module-row d-flex align-items-center gap-2">
                        <input type="text" name="modules[0][M]" class="form-control" placeholder="Nom du Module" required>
                        <input type="text" name="modules[0][S]" class="form-control" placeholder="Session" required>
                        <input type="text" name="modules[0][NI]" class="form-control" placeholder="Note Initiale" required>
                        <input type="text" name="modules[0][NC]" class="form-control" placeholder="Note Corrigée" required>
                        <button type="button" class="btn btn-danger remove-module-btn">❌</button>
                    </div>
                </div>

                <!-- Button to Add More Modules -->
                <button type="button" id="add-module-btn" class="btn btn-success mb-3">+ Ajouter un module</button>

                <div class="mb-3">
                    <label class="form-label">Raison du retard d'insertion ou correction des notes</label>
                    <textarea name="raison" rows="4" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Générer le PDF</button>
            </form>
        </div>
    </div>

    <script>
        function showLoading() {
            document.getElementById('loadingScreen').style.display = 'flex';

            // Hide loader after 5s (adjust this if needed)
            setTimeout(function () {
                document.getElementById('loadingScreen').style.display = 'none';
            }, 5000);
        }

        document.addEventListener("DOMContentLoaded", function () {
            let moduleIndex = 1; // Start index for new modules

            document.getElementById("add-module-btn").addEventListener("click", function () {
                let container = document.getElementById("modules-container");

                let newModuleRow = document.createElement("div");
                newModuleRow.classList.add("module-row", "d-flex", "align-items-center", "gap-2", "mt-2");
                newModuleRow.innerHTML = `
                    <input type="text" name="modules[${moduleIndex}][M]" class="form-control" placeholder="Nom du Module" required>
                    <input type="text" name="modules[${moduleIndex}][S]" class="form-control" placeholder="Session" required>
                    <input type="text" name="modules[${moduleIndex}][NI]" class="form-control" placeholder="Note Initiale" required>
                    <input type="text" name="modules[${moduleIndex}][NC]" class="form-control" placeholder="Note Corrigée" required>
                    <button type="button" class="btn btn-danger remove-module-btn">❌</button>
                `;

                container.appendChild(newModuleRow);

                // Remove module row when clicking ❌ button
                newModuleRow.querySelector(".remove-module-btn").addEventListener("click", function () {
                    newModuleRow.remove();
                });

                moduleIndex++;
            });
        });
    </script>
@endsection
