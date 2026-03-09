@extends('layouts.app')

@section('title', 'Calcul Note - Demande de calcul des notes')

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
        <li class="breadcrumb-item active" aria-current="page">Calcul Note</li>
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

    <h2 class="text-center mb-4">Demande de calcul des notes à une année universitaire antérieure ( lancement du calcul des notes )</h2>

    <!-- Form -->
    <div class="row">
      <form id='pdfForm' method="POST" action="{{ route('demande.calcul.store') }}">
        @csrf

        <!-- Institution -->
        <div class="mb-3">
          <label class="form-label" for="etablissement">Etablissement</label>
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

        <!-- Date of Request -->
        <div class="mb-3">
          <label class="form-label">Date de la demande</label>
          <input type="date" name="dateDM" class="form-control" required>
        </div>

        <!-- Student Information -->
        <div class="mb-3">
          <label class="form-label">Nom &amp; Prénom</label>
          <input type="text" name="NomPrenomETD" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Numéro d'Apogée</label>
          <input type="text" name="NumETD" class="form-control" required>
        </div>

        <!-- Academic Information -->
        <div class="mb-3">
          <label class="form-label" for="typ">Cycle</label>
          <select name="cycle" id="typ" class="form-control" required>
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
          <input type="text" name="filiere" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Année universitaire concernée</label>
          <select class="form-select" name="AnneeCon" required>
            @for($year = 2013; $year <= 2024; $year++)
                                <option value="{{ $year }}-{{ $year + 1 }}">{{ $year }}-{{ $year + 1 }}</option>
                            @endfor
          </select>
        </div>

        <!-- Semesters -->
        <h4 class="mt-4">Les Semestres Concernés</h4>
        <div class="row">
          @for($i = 1; $i <= 6; $i++)
            <div class="col-md-4 mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="semesters[]" value="Semestre {{ $i }}" id="sem{{ $i }}">
                <label class="form-check-label" for="sem{{ $i }}">Semestre {{ $i }}</label>
              </div>
            </div>
          @endfor
        </div>
        

        <div class="mb-3">
          <label class="form-label">La raison</label>
          <textarea name="mtf" rows="4" class="form-control" required></textarea>
        </div>

        <button type="button" id="generatePdfBtn" class="btn btn-primary w-100">Générer le PDF</button>
      </form>
    </div>
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
        <a id="downloadPdfBtn" class="btn btn-primary" href="#" download="demande_calcul_notes_{{ date('Y-m-d') }}.pdf">
          <i class="fa fa-download me-1"></i> Télécharger
        </a>
        <button id="printPdfBtn" class="btn btn-info" style="display: none;">
          <i class="fa fa-print me-1"></i> Imprimer
        </button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  // Handle PDF generation and preview
  document.getElementById('generatePdfBtn').addEventListener('click', function() {
    // Validate form first
    const form = document.getElementById('pdfForm');
    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    // Check if at least one semester is selected
    const semesters = document.querySelectorAll('input[name="semesters[]"]:checked');
    if (semesters.length === 0) {
      alert('Veuillez sélectionner au moins un semestre');
      return;
    }

    // Show the preview modal
    const previewModal = new bootstrap.Modal(document.getElementById('pdfPreviewModal'));
    previewModal.show();

    // Show loading state
    document.getElementById('pdfLoading').style.display = 'flex';
    document.getElementById('pdfPreviewFrame').style.display = 'none';
    document.getElementById('printPdfBtn').style.display = 'none';

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
      if (!response.ok) throw new Error('Network response was not ok');
      return response.blob();
    })
    .then(blob => {
      const pdfUrl = URL.createObjectURL(blob);
      const pdfFrame = document.getElementById('pdfPreviewFrame');
      
      document.getElementById('pdfLoading').style.display = 'none';
      pdfFrame.style.display = 'block';
      pdfFrame.src = pdfUrl;
      
      document.getElementById('downloadPdfBtn').href = pdfUrl;
      document.getElementById('printPdfBtn').style.display = 'inline-block';
      
      // Print functionality
      document.getElementById('printPdfBtn').addEventListener('click', function() {
        const printWindow = window.open(pdfUrl);
        printWindow.onload = function() {
          printWindow.print();
        };
      });

      // Cleanup
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