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
      <form id='pdfForm' action="{{ route('demande.calcul.store') }}" method="POST" onsubmit="showLoading()">
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

      <!-- Filière -->
      <div class="mb-3">
        <label class="form-label">Filière</label>
        <input type="text" name="filiere" class="form-control" required>
      </div>

      <!-- Academic Year -->
      <div class="mb-3">
        <label class="form-label">Année universitaire concernée</label>
        <select class="form-select" name="AnneeCon" required>
        @for($year = 2015; $year <= 2023; $year++)
      <option value="{{ $year }}-{{ $year + 1 }}">{{ $year }}-{{ $year + 1 }}</option>
    @endfor
        </select>
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
    // Intercept form submission to show the modal
    const pdfForm = document.getElementById('pdfForm');
    pdfForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent immediate submission
        let modalElement = document.getElementById('pdfModal');
        let modal = new bootstrap.Modal(modalElement);
        modal.show();
    });

    // When the download button is clicked, start the countdown
    document.getElementById('downloadBtn').addEventListener('click', function () {
        // Disable the button to prevent multiple clicks during countdown
        this.disabled = true;
        let counterElement = document.getElementById('counter');
        let count = 5;
        counterElement.textContent = count;
        let interval = setInterval(function () {
            count--;
            counterElement.textContent = count;
            if (count <= 0) {
                clearInterval(interval);
                // Hide the modal
                let modalInstance = bootstrap.Modal.getInstance(document.getElementById('pdfModal'));
                modalInstance.hide();
                // Submit the form
                pdfForm.submit();
                // After a short delay, reset the form so that fields are cleared
                setTimeout(function () {
                    pdfForm.reset();
                    // Reset download button and counter for future submissions
                    document.getElementById('downloadBtn').disabled = false;
                    counterElement.textContent = "5";
                }, 100);
            }
        }, 1000);
    });
});
</script>

  @endsection