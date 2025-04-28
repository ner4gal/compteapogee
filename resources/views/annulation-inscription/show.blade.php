@extends('layouts.app')

@section('title', "Modifier la demande - Annulation d'inscription")

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

    <h2 class="text-center mb-4">Modifier la demande d'annulation d'inscription administrative</h2>

    <form id="pdfForm" method="POST" action="{{ route('annulation.inscription.update', $demand->id) }}">
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
        <label class="form-label">Année universitaire concernée</label>
        <select class="form-select" name="aneINS" required>
          @for($year = 2015; $year <= 2024; $year++)
            @php $formatted = "$year-" . ($year + 1); @endphp
            <option value="{{ $formatted }}" @if($demand->annee_inscription == $formatted) selected @endif>{{ $formatted }}</option>
          @endfor
        </select>
      </div>

      <h4 class="mt-4">Liste des Étudiants</h4>
      <div id="students-container" class="mb-3">
        @foreach($demand->students as $index => $student)
          <div class="student-row d-flex align-items-center gap-2 mt-2">
            <input type="text" name="students[{{ $index }}][apogee]" value="{{ $student['apogee'] }}" class="form-control" placeholder="Numéro APOGEE" required>
            <input type="text" name="students[{{ $index }}][name]" value="{{ $student['name'] }}" class="form-control" placeholder="Nom & Prénom" required>
            <button type="button" class="btn btn-danger remove-student-btn">❌</button>
          </div>
        @endforeach
      </div>

      <button type="button" id="add-student-btn" class="btn btn-success mb-3">+ Ajouter un étudiant</button>

      <div class="mb-3">
        <label class="form-label">La raison de l'annulation</label>
        <textarea name="mtf" rows="4" class="form-control" required>{{ old('mtf', $demand->raison_retard) }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary w-100">Mettre à jour et générer le PDF</button>
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
