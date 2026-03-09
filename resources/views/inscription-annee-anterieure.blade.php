@extends('layouts.app')

@section('title', "Demande d'inscription administrative à une annèe antèrieure")

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
                            <p class="fw-semibold">Accueil / Table de bord</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-xl-6">
                    <a class="block block-rounded block-bordered block-link-shadow text-center"
                        href="{{ route('Demands') }}">
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

            <h2 class="text-center mb-4">Demande d'inscription administrative à une annèe antèrieure</h2>

            <!-- Quick Stats -->
            <div class="row">
                <form id="pdfForm" action="/inscription-annee-anterieure" method="POST" target="_blank">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="etablissement">Etablissement</label>
                        <select class="form-select" name="etbl" id="etbl" required>
                            <option value="Faculté des Langues des Lettres et des Arts">Faculté des Langues des Lettres et
                                des Arts</option>
                            <option value="Faculté des Sciences Humaines et Sociales">Faculté des Sciences Humaines et
                                Sociales</option>
                            <option value="Faculté des Sciences">Faculté des Sciences</option>
                            <option value="Faculté d'Economie et de Gestion">Faculté d'Economie et de Gestion</option>
                            <option value="Faculté des Sciences Juridiques et Politiques">Faculté des Sciences Juridiques et
                                Politiques</option>
                            <option value="Ecole Nationale de Commerce et de Gestion">Ecole Nationale de Commerce et de
                                Gestion</option>
                            <option value="Ecole Nationale des Sciences Appliquées">Ecole Nationale des Sciences Appliquées
                            </option>
                            <option value="Ecole Supérieure de Technologie">Ecole Supérieure de Technologie</option>
                            <option value="Ecole Nationale Supérieure de Chimie">Ecole Nationale Supérieure de Chimie
                            </option>
                            <option value="Ecole Supérieure d'Education et de Formation">Ecole Supérieure d'Education et de
                                Formation</option>
                            <option value="Institut des Métiers de Sport">Institut des Métiers de Sport</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date de la demande</label>
                        <input type="date" name="dateDM" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="typ">Cycle</label>
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

                    <div class="mb-3">
                        <label class="form-label">Filière</label>
                        <input type="text" name="flr" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nature de la demande :</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nrtDM" id="nouvelleInscription"
                                value="Nouvelle inscription">
                            <label class="form-check-label" for="nouvelleInscription">Nouvelle inscription</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nrtDM" id="modificationInscription"
                                value="Réinscription">
                            <label class="form-check-label" for="Réinscription">Réinscription</label>
                        </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nrtDM" id="modificationInscription"
                                value="Modification d'une inscription">
                            <label class="form-check-label" for="modificationInscription">Modification d'une inscription</label>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Année universitaire concernée</label>
                        <select class="form-select" name="aneINS" required>
                            @for($year = 2020; $year <= 2024; $year++)
                                <option value="{{ $year }}-{{ $year + 1 }}">{{ $year }}-{{ $year + 1 }}</option>
                            @endfor
                        </select>
                    </div>

                    <h4 class="mt-4">Liste des Étudiants</h4>
                    <!-- Students Container -->
                    <div id="students-container" class="mb-3">
                        <!-- Default Student Input -->
                        <div class="student-row d-flex align-items-center gap-2">
                            <input type="text" name="students[0][apogee]" class="form-control" placeholder="Numéro APOGEE"
                                required>
                            <input type="text" name="students[0][name]" class="form-control" placeholder="Nom & Prénom"
                                required>
                            <button type="button" class="btn btn-danger remove-student-btn">❌</button>
                        </div>
                    </div>

                    <!-- Button to Add More Students -->
                    <button type="button" id="add-student-btn" class="btn btn-success mb-3">+ Ajouter un étudiant</button>

                    <div class="mb-3">
                        <label class="form-label">La raison du retard</label>
                        <textarea name="mtf" rows="4" class="form-control" required></textarea>
                    </div>

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
                    <a id="downloadPdfBtn" class="btn btn-primary" href="#" download="demande_inscription.pdf">
                        <i class="fa fa-download me-1"></i> Télécharger
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let studentIndex = 1; // Start index for new students

        // Dynamically add student rows
        document.getElementById("add-student-btn").addEventListener("click", function () {
            let container = document.getElementById("students-container");

            let newStudentRow = document.createElement("div");
            newStudentRow.classList.add("student-row", "d-flex", "align-items-center", "gap-2", "mt-2");
            newStudentRow.innerHTML = `
                <input type="text" name="students[${studentIndex}][apogee]" class="form-control" placeholder="Numéro APOGEE" required>
                <input type="text" name="students[${studentIndex}][name]" class="form-control" placeholder="Nom & Prénom" required>
                <button type="button" class="btn btn-danger remove-student-btn">❌</button>
            `;
            container.appendChild(newStudentRow);

            // Remove student row when clicking the ❌ button
            newStudentRow.querySelector(".remove-student-btn").addEventListener("click", function () {
                newStudentRow.remove();
            });
            studentIndex++;
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