@extends('layouts.app')

@section('title', "Demande d'insertion ou modification d'un résultat des années antérieures sur le système APOGEE (Par Étudiant)")

@section('content')
<div class="bg-body-extra-light">
    <div class="content content-full">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('Demands') }}">Demands</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Inscription Administrative</li>
            </ol>
        </nav>
        <!-- END Breadcrumb -->

        <!-- Quick Menu -->
        <div class="row">
            <div class="col-12 col-md-6 col-xl-6">
                <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('home') }}">
                    <div class="block-content">
                        <p class="my-2">
                            <i class="fa fa-compass fa-2x text-muted"></i>
                        </p>
                        <p class="fw-semibold">Home</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-xl-6">
                <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('Demands') }}">
                    <div class="block-content">
                        <p class="my-2">
                            <i class="fa fa-file-word fa-2x text-muted"></i>
                        </p>
                        <p class="fw-semibold">Les Demandes Administratives</p>
                    </div>
                </a>
            </div>
        </div>
        <!-- END Quick Menu -->

        <h2 class="text-center mb-4">Demande d'insertion ou modification d'un résultat des années antérieures sur le système APOGEE (Par Étudiant)</h2>
        
        <!-- Form for PDF generation -->
        <div class="row">
            <form id="pdfForm" method="POST" action="{{ route('resultat.etudiant.store') }}" onsubmit="showLoading(event)">
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
        <!-- END Quick Stats -->
    </div>
</div>

<!-- Loading Modal with Countdown -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-4">
            <h5 class="modal-title mb-3" id="pdfModalLabel">Génération du PDF</h5>
            <p id="countdownText">Votre PDF sera téléchargé dans <strong id="counter">5</strong> secondes...</p>
            <button id="downloadBtn" class="btn btn-success">Télécharger le PDF</button>
        </div>
    </div>
</div>

<script>
    // Wait for the DOM to load
    document.addEventListener("DOMContentLoaded", function () {
        // Module addition logic
        let moduleIndex = 1;
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

            newModuleRow.querySelector(".remove-module-btn").addEventListener("click", function () {
                newModuleRow.remove();
            });
            moduleIndex++;
        });

        // Intercept form submission to show modal
        const pdfForm = document.getElementById('pdfForm');
        pdfForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent immediate form submission
            let modalElement = document.getElementById('pdfModal');
            let modal = new bootstrap.Modal(modalElement);
            modal.show();

            // Set initial countdown value
            const counterElement = document.getElementById('counter');
            let count = parseInt(counterElement.textContent);

            // Clear any existing interval
            let interval = setInterval(function () {
                count--;
                counterElement.textContent = count;
                if (count <= 0) {
                    clearInterval(interval);
                    modal.hide();
                    // Submit the form after countdown finishes
                    pdfForm.submit();
                }
            }, 1000);

            // Optional: allow user to click the download button to bypass countdown
            document.getElementById('downloadBtn').addEventListener('click', function handler() {
                clearInterval(interval);
                modal.hide();
                // Remove event listener to avoid duplicate submission
                this.removeEventListener('click', handler);
                pdfForm.submit();
            });
        });
    });
</script>
@endsection
