@extends('layouts.app')

@section('title', "Demande de suppression des notes de l'année antérieure (Par Étudiant)")

@section('content')
    <div class="bg-body-extra-light">
        <div class="content content-full">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Accueil / Table de bord</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('Demands') }}">Demands</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Suppression des Notes</li>
                </ol>
            </nav>
            <!-- END Breadcrumb -->

            <!-- Quick Menu -->
            <div class="row mb-4">
                <div class="col-12 col-md-6 col-xl-6">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('home') }}">
                        <div class="block-content">
                            <p class="my-2">
                                <i class="fa fa-compass fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">Accueil / Table de bord</p>
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

            <h2 class="text-center mb-4">
            Demande de suppression des notes de l'année antérieure (par étudiant)
            </h2>

            <!-- Form for PDF generation -->
            <div class="row">
                <form id="pdfForm" method="POST" action="{{ route('suppression.note.etudiant.store') }}">
                    @csrf

                    <!-- Etablissement as a select -->
                    <div class="mb-3">
                        <label class="form-label">Etablissement</label>
                        <select class="form-select" name="etbl" required>
                            <option value="Faculté des Langues des Lettres et des Arts">Faculté des Langues des Lettres et des Arts</option>
                            <option value="Faculté des Sciences Humaines et Sociales">Faculté des Sciences Humaines et Sociales</option>
                            <option value="Faculté des Sciences">Faculté des Sciences</option>
                            <option value="Faculté d'Economie et de Gestion">Faculté d'Economie et de Gestion</option>
                            <option value="Faculté des Sciences Juridiques et Politiques">Faculté des Sciences Juridiques et Politiques</option>
                            <option value="Ecole Nationale de Commerce et de Gestion">Ecole Nationale de Commerce et de Gestion</option>
                            <option value="Ecole Nationale des Sciences Appliquées">Ecole Nationale des Sciences Appliquées</option>
                            <option value="Ecole Supérieure de Technologie">Ecole Supérieure de Technologie</option>
                            <option value="Ecole Nationale Supérieure de Chimie">Ecole Nationale Supérieure de Chimie</option>
                            <option value="Ecole Supérieure d'Education et de Formation">Ecole Supérieure d'Education et de Formation</option>
                            <option value="Institut des Métiers de Sport">Institut des Métiers de Sport</option>
                        </select>
                    </div>

                    <!-- Date de la demande -->
                    <div class="mb-3">
                        <label class="form-label">Date de la demande</label>
                        <input type="date" name="dateDM" class="form-control" required>
                    </div>

                    <!-- Nom & Prénom -->
                    <div class="mb-3">
                        <label class="form-label">Nom &amp; Prénom</label>
                        <input type="text" name="NomPrenom" class="form-control" required>
                    </div>

                    <!-- Numéro APOGEE -->
                    <div class="mb-3">
                        <label class="form-label">Numéro APOGEE</label>
                        <input type="text" name="NumApogee" class="form-control" required>
                    </div>

                    <!-- Cycle as a select -->
                    <div class="mb-3">
                        <label class="form-label">Cycle</label>
                        <select name="typ" id="typ" class="form-control" required>
                            <option value="Licence">Licence</option>
                            <option value="Master">Master</option>
                            <option value="Lus">Lus</option>
                            <option value="Mus">Mus</option>
                            <option value="DUT">DUT</option>
                            <option value="Classe préparatoire ENCG">Classe préparatoire ENCG</option>
                            <option value="Classe préparatoire Cycle Ingénieur">Classe préparatoire Cycle Ingénieur</option>
                            <option value="Cycle Ingénieur">Cycle Ingénieur</option>
                            <option value="Diplome ENCG">Diplome ENCG</option>
                        </select>
                    </div>

                    <!-- Filière -->
                    <div class="mb-3">
                        <label class="form-label">Filière</label>
                        <input type="text" name="flr" class="form-control" required>
                    </div>

                    <!-- Semestre as radio buttons -->
                    <div class="mb-3">
                        <label class="form-label">Semestre</label>
                        <div>
                            @for($i = 1; $i <= 6; $i++)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Semestre" id="semestre{{ $i }}" value="semestre {{ $i }}" required>
                                    <label class="form-check-label" for="semestre{{ $i }}">Semestre {{ $i }}</label>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Année universitaire concernée -->
                    <div class="mb-3">
                        <label class="form-label">Année universitaire concernée</label>
                        <select class="form-select" name="AnneeCon" required>
                            @for($year = 2020; $year <= 2023; $year++)
                                <option value="{{ $year }}-{{ $year + 1 }}">{{ $year }}-{{ $year + 1 }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Nature de la demande -->
                    <div class="mb-3">
                        <label class="form-label">Nature de la demande :</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nrtDM" id="suppressionNotes" value="Suppression des notes">
                            <label class="form-check-label" for="suppressionNotes">Suppression des notes</label>
                        </div>
                    </div>

                    <h4 class="mt-4">Liste des Modules</h4>

                    <!-- Modules Container -->
                    <div id="modules-container" class="mb-3">
                        <!-- Default Module Input (Note: Removed Note Corrigée) -->
                        <div class="module-row d-flex align-items-center gap-2">
                            <input type="text" name="modules[0][M]" class="form-control" placeholder="Nom du Module" required>
                            <input type="text" name="modules[0][S]" class="form-control" placeholder="Session" required>
                            <input type="text" name="modules[0][NI]" class="form-control" placeholder="Note" required>
                            <button type="button" class="btn btn-danger remove-module-btn">❌</button>
                        </div>
                    </div>

                    <!-- Button to Add More Modules -->
                    <button type="button" id="add-module-btn" class="btn btn-success mb-3">+ Ajouter un module</button>

                    <!-- Reason for suppression -->
                    <div class="mb-3">
                        <label class="form-label">Raison de suppression des notes</label>
                        <textarea name="raison" rows="4" class="form-control" required></textarea>
                    </div>

                    <!-- PDF Generation Trigger -->
                    <button type="button" id="generatePdfBtn" class="btn btn-primary w-100">Générer le PDF</button>
                </form>
            </div>
            <!-- END Quick Stats -->
        </div>
    </div>

    <!-- PDF Preview Modal -->
    <div class="modal fade" id="pdfPreviewModal" tabindex="-1" aria-labelledby="pdfPreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfPreviewModalLabel">Aperçu du PDF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div id="pdfLoading" class="d-flex justify-content-center align-items-center" style="height: 300px;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Chargement...</span>
                        </div>
                        <p class="ms-3">Génération du PDF en cours...</p>
                    </div>
                    <iframe id="pdfPreviewFrame" style="display: none; width: 100%; height: 600px; border: none;"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <a id="downloadPdfBtn" class="btn btn-primary" href="#" download="demande_suppression_notes.pdf">
                        <i class="fa fa-download me-1"></i> Télécharger
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let moduleIndex = 1;

            // Add new module inputs dynamically.
            document.getElementById("add-module-btn").addEventListener("click", function () {
                const container = document.getElementById("modules-container");
                const newModuleRow = document.createElement("div");
                newModuleRow.classList.add("module-row", "d-flex", "align-items-center", "gap-2", "mt-2");
                newModuleRow.innerHTML = `
                    <input type="text" name="modules[${moduleIndex}][M]" class="form-control" placeholder="Nom du Module" required>
                    <input type="text" name="modules[${moduleIndex}][S]" class="form-control" placeholder="Session" required>
                    <input type="text" name="modules[${moduleIndex}][NI]" class="form-control" placeholder="Note" required>
                    <button type="button" class="btn btn-danger remove-module-btn">❌</button>
                `;
                container.appendChild(newModuleRow);
                newModuleRow.querySelector(".remove-module-btn").addEventListener("click", function () {
                    newModuleRow.remove();
                });
                moduleIndex++;
            });

            // Handle PDF generation and preview
            document.getElementById('generatePdfBtn').addEventListener('click', function() {
                // Validate form first
                const form = document.getElementById('pdfForm');
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                // Show the preview modal
                const previewModal = new bootstrap.Modal(document.getElementById('pdfPreviewModal'));
                previewModal.show();

                // Show loading state
                document.getElementById('pdfLoading').style.display = 'flex';
                document.getElementById('pdfPreviewFrame').style.display = 'none';

                // Submit form data via AJAX
                const formData = new FormData(form);
                
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/pdf',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.blob();
                })
                .then(blob => {
                    // Create object URL for the PDF
                    const pdfUrl = URL.createObjectURL(blob);
                    
                    // Hide loading and show PDF
                    document.getElementById('pdfLoading').style.display = 'none';
                    const pdfFrame = document.getElementById('pdfPreviewFrame');
                    pdfFrame.style.display = 'block';
                    pdfFrame.src = pdfUrl;
                    
                    // Set download link
                    document.getElementById('downloadPdfBtn').href = pdfUrl;
                    
                    // Clean up object URL when modal is closed
                    document.getElementById('pdfPreviewModal').addEventListener('hidden.bs.modal', function() {
                        URL.revokeObjectURL(pdfUrl);
                        pdfFrame.src = '';
                    }, { once: true });
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('pdfLoading').innerHTML = 
                        '<div class="alert alert-danger">Erreur lors de la génération du PDF. Veuillez réessayer.</div>';
                });
            });
        });
    </script>
@endsection