@extends('layouts.app')

@section('title', 'Modifier la demande - Résultat par étudiant')

@section('content')
<div class="bg-body-extra-light">
  <div class="content content-full">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
        <li class="breadcrumb-item">
          <a href="{{ route('home') }}">Accueil / Table de bord</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('Demands') }}">Demandes</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Modifier la demande</li>
      </ol>
    </nav>
    
    <!-- Quick Access Menu -->
    <div class="row">
      <div class="col-19 col-md-6 col-xl-6">
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

    <h2 class="text-center mb-4">Modifier la demande de résultat par étudiant</h2>

    <form method="POST" action="{{ route('insertion.etudiant.update', $demande->id) }}">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label">Etablissement</label>
        <select class="form-select" name="etbl" required>
          @foreach(['Faculté des Langues des Lettres et des Arts', 'Faculté des Sciences Humaines et Sociales', 'Faculté des Sciences', "Faculté d'Economie et de Gestion", 'Faculté des Sciences Juridiques et Politiques', 'Ecole Nationale de Commerce et de Gestion', 'Ecole Nationale des Sciences Appliquées', 'Ecole Supérieure de Technologie', 'Ecole Nationale Supérieure de Chimie', "Ecole Supérieure d'Education et de Formation", 'Institut des Métiers de Sport'] as $etab)
            <option value="{{ $etab }}" {{ old('etbl', $demande->etablissement) == $etab ? 'selected' : '' }}>{{ $etab }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Date de la demande</label>
        <input type="date" name="dateDM" class="form-control" value="{{ old('dateDM', $demande->date_demande->format('Y-m-d')) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Nom & Prénom de l'étudiant</label>
        <input type="text" name="NomPrenom" class="form-control" value="{{ old('NomPrenom', $demande->NomPrenom) }}" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Numéro d'Apogée </label>
        <input type="text" name="NumApogee" class="form-control" value="{{ old('NumApogee', $demande->NumApogee) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Cycle</label>
        <select name="typ" class="form-control" required>
          @foreach(['Licence', 'Master', 'Lus', 'Mus', 'DUT', 'Classe préparatoire ENCG', 'Classe préparatoire Cycle Ingénieur', 'Cycle Ingénieur', 'Diplome ENCG'] as $cycle)
            <option value="{{ $cycle }}" {{ old('typ', $demande->cycle) == $cycle ? 'selected' : '' }}>{{ $cycle }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Filière</label>
        <input type="text" name="flr" class="form-control" value="{{ old('flr', $demande->filiere) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Nature de la demande</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nrtDM" id="modificationNotes" value="Modification de notes" {{ old('nrtDM', $demande->nature_demande) == 'Modification de notes' ? 'checked' : '' }}>
          <label class="form-check-label" for="modificationNotes">Modification de notes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nrtDM" id="insertionNotes" value="Insertion de notes" {{ old('nrtDM', $demande->nature_demande) == 'Insertion de notes' ? 'checked' : '' }}>
          <label class="form-check-label" for="insertionNotes">Insertion de notes</label>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Semestre</label>
        <select name="Semestre" class="form-select" required>
          @for($i = 1; $i <= 6; $i++)
            <option value="Semestre {{ $i }}" {{ old('Semestre', $demande->semestre) == "Semestre $i" ? 'selected' : '' }}>Semestre {{ $i }}</option>
          @endfor
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Année universitaire concernée</label>
        <select class="form-select" name="AnneeCon" required>
          @for($year = 2015; $year <= 2023; $year++)
            <option value="{{ $year }}-{{ $year + 1 }}" {{ old('AnneeCon', $demande->annee_inscription) == "$year-".($year + 1) ? 'selected' : '' }}>
              {{ $year }}-{{ $year + 1 }}
            </option>
          @endfor
        </select>
      </div>

      <h4 class="mt-4">Liste des Modules</h4>
      <div id="modules-container" class="mb-3">
        @foreach($demande->modules as $index => $module)
        <div class="module-row d-flex align-items-center gap-2 mt-2">
          <input type="text" name="modules[{{ $index }}][M]" value="{{ $module['M'] ?? '' }}" class="form-control" placeholder="Module" required>
          <input type="text" name="modules[{{ $index }}][S]" value="{{ $module['S'] ?? '' }}" class="form-control" placeholder="Session" required>
          <input type="text" name="modules[{{ $index }}][NI]" value="{{ $module['NI'] ?? '' }}" class="form-control" placeholder="Note Initiale" required>
          <input type="text" name="modules[{{ $index }}][NC]" value="{{ $module['NC'] ?? '' }}" class="form-control" placeholder="Note Corrigée" required>
          @if($index > 0)
            <button type="button" class="btn btn-danger remove-module-btn">❌</button>
          @endif
        </div>
        @endforeach
      </div>

      <button type="button" id="add-module-btn" class="btn btn-success mb-3">+ Ajouter un module</button>

      <div class="mb-3">
        <label class="form-label">Raison du retard</label>
        <textarea name="raison" rows="4" class="form-control" required>{{ old('raison', $demande->raison_retard) }}</textarea>
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('Demands') }}" class="btn btn-alt-secondary">Retour</a>
        <button type="submit" class="btn btn-primary">Modifier et télécharger votre demande à nouveau</button>
      </div>
    </form>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    let index = {{ count($demande->modules) }};

    document.getElementById("add-module-btn").addEventListener("click", function () {
      const container = document.getElementById("modules-container");
      const row = document.createElement("div");
      row.classList.add("module-row", "d-flex", "align-items-center", "gap-2", "mt-2");
      row.innerHTML = `
        <input type="text" name="modules[${index}][M]" class="form-control" placeholder="Module" required>
        <input type="text" name="modules[${index}][S]" class="form-control" placeholder="Session" required>
        <input type="text" name="modules[${index}][NI]" class="form-control" placeholder="Note Initiale" required>
        <input type="text" name="modules[${index}][NC]" class="form-control" placeholder="Note Corrigée" required>
        <button type="button" class="btn btn-danger remove-module-btn">❌</button>
      `;
      container.appendChild(row);
      index++;
    });

    document.getElementById("modules-container").addEventListener("click", function (e) {
      if (e.target.classList.contains("remove-module-btn")) {
        e.target.closest(".module-row").remove();
      }
    });
  });
</script>
@endsection