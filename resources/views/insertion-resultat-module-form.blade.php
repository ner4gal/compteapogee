@extends('layouts.app')

@section('title', 'Demande d\'insertion ou modification d\'un résultat (Par Module)')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Demande d'insertion ou modification d'un résultat des années antérieures (Par Module)</h2>

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
            <form action="{{ route('insertion.module.pdf') }}" method="POST" onsubmit="showLoading()">
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
                    <label class="form-label">Cycle</label>
                    <input type="text" name="typ" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Filière</label>
                    <input type="text" name="flr" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nom du Module</label>
                    <input type="text" name="module" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nature de la demande</label>
                    <input type="text" name="nrtDM" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Semestre</label>
                    <input type="text" name="Semestre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Année universitaire concernée</label>
                    <input type="text" name="AnneeCon" class="form-control" required>
                </div>

                <h4 class="mt-4">Liste des Étudiants</h4>

                <!-- Students Container -->
                <div id="students-container" class="mb-3">
                    <!-- Default Student Input -->
                    <div class="student-row d-flex align-items-center gap-2">
                        <input type="text" name="students[0][apogee]" class="form-control" placeholder="Numéro APOGEE" required>
                        <input type="text" name="students[0][name]" class="form-control" placeholder="Nom & Prénom" required>
                        <input type="text" name="students[0][session]" class="form-control" placeholder="Session" required>
                        <input type="text" name="students[0][note_initiale]" class="form-control" placeholder="Note Initiale" required>
                        <input type="text" name="students[0][note_corrigee]" class="form-control" placeholder="Note Corrigée" required>
                        <button type="button" class="btn btn-danger remove-student-btn">❌</button>
                    </div>
                </div>

                <!-- Button to Add More Students -->
                <button type="button" id="add-student-btn" class="btn btn-success mb-3">+ Ajouter un étudiant</button>

                <div class="mb-3">
                    <label class="form-label">Raison du retard</label>
                    <textarea name="raso" rows="4" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Responsable du Module</label>
                    <input type="text" name="ResP" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Coordinateur de la Filière</label>
                    <input type="text" name="Cordi" class="form-control" required>
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
            let studentIndex = 1; // Start index for new students

            document.getElementById("add-student-btn").addEventListener("click", function () {
                let container = document.getElementById("students-container");

                let newStudentRow = document.createElement("div");
                newStudentRow.classList.add("student-row", "d-flex", "align-items-center", "gap-2", "mt-2");
                newStudentRow.innerHTML = `
                    <input type="text" name="students[${studentIndex}][apogee]" class="form-control" placeholder="Numéro APOGEE" required>
                    <input type="text" name="students[${studentIndex}][name]" class="form-control" placeholder="Nom & Prénom" required>
                    <input type="text" name="students[${studentIndex}][session]" class="form-control" placeholder="Session" required>
                    <input type="text" name="students[${studentIndex}][note_initiale]" class="form-control" placeholder="Note Initiale" required>
                    <input type="text" name="students[${studentIndex}][note_corrigee]" class="form-control" placeholder="Note Corrigée" required>
                    <button type="button" class="btn btn-danger remove-student-btn">❌</button>
                `;

                container.appendChild(newStudentRow);

                // Remove student row when clicking ❌ button
                newStudentRow.querySelector(".remove-student-btn").addEventListener("click", function () {
                    newStudentRow.remove();
                });

                studentIndex++;
            });
        });
    </script>
@endsection
