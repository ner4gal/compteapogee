@extends('layouts.app')

@section('title', 'Accueil - Portail des Demandes Administratives')

@section('content')
  <div class="bg-body-extra-light">
    <div class="content content-full">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
      <li class="breadcrumb-item">
        <a href="{{ route('home') }}">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('Demands') }}">Demands</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        Demande d’inscription (Doctorat)
      </li>
      </ol>
    </nav>
    <!-- END Breadcrumb -->

    <!-- Quick Menu (Optional) -->
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

    <h2 class="text-center mb-4">Demande d’inscription administrative à une année antérieure (Cycle Doctorat)</h2>

    <!-- Form -->
    <div class="row">
      <!-- Change the action to match your route -->
      <form id="pdfForm" action="{{ route('doctorat.inscription.store') }}" method="POST" onsubmit="showLoading()">
      @csrf

      <!-- Etablissement -->
      <div class="mb-3">
        <label class="form-label" for="etbl">Etablissement</label>
        <select class="form-select" name="etbl" id="etbl" required>
        <option value="Faculté des Langues des Lettres et des Arts">Faculté des Langues des Lettres et des Arts
        </option>
        <option value="Faculté des Sciences Humaines et Sociales">Faculté des Sciences Humaines et Sociales</option>
        <option value="Faculté des Sciences">Faculté des Sciences</option>
        <option value="Faculté d'Economie et de Gestion">Faculté d'Economie et de Gestion</option>
        <option value="Faculté des Sciences Juridiques et Politiques">Faculté des Sciences Juridiques et Politiques
        </option>
        <option value="Ecole Nationale de Commerce et de Gestion">Ecole Nationale de Commerce et de Gestion</option>
        <option value="Ecole Nationale des Sciences Appliquées">Ecole Nationale des Sciences Appliquées</option>
        <option value="Ecole Supérieure de Technologie">Ecole Supérieure de Technologie</option>
        <option value="Ecole Nationale Supérieure de Chimie">Ecole Nationale Supérieure de Chimie</option>
        <option value="Ecole Supérieure d'Education et de Formation">Ecole Supérieure d'Education et de Formation
        </option>
        <option value="Institut des Métiers de Sport">Institut des Métiers de Sport</option>
        </select>
      </div>

      <!-- CED -->
      <div class="mb-3">
        <label class="form-label" for="ced">CED</label>
        <input type="text" name="ced" class="form-control" id="ced" required>
      </div>

      <!-- Date de la demande -->
      <div class="mb-3">
        <label class="form-label" for="dateDM">Date de la demande</label>
        <input type="date" name="dateDM" class="form-control" id="dateDM" required>
      </div>

      <hr>

      <h4>Doctorant / الباحث(ة)</h4>
      <!-- Nom & Prénom -->
      <div class="mb-3">
        <label class="form-label">Nom &amp; Prénom</label>
        <input type="text" name="nomPrenom" class="form-control" required>
      </div>

      <!-- Date de la 1ère inscription -->
      <div class="mb-3">
        <label class="form-label">Date de la 1ère inscription</label>
        <select class="form-select" name="date1Ins" required>
        @for($year = 2015; $year <= 2023; $year++)
      <option value="{{ $year }}-{{ $year + 1 }}">{{ $year }}-{{ $year + 1 }}</option>
    @endfor
        </select>
      </div>


      <!-- CIN -->
      <div class="mb-3">
        <label class="form-label">CIN</label>
        <input type="text" name="CIN" class="form-control" required>
      </div>

      <!-- CNE -->
      <div class="mb-3">
        <label class="form-label">CNE</label>
        <input type="text" name="CNE" class="form-control" required>
      </div>
      <!-- tele -->
      <div class="mb-3">
        <label class="form-label"> Numéro Telephone </label>
        <input type="text" name="tel" class="form-control" required>
      </div>
      <!-- tele -->
      <div class="mb-3">
        <label class="form-label">Email Institutionnel </label>
        <input type="text" name="email" class="form-control" required>
      </div>
      <!-- Numéro Apogee -->
      <div class="mb-3">
        <label class="form-label">N° Apogee</label>
        <input type="text" name="NumApogee" class="form-control" required>
      </div>

      <!-- Formation Doctorale -->
      <div class="mb-3">
        <label class="form-label">Formation Doctorale</label>
        <input type="text" name="FormationDoctorale" class="form-control" required>
      </div>

      <!-- Structure de Recherche -->
      <div class="mb-3">
        <label class="form-label">Structure de Recherche</label>
        <input type="text" name="StructureRecherche" class="form-control" required>
      </div>

      <!-- Directeur de thèse -->
      <div class="mb-3">
        <label class="form-label">Directeur de thèse</label>
        <input type="text" name="DirThese" class="form-control" required>
      </div>


      <!-- Année d'inscription concernée -->

      <div class="mb-3">
        <label class="form-label">Année universitaire concernée</label>
        <select class="form-select" name="aneINS" required>
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

      <!-- Raison du retard -->
      <div class="mb-3">
        <label class="form-label">La raison du retard</label>
        <textarea name="mtf" rows="4" class="form-control" required></textarea>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary w-100">Générer le PDF</button>
      </form>

    </div>
    <!-- END Form -->

    </div>
  </div>


  <!-- Modal Popup -->
  <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">
      <h5 class="modal-title mb-3" id="pdfModalLabel">Génération du PDF</h5>
      <p id="countdownText">Votre PDF sera prêt dans <strong><span id="counter">7</span></strong> secondes...</p>
    </div>
    </div>
  </div>

  <script>
  const pdfForm = document.getElementById('pdfForm');
  
  // Store the original countdown HTML for reuse
  const originalCountdownHTML = 'Votre PDF sera prêt dans <strong id="counter">7</strong> secondes...';

  function showLoading() {
    const modalElement = document.getElementById('pdfModal');
    const modal = new bootstrap.Modal(modalElement);
    modal.show();

    // Reset the modal content to its initial state
    const countdownText = document.getElementById('countdownText');
    countdownText.innerHTML = originalCountdownHTML;
    
    // Get the counter element from the reset HTML
    let counterSpan = document.getElementById('counter');
    
    let count = 7;
    counterSpan.textContent = count; // ensure it starts at 7

    const interval = setInterval(() => {
      count--;
      counterSpan.textContent = count;

      if (count <= 0) {
        clearInterval(interval);

        // Show success icon and message
        countdownText.innerHTML = `
          <div class="text-success mb-2">
            <i class="fa fa-check-circle fa-2x"></i>
          </div>
          <p><strong>Votre PDF est prêt !</strong></p>
        `;

        // Auto-close after 3 seconds and reset the form.
        setTimeout(() => {
          modal.hide();
          pdfForm.reset();
        }, 3000);
      }
    }, 1000);
  }
</script>

@endsection