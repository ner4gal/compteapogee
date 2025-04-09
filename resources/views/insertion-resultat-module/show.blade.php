@extends('layouts.app')

@section('title', "Modifier la demande - Résultat par module")

@section('content')
<div class="bg-body-extra-light">
  <div class="content content-full">
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

    <h2 class="text-center mb-4">Modifier la demande de résultat par module</h2>

    <form method="POST" action="{{ route('insertion.module.update', $demand->id) }}">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label">Etablissement</label>
        <input type="text" name="etbl" class="form-control" value="{{ old('etbl', $demand->etablissement) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Date de la demande</label>
        <input type="date" name="dateDM" class="form-control" value="{{ old('dateDM', $demand->date_demande->format('Y-m-d')) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Cycle</label>
        <input type="text" name="typ" class="form-control" value="{{ old('typ', $demand->cycle) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Filière</label>
        <input type="text" name="flr" class="form-control" value="{{ old('flr', $demand->filiere) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Nom du Module</label>
        <input type="text" name="module" class="form-control" value="{{ old('module', $demand->module_nom) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Nature de la demande</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nrtDM" value="Modification de notes" {{ old('nrtDM', $demand->nature_demande) == 'Modification de notes' ? 'checked' : '' }}> Modification de notes
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nrtDM" value="Insertion de notes" {{ old('nrtDM', $demand->nature_demande) == 'Insertion de notes' ? 'checked' : '' }}> Insertion de notes
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Semestre</label>
        <select name="Semestre" class="form-select" required>
          @for($i = 1; $i <= 6; $i++)
            <option value="{{ $i }}" {{ old('Semestre', $demand->semestre) == $i ? 'selected' : '' }}>Semestre {{ $i }}</option>
          @endfor
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Responsable du Module</label>
        <input type="text" name="ResP" class="form-control" value="{{ old('ResP', $demand->responsable_module) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Coordinateur de la Filière</label>
        <input type="text" name="Cordi" class="form-control" value="{{ old('Cordi', $demand->coordinateur_filiere) }}" required>
      </div>

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

      <h4 class="mt-4">Liste des Étudiants</h4>
      <div id="students-container" class="mb-3">
        @foreach($demand->students as $index => $student)
        <div class="student-row d-flex align-items-center gap-2 mt-2">
          <input type="text" name="students[{{ $index }}][apogee]" value="{{ $student['apogee'] }}" class="form-control" placeholder="Numéro APOGEE" required>
          <input type="text" name="students[{{ $index }}][name]" value="{{ $student['name'] }}" class="form-control" placeholder="Nom & Prénom" required>
          <input type="text" name="students[{{ $index }}][session]" value="{{ $student['session'] }}" class="form-control" placeholder="Session" required>
          <input type="text" name="students[{{ $index }}][note_initiale]" value="{{ $student['note_initiale'] }}" class="form-control" placeholder="Note Initiale" required>
          <input type="text" name="students[{{ $index }}][note_corrigee]" value="{{ $student['note_corrigee'] }}" class="form-control" placeholder="Note Corrigée" required>
          <button type="button" class="btn btn-danger remove-student-btn">❌</button>
        </div>
        @endforeach
      </div>

      <button type="button" id="add-student-btn" class="btn btn-success mb-3">+ Ajouter un étudiant</button>

      <div class="mb-3">
        <label class="form-label">Raison du retard</label>
        <textarea name="raso" rows="4" class="form-control" required>{{ old('raso', $demand->raison_retard) }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary w-100">Modifier et télécharger votre demande à nouveau</button>
    </form>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    let index = {{ count($demand->students) }};

    document.getElementById("add-student-btn").addEventListener("click", function () {
      const container = document.getElementById("students-container");
      const row = document.createElement("div");
      row.classList.add("student-row", "d-flex", "align-items-center", "gap-2", "mt-2");
      row.innerHTML = `
        <input type="text" name="students[${index}][apogee]" class="form-control" placeholder="Numéro APOGEE" required>
        <input type="text" name="students[${index}][name]" class="form-control" placeholder="Nom & Prénom" required>
        <input type="text" name="students[${index}][session]" class="form-control" placeholder="Session" required>
        <input type="text" name="students[${index}][note_initiale]" class="form-control" placeholder="Note Initiale" required>
        <input type="text" name="students[${index}][note_corrigee]" class="form-control" placeholder="Note Corrigée" required>
        <button type="button" class="btn btn-danger remove-student-btn">❌</button>
      `;
      container.appendChild(row);
      row.querySelector(".remove-student-btn").addEventListener("click", function () {
        row.remove();
      });
      index++;
    });

    document.getElementById("students-container").addEventListener("click", function (e) {
      if (e.target.classList.contains("remove-student-btn")) {
        e.target.closest(".student-row").remove();
      }
    });
  });
</script>
@endsection