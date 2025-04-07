@extends('layouts.app')

@section('title', "Modifier la demande de suppression des notes")

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
          <a href="{{ route('Demands') }}">Demandes</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Modifier la demande</li>
      </ol>
    </nav>
    <!-- END Breadcrumb -->
      <!-- Quick Access Menu -->
      <div class="row">
        <div class="col-19 col-md-6 col-xl-6">
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

    <h2 class="text-center mb-4">Modifier la demande de suppression des notes (Par Étudiant)</h2>

    <!-- Form for editing the demand -->
    <!-- This form should submit to your update route -->
    <form id="editForm" method="POST" action="{{ route('suppression.note.etudiant.update', $demand->id) }}">
      @csrf
      @method('PUT')
      
      <!-- Etablissement as a select -->
      <div class="mb-3">
        <label class="form-label">Etablissement</label>
        <select class="form-select" name="etbl" required>
          <option value="Faculté des Langues des Lettres et des Arts" {{ old('etbl', $demand->etablissement) == 'Faculté des Langues des Lettres et des Arts' ? 'selected' : '' }}>Faculté des Langues des Lettres et des Arts</option>
          <option value="Faculté des Sciences Humaines et Sociales" {{ old('etbl', $demand->etablissement) == 'Faculté des Sciences Humaines et Sociales' ? 'selected' : '' }}>Faculté des Sciences Humaines et Sociales</option>
          <option value="Faculté des Sciences" {{ old('etbl', $demand->etablissement) == 'Faculté des Sciences' ? 'selected' : '' }}>Faculté des Sciences</option>
          <option value="Faculté d'Economie et de Gestion" {{ old('etbl', $demand->etablissement) == "Faculté d'Economie et de Gestion" ? 'selected' : '' }}>Faculté d'Economie et de Gestion</option>
          <option value="Faculté des Sciences Juridiques et Politiques" {{ old('etbl', $demand->etablissement) == 'Faculté des Sciences Juridiques et Politiques' ? 'selected' : '' }}>Faculté des Sciences Juridiques et Politiques</option>
          <option value="Ecole Nationale de Commerce et de Gestion" {{ old('etbl', $demand->etablissement) == 'Ecole Nationale de Commerce et de Gestion' ? 'selected' : '' }}>Ecole Nationale de Commerce et de Gestion</option>
          <option value="Ecole Nationale des Sciences Appliquées" {{ old('etbl', $demand->etablissement) == 'Ecole Nationale des Sciences Appliquées' ? 'selected' : '' }}>Ecole Nationale des Sciences Appliquées</option>
          <option value="Ecole Supérieure de Technologie" {{ old('etbl', $demand->etablissement) == 'Ecole Supérieure de Technologie' ? 'selected' : '' }}>Ecole Supérieure de Technologie</option>
          <option value="Ecole Nationale Supérieure de Chimie" {{ old('etbl', $demand->etablissement) == 'Ecole Nationale Supérieure de Chimie' ? 'selected' : '' }}>Ecole Nationale Supérieure de Chimie</option>
          <option value="Ecole Supérieure d'Education et de Formation" {{ old('etbl', $demand->etablissement) == "Ecole Supérieure d'Education et de Formation" ? 'selected' : '' }}>Ecole Supérieure d'Education et de Formation</option>
          <option value="Institut des Métiers de Sport" {{ old('etbl', $demand->etablissement) == 'Institut des Métiers de Sport' ? 'selected' : '' }}>Institut des Métiers de Sport</option>
        </select>
      </div>

      <!-- Date de la demande -->
      <div class="mb-3">
        <label class="form-label">Date de la demande</label>
        <input type="date" name="dateDM" class="form-control" value="{{ old('dateDM', $demand->date_demande->format('Y-m-d')) }}" required>
      </div>

      <!-- Nom & Prénom -->
      <div class="mb-3">
        <label class="form-label">Nom &amp; Prénom</label>
        <input type="text" name="NomPrenom" class="form-control" value="{{ old('NomPrenom', $demand->NomPrenom) }}" required>
      </div>

      <!-- Numéro APOGEE -->
      <div class="mb-3">
        <label class="form-label">Numéro APOGEE</label>
        <input type="text" name="NumApogee" class="form-control" value="{{ old('NumApogee', $demand->NumApogee) }}" required>
      </div>

      <!-- Cycle as a select -->
      <div class="mb-3">
        <label class="form-label">Cycle</label>
        <select name="typ" id="typ" class="form-control" required>
          <option value="Licence" {{ old('typ', $demand->cycle) == 'Licence' ? 'selected' : '' }}>Licence</option>
          <option value="Master" {{ old('typ', $demand->cycle) == 'Master' ? 'selected' : '' }}>Master</option>
          <option value="Lus" {{ old('typ', $demand->cycle) == 'Lus' ? 'selected' : '' }}>Lus</option>
          <option value="Mus" {{ old('typ', $demand->cycle) == 'Mus' ? 'selected' : '' }}>Mus</option>
          <option value="DUT" {{ old('typ', $demand->cycle) == 'DUT' ? 'selected' : '' }}>DUT</option>
          <option value="Classe préparatoire ENCG" {{ old('typ', $demand->cycle) == 'Classe préparatoire ENCG' ? 'selected' : '' }}>Classe préparatoire ENCG</option>
          <option value="Classe préparatoire Cycle Ingénieur" {{ old('typ', $demand->cycle) == 'Classe préparatoire Cycle Ingénieur' ? 'selected' : '' }}>Classe préparatoire Cycle Ingénieur</option>
          <option value="Cycle Ingénieur" {{ old('typ', $demand->cycle) == 'Cycle Ingénieur' ? 'selected' : '' }}>Cycle Ingénieur</option>
          <option value="Diplome ENCG" {{ old('typ', $demand->cycle) == 'Diplome ENCG' ? 'selected' : '' }}>Diplome ENCG</option>
        </select>
      </div>

      <!-- Filière -->
      <div class="mb-3">
        <label class="form-label">Filière</label>
        <input type="text" name="flr" class="form-control" value="{{ old('flr', $demand->filiere) }}" required>
      </div>

      <!-- Semestre as radio buttons -->
      <div class="mb-3">
        <label class="form-label">Semestre</label>
        <div>
          @for($i = 1; $i <= 6; $i++)
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Semestre" id="semestre{{ $i }}" value="semestre {{ $i }}"
              {{ old('Semestre', $demand->Semestre) == "semestre $i" ? 'checked' : '' }} required>
              <label class="form-check-label" for="semestre{{ $i }}">Semestre {{ $i }}</label>
            </div>
          @endfor
        </div>
      </div>

      <!-- Année universitaire concernée -->
      <div class="mb-3">
        <label class="form-label">Année universitaire concernée</label>
        <select class="form-select" name="AnneeCon" required>
          @for($year = 2015; $year <= 2023; $year++)
            <option value="{{ $year }}-{{ $year + 1 }}" {{ old('AnneeCon', $demand->annee_inscription) == "$year-$year+1" ? 'selected' : '' }}>
              {{ $year }}-{{ $year + 1 }}
            </option>
          @endfor
        </select>
      </div>

      <!-- Nature de la demande -->
      <div class="mb-3">
        <label class="form-label">Nature de la demande :</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nrtDM" id="suppressionNotes" value="Suppression des notes"
          {{ old('nrtDM', $demand->nature_demande) == 'Suppression des notes' ? 'checked' : '' }}>
          <label class="form-check-label" for="suppressionNotes">Suppression des notes</label>
        </div>
      </div>

      <h4 class="mt-4">Liste des Modules</h4>
      <!-- Modules Container -->
      <div id="modules-container" class="mb-3">
        @if(old('modules', $demand->modules))
          @foreach(old('modules', $demand->modules) as $index => $module)
            <div class="module-row d-flex align-items-center gap-2 mt-2">
              <input type="text" name="modules[{{ $index }}][M]" class="form-control" placeholder="Nom du Module" value="{{ $module['M'] }}" required>
              <input type="text" name="modules[{{ $index }}][S]" class="form-control" placeholder="Session" value="{{ $module['S'] }}" required>
              <input type="text" name="modules[{{ $index }}][NI]" class="form-control" placeholder="Note" value="{{ $module['NI'] }}" required>
              <button type="button" class="btn btn-danger remove-module-btn">❌</button>
            </div>
          @endforeach
        @else
          <div class="module-row d-flex align-items-center gap-2 mt-2">
            <input type="text" name="modules[0][M]" class="form-control" placeholder="Nom du Module" required>
            <input type="text" name="modules[0][S]" class="form-control" placeholder="Session" required>
            <input type="text" name="modules[0][NI]" class="form-control" placeholder="Note" required>
            <button type="button" class="btn btn-danger remove-module-btn">❌</button>
          </div>
        @endif
      </div>

      <!-- Button to Add More Modules -->
      <button type="button" id="add-module-btn" class="btn btn-success mb-3">+ Ajouter un module</button>

      <!-- Reason for suppression -->
      <div class="mb-3">
        <label class="form-label">Raison de suppression des notes</label>
        <textarea name="raison" rows="4" class="form-control" required>{{ old('raison', $demand->raison_retard) }}</textarea>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary w-100">Modifier et télécharger votre demande à nouveau</button>
    </form>
  </div>
</div>

<!-- Optional: If you want to trigger a modal countdown before submission, you can add that logic here instead of direct form submission -->
<script>
   document.addEventListener("DOMContentLoaded", function () {
    let moduleIndex = {{ count(old('modules', $demand->modules)) }};

    // Event delegation for remove button
    document.getElementById("modules-container").addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("remove-module-btn")) {
            e.target.closest(".module-row").remove();
        }
    });

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
        moduleIndex++;
    });
});

</script>
@endsection
