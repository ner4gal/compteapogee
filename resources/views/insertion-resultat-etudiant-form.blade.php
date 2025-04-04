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
            <div class="row mb-4">
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

            <h2 class="text-center mb-4">Demande d'insertion ou modification d'un résultat des années antérieures sur le
                système APOGEE (Par Étudiant)</h2>

            <!-- Form for PDF generation -->
            <div class="row">
                <form id="pdfForm" method="POST" action="{{ route('resultat.etudiant.store') }}">
                    @csrf

                    <!-- Etablissement as a select -->
                    <div class="mb-3">
                        <label class="form-label">Etablissement</label>
                        <select class="form-select" name="etbl" required>
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
                        <label class="form-label">Nom &amp; Prénom</label>
                        <input type="text" name="NomPrenom" class="form-control" required>
                    </div>

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
                                    <input class="form-check-input" type="radio" name="Semestre" id="semestre{{ $i }}"
                                        value="semestre {{ $i }}" required>
                                    <label class="form-check-label" for="semestre{{ $i }}">Semestre {{ $i }}</label>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Année universitaire concernée as a select -->
                    <div class="mb-3">
                        <label class="form-label">Année universitaire concernée</label>
                        <select class="form-select" name="AnneeCon" required>
                            @for($year = 2015; $year <= 2023; $year++)
                                <option value="{{ $year }}-{{ $year + 1 }}">{{ $year }}-{{ $year + 1 }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Nature de la demande -->
                    <div class="mb-3">
                        <label class="form-label">Nature de la demande :</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nrtDM" id="nouvelleInscription"
                                value="Nouvelle inscription">
                            <label class="form-check-label" for="nouvelleInscription">Nouvelle inscription</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nrtDM" id="modificationInscription"
                                value="Modification d'une inscription">
                            <label class="form-check-label" for="modificationInscription">Modification d'une
                                inscription</label>
                        </div>
                    </div>

                    <h4 class="mt-4">Liste des Modules</h4>

                    <!-- Modules Container -->
                    <div id="modules-container" class="mb-3">
                        <!-- Default Module Input -->
                        <div class="module-row d-flex align-items-center gap-2">
                            <input type="text" name="modules[0][M]" class="form-control" placeholder="Nom du Module"
                                required>
                            <input type="text" name="modules[0][S]" class="form-control" placeholder="Session" required>
                            <input type="text" name="modules[0][NI]" class="form-control" placeholder="Note Initiale"
                                required>
                            <input type="text" name="modules[0][NC]" class="form-control" placeholder="Note Corrigée"
                                required>
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
        document.addEventListener("DOMContentLoaded", function () {
            // Logic to add new module rows
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

            // Intercept form submission to show modal (but don't start countdown automatically)
            const pdfForm = document.getElementById('pdfForm');
            pdfForm.addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent immediate submission
                let modalElement = document.getElementById('pdfModal');
                let modal = new bootstrap.Modal(modalElement);
                modal.show();
            });

            // When the download button is clicked, start the countdown
            document.getElementById('downloadBtn').addEventListener('click', function () {
                this.disabled = true;
                let counterElement = document.getElementById('counter');
                let count = 5;
                counterElement.textContent = count;
                let interval = setInterval(function () {
                    count--;
                    counterElement.textContent = count;
                    if (count <= 0) {
                        clearInterval(interval);
                        let modalInstance = bootstrap.Modal.getInstance(document.getElementById('pdfModal'));
                        modalInstance.hide();
                        pdfForm.submit();
                        pdfForm.reset(); // Clear the form fields
                    }
                }, 1000);
            });
        });
    </script>
@endsection