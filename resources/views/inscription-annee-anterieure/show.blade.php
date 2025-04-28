@extends('layouts.app')

@section('title', "Détails de la demande d'inscription administrative à une année antérieure")

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
                    <li class="breadcrumb-item active" aria-current="page">Détails de la demande</li>
                </ol>
            </nav>
            <!-- END Breadcrumb -->

            <h2 class="text-center mb-4">Détails de la demande d'inscription administrative</h2>

            <!-- Demand Details -->
            <div class="block block-rounded">
                <div class="block-content">
                    <form id="pdfForm" action="{{ route('inscription-annee-anterieure.update', $demande->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Etablissement</label>
                                <input type="text" class="form-control" value="{{ $demande->etablissement }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date de la demande</label>
                                <input type="date" name="dateDM" class="form-control"
                                    value="{{ $demande->date_demande->format('Y-m-d') }}" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Cycle</label>
                                <select name="typ" class="form-control" required>
                                    @foreach(['Licence', 'Master', 'Lus', 'Mus', 'DUT', 'Classe préparatoire ENCG', 'Classe préparatoire Cycle Ingénieur', 'Cycle Ingénieur', 'Diplome ENCG'] as $cycle)
                                        <option value="{{ $cycle }}" {{ $demande->cycle == $cycle ? 'selected' : '' }}>
                                            {{ $cycle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Filière</label>
                                <input type="text" name="flr" class="form-control" value="{{ $demande->filiere }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Nature de la demande</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nrtDM" id="nouvelleInscription"
                                    value="Nouvelle inscription" {{ $demande->nature_demande == 'Nouvelle inscription' ? 'checked' : '' }}>
                                <label class="form-check-label" for="nouvelleInscription">Nouvelle inscription</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nrtDM" id="modificationInscription"
                                    value="Modification d'une inscription" {{ $demande->nature_demande == 'Modification d\'une inscription' ? 'checked' : '' }}>
                                <label class="form-check-label" for="modificationInscription">Modification d'une
                                    inscription</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Année universitaire concernée</label>
                            <select class="form-select" name="aneINS" required>
                                @for($year = 2015; $year <= 2023; $year++)
                                    <option value="{{ $year }}-{{ $year + 1 }}" {{ $demande->annee_universitaire == $year . '-' . ($year + 1) ? 'selected' : '' }}>
                                        {{ $year }}-{{ $year + 1 }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <h4 class="mt-4">Liste des Étudiants</h4>
                        <div id="students-container" class="mb-3">
                            @foreach($demande->students as $index => $student)
                                <div class="student-row d-flex align-items-center gap-2 mb-2">
                                    <input type="text" name="students[{{ $index }}][apogee]" class="form-control"
                                        value="{{ $student['apogee'] }}" placeholder="Numéro APOGEE" required>
                                    <input type="text" name="students[{{ $index }}][name]" class="form-control"
                                        value="{{ $student['name'] }}" placeholder="Nom & Prénom" required>
                                    @if($index > 0)
                                        <button type="button" class="btn btn-danger remove-student-btn">❌</button>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <button type="button" id="add-student-btn" class="btn btn-success mb-3">+ Ajouter un
                            étudiant</button>

                        <div class="mb-4">
                            <label class="form-label">La raison du retard</label>
                            <textarea name="mtf" rows="4" class="form-control"
                                required>{{ $demande->raison_retard }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('home') }}" class="btn btn-alt-secondary">Retour</a>
                            <button type="submit" class="btn btn-primary">Modifier et télécharger votre PDF à
                                nouveau</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Initialize with current student count
        let studentIndex = {{ count($students) }};
        
        // Add student functionality
        document.getElementById("add-student-btn").addEventListener("click", function() {
            let container = document.getElementById("students-container");
            let newRow = document.createElement("div");
            newRow.className = "student-row d-flex align-items-center gap-2 mb-2";
            newRow.innerHTML = `
                <input type="text" name="students[${studentIndex}][apogee]" 
                       class="form-control" placeholder="Numéro APOGEE" required>
                <input type="text" name="students[${studentIndex}][name]" 
                       class="form-control" placeholder="Nom & Prénom" required>
                <button type="button" class="btn btn-danger remove-student-btn">❌</button>
            `;
            container.appendChild(newRow);
            studentIndex++;
        });

        // Remove student functionality
        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("remove-student-btn")) {
                e.target.closest(".student-row").remove();
            }
        });
    });
</script>
@endsection