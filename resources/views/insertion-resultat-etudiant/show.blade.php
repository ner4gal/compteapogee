@extends('layouts.app')

@section('title', "Modification de demande d'inscription")

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
                <li class="breadcrumb-item active">Modification</li>
            </ol>
        </nav>

        <h2 class="text-center mb-4">Modifier la demande d'inscription</h2>
        @php
        $etablissements = [
            'Faculté des Langues des Lettres et des Arts',
            'Faculté des Sciences Humaines et Sociales',
            'Faculté des Sciences',
            'Faculté d\'Economie et de Gestion',
            'Faculté des Sciences Juridiques et Politiques',
            'Ecole Nationale de Commerce et de Gestion',
            'Ecole Nationale des Sciences Appliquées',
            'Ecole Supérieure de Technologie', 
            'Ecole Nationale Supérieure de Chimie',
            'Ecole Supérieure d\'Education et de Formation',
            'Institut des Métiers de Sport'
        ];
    @endphp
   
        <form id="pdfForm" method="POST" action="{{ route('inscription-annee-anterieure.update', $demande->id) }}">
            @csrf
            @method('PUT')

            <!-- Etablissement -->
            <div class="mb-3">
                <label class="form-label">Etablissement</label>
                <select class="form-select" name="etbl" required>
                    @foreach($etablissements as $etab)
                        <option value="{{ $etab }}" {{ $etab == $demande->etablissement ? 'selected' : '' }}>
                            {{ $etab }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Date -->
            <div class="mb-3">
                <label class="form-label">Date de la demande</label>
                <input type="date" name="dateDM" class="form-control" 
                       value="{{ $demande->date_demande->format('Y-m-d') }}" required>
            </div>

            <!-- Student Info -->
            <div class="mb-3">
                <label class="form-label">Nom & Prénom</label>
                <input type="text" name="NomPrenom" class="form-control" 
                       value="{{ $demande->NomPrenom }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Numéro APOGEE</label>
                <input type="text" name="NumApogee" class="form-control" 
                       value="{{ $demande->NumApogee }}" required>
            </div>

            <!-- Cycle -->
            <div class="mb-3">
                <label class="form-label">Cycle</label>
                <select name="typ" class="form-control" required>
                    @foreach(['Licence', 'Master', 'Lus', 'Mus', 'DUT'] as $cycle)
                        <option value="{{ $cycle }}" {{ $cycle == $demande->cycle ? 'selected' : '' }}>
                            {{ $cycle }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filière -->
            <div class="mb-3">
                <label class="form-label">Filière</label>
                <input type="text" name="flr" class="form-control" 
                       value="{{ $demande->filiere }}" required>
            </div>

            <!-- Semestre -->
            <div class="mb-3">
                <label class="form-label">Semestre</label>
                <div>
                    @for($i = 1; $i <= 6; $i++)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Semestre" 
                                   id="semestre{{ $i }}" value="semestre {{ $i }}"
                                   {{ "semestre $i" == $demande->semestre ? 'checked' : '' }} required>
                            <label class="form-check-label" for="semestre{{ $i }}">Semestre {{ $i }}</label>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Année universitaire -->
            <div class="mb-3">
                <label class="form-label">Année universitaire concernée</label>
                <select class="form-select" name="AnneeCon" required>
                    @foreach($annees as $year)
                        <option value="{{ $year }}-{{ $year + 1 }}" 
                                {{ "$year-".($year+1) == $demande->annee_universitaire ? 'selected' : '' }}>
                            {{ $year }}-{{ $year + 1 }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nature demande -->
            <div class="mb-3">
                <label class="form-label">Nature de la demande :</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="nrtDM" id="modificationNotes"
                           value="Modification de notes" 
                           {{ 'Modification de notes' == $demande->nature_demande ? 'checked' : '' }}>
                    <label class="form-check-label" for="modificationNotes">Modification de notes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="nrtDM" id="insertionNotes"
                           value="Insertion de notes"
                           {{ 'Insertion de notes' == $demande->nature_demande ? 'checked' : '' }}>
                    <label class="form-check-label" for="insertionNotes">Insertion de notes</label>
                </div>
            </div>

            <!-- Modules -->
            <h4 class="mt-4">Liste des Modules</h4>
            <div id="modules-container" class="mb-3">
                @foreach($modules as $index => $module)
                    <div class="module-row d-flex align-items-center gap-2 mb-2">
                        <input type="text" name="modules[{{ $index }}][M]" 
                               value="{{ $module['M'] }}" class="form-control" placeholder="Module" required>
                        <input type="text" name="modules[{{ $index }}][S]" 
                               value="{{ $module['S'] }}" class="form-control" placeholder="Session" required>
                        <input type="text" name="modules[{{ $index }}][NI]" 
                               value="{{ $module['NI'] }}" class="form-control" placeholder="Note Initiale" required>
                        <input type="text" name="modules[{{ $index }}][NC]" 
                               value="{{ $module['NC'] }}" class="form-control" placeholder="Note Corrigée" required>
                        @if($index > 0)
                            <button type="button" class="btn btn-danger remove-module-btn">❌</button>
                        @endif
                    </div>
                @endforeach
            </div>
            <button type="button" id="add-module-btn" class="btn btn-success mb-3">+ Ajouter un module</button>

            <!-- Raison -->
            <div class="mb-3">
                <label class="form-label">Raison du retard</label>
                <textarea name="raison" rows="4" class="form-control" required>{{ $demande->raison_retard }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('Demands') }}" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn btn-primary">Enregistrer et générer PDF</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let moduleIndex = {{ count($modules) }};
    
    // Add module
    document.getElementById("add-module-btn").addEventListener("click", function() {
        let container = document.getElementById("modules-container");
        let newRow = document.createElement("div");
        newRow.className = "module-row d-flex align-items-center gap-2 mb-2";
        newRow.innerHTML = `
            <input type="text" name="modules[${moduleIndex}][M]" class="form-control" placeholder="Module" required>
            <input type="text" name="modules[${moduleIndex}][S]" class="form-control" placeholder="Session" required>
            <input type="text" name="modules[${moduleIndex}][NI]" class="form-control" placeholder="Note Initiale" required>
            <input type="text" name="modules[${moduleIndex}][NC]" class="form-control" placeholder="Note Corrigée" required>
            <button type="button" class="btn btn-danger remove-module-btn">❌</button>
        `;
        container.appendChild(newRow);
        moduleIndex++;
    });

    // Remove module
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("remove-module-btn")) {
            e.target.closest(".module-row").remove();
        }
    });
});
</script>
@endsection