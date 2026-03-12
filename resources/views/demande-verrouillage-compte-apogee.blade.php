@extends('layouts.app')

@section('title', 'Demande de fermeture definitive de compte APOGEE')

@section('content')
<div class="bg-body-extra-light">
    <div class="content content-full">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Accueil / Table de bord</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('Demands') }}">Demandes</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Fermeture definitive compte APOGEE</li>
            </ol>
        </nav>

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

        <h2 class="text-center mb-4">
            <i class="fa fa-lock me-2 text-muted"></i>
            Demande de fermeture definitive de compte APOGEE
        </h2>

        <form id="pdfForm" method="POST" action="{{ route('verrouillage.compte.apogee.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Etablissement</label>
                <input
                    type="text"
                    name="etablissement"
                    class="form-control"
                    value="{{ old('etablissement', $apogeeUser->etablissement ?? '') }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Date de la demande</label>
                <input
                    type="date"
                    name="date_demande"
                    class="form-control"
                    value="{{ old('date_demande', now()->format('Y-m-d')) }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Fonction</label>
                <input
                    type="text"
                    name="fonction"
                    class="form-control"
                    value="{{ old('fonction', $apogeeUser->fonction ?? '') }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Nom & Prénom</label>
                <input
                    type="text"
                    name="nom_prenom"
                    class="form-control"
                    value="{{ old('nom_prenom', $apogeeUser->nom_prenom ?? $user->name) }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Username APOGEE</label>
                <input
                    type="text"
                    name="username_apogee"
                    class="form-control"
                    value="{{ old('username_apogee', $apogeeUser->nom_utilisateur_apogee ?? '') }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Pourquoi vous avez besoin de fermer definitivement le compte</label>
                <textarea
                    name="motif_verrouillage"
                    rows="5"
                    class="form-control"
                    required
                >{{ old('motif_verrouillage') }}</textarea>
            </div>

            <button type="button" id="generatePdfBtn" class="btn btn-primary w-100">
                Générer la demande
            </button>
        </form>
    </div>
</div>

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
                <a id="downloadPdfBtn" class="btn btn-primary" href="#" download="verrouillage_compte_apogee.pdf">
                    <i class="fa fa-download me-1"></i> Télécharger
                </a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('generatePdfBtn').addEventListener('click', function () {
        const form = document.getElementById('pdfForm');

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const previewModal = new bootstrap.Modal(document.getElementById('pdfPreviewModal'));
        previewModal.show();

        document.getElementById('pdfLoading').style.display = 'flex';
        document.getElementById('pdfPreviewFrame').style.display = 'none';

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
            const pdfUrl = URL.createObjectURL(blob);
            const pdfFrame = document.getElementById('pdfPreviewFrame');

            document.getElementById('pdfLoading').style.display = 'none';
            pdfFrame.style.display = 'block';
            pdfFrame.src = pdfUrl;
            document.getElementById('downloadPdfBtn').href = pdfUrl;

            document.getElementById('pdfPreviewModal').addEventListener('hidden.bs.modal', function () {
                URL.revokeObjectURL(pdfUrl);
                pdfFrame.src = '';
            }, { once: true });
        })
        .catch(() => {
            document.getElementById('pdfLoading').innerHTML =
                '<div class="alert alert-danger">Erreur lors de la génération du PDF. Veuillez réessayer.</div>';
        });
    });
});
</script>
@endsection
