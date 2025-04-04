@extends('layouts.app')

@section('title', 'Calcul Note - Demande de calcul des notes')

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
      <li class="breadcrumb-item active" aria-current="page">Calcul Note</li>
      </ol>
    </nav>
    <!-- END Breadcrumb -->

    <h2 class="text-center mb-4">Demande de calcul des notes à une année universitaire antérieure</h2>

    <!-- Form -->
    <div class="row">
      <form action="{{ route('demande.calcul.store') }}" method="POST" onsubmit="showLoading()">
      @csrf

      <!-- Institution -->
      <div class="mb-3">
        <label class="form-label" for="etablissement">Etablissement</label>
        <select class="form-select" name="etbl" required>
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

      <!-- Date of Request -->
      <div class="mb-3">
        <label class="form-label">Date de la demande</label>
        <input type="date" name="dateDM" class="form-control" required>
      </div>

      <!-- Name and Surname -->
      <div class="mb-3">
        <label class="form-label">Nom &amp; Prénom</label>
        <input type="text" name="NomPrenomETD" class="form-control" required>
      </div>

      <!-- APOGEE Number -->
      <div class="mb-3">
        <label class="form-label">Numéro d'Apogée</label>
        <input type="text" name="NumETD" class="form-control" required>
      </div>

      <!-- Cycle -->
      <div class="mb-3">
        <label class="form-label">Cycle</label>
        <input type="text" name="cycle" class="form-control" required>
      </div>

      <!-- Filière -->
      <div class="mb-3">
        <label class="form-label">Filière</label>
        <input type="text" name="filiere" class="form-control" required>
      </div>

      <!-- Academic Year -->
      <div class="mb-3">
        <label class="form-label">Année concernée</label>
        <input type="text" name="AnneeCon" class="form-control" required>
      </div>

      <!-- Semesters -->
      <h4 class="mt-4">Les Semestres Concernés</h4>
      <div class="row">
        <div class="col-md-4 mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="semesters[]" value="Semestre 1" id="sem1">
          <label class="form-check-label" for="sem1">Semestre 1</label>
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="semesters[]" value="Semestre 2" id="sem2">
          <label class="form-check-label" for="sem2">Semestre 2</label>
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="semesters[]" value="Semestre 3" id="sem3">
          <label class="form-check-label" for="sem3">Semestre 3</label>
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="semesters[]" value="Semestre 4" id="sem4">
          <label class="form-check-label" for="sem4">Semestre 4</label>
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="semesters[]" value="Semestre 5" id="sem5">
          <label class="form-check-label" for="sem5">Semestre 5</label>
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="semesters[]" value="Semestre 6" id="sem6">
          <label class="form-check-label" for="sem6">Semestre 6</label>
        </div>
        </div>
      </div>


      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary w-100">Générer le PDF</button>
      </form>
    </div>
    </div>

    <!-- Modal Popup for PDF Generation Loading -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center p-4">
      <h5 class="modal-title mb-3" id="pdfModalLabel">Génération du PDF</h5>
      <p id="countdownText">Votre PDF sera prêt dans <strong><span id="counter">7</span></strong> secondes...</p>
      </div>
    </div>
    </div>

    <script>
    // Function to show the loading modal with a countdown
    function showLoading() {
      const modal = new bootstrap.Modal(document.getElementById('pdfModal'));
      modal.show();

      let count = 7;
      const counterSpan = document.getElementById('counter');
      const countdownText = document.getElementById('countdownText');

      const interval = setInterval(() => {
      count--;
      counterSpan.textContent = count;

      if (count <= 0) {
        clearInterval(interval);
        countdownText.innerHTML = `
        <div class="text-success mb-2">
          <i class="fa fa-check-circle fa-2x"></i>
        </div>
        <p><strong>Votre PDF est prêt !</strong></p>
        `;
        setTimeout(() => {
        modal.hide();
        }, 3000);
      }
      }, 1000);
    }
    </script>
  @endsection