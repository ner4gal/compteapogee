@extends('layouts.app')

@section('title', 'Calcul Note - Modifier et Télécharger PDF')

@section('content')
<div class="bg-body-extra-light">
    <div class="content content-full">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('Demands') }}">Demandes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Calcul Note</li>
            </ol>
        </nav>

        <h2 class="text-center mb-4">Modifier et Télécharger la Demande de Calcul des Notes</h2>

        <form id="pdfForm" method="POST" action="{{ route('demande.calcul.update', $demand->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Etablissement</label>
                <select class="form-select" name="etbl" required>
                    @foreach(['Faculté des Langues des Lettres et des Arts', 'Faculté des Sciences Humaines et Sociales', 'Faculté des Sciences', 'Faculté d\'Economie et de Gestion', 'Faculté des Sciences Juridiques et Politiques', 'Ecole Nationale de Commerce et de Gestion', 'Ecole Nationale des Sciences Appliquées', 'Ecole Supérieure de Technologie', 'Ecole Nationale Supérieure de Chimie', 'Ecole Supérieure d\'Education et de Formation', 'Institut des Métiers de Sport'] as $etab)
                        <option value="{{ $etab }}" {{ $demand->etablissement === $etab ? 'selected' : '' }}>{{ $etab }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Date de la demande</label>
                <input type="date" name="dateDM" class="form-control" value="{{ $demand->date_demande->format('Y-m-d') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nom & Prénom</label>
                <input type="text" name="NomPrenomETD" class="form-control" value="{{ $demand->NomPrenomETD }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Numéro APOGEE</label>
                <input type="text" name="NumETD" class="form-control" value="{{ $demand->NumETD }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Cycle</label>
                <select name="cycle" class="form-control" required>
                    @foreach(['Licence', 'Master', 'Lus', 'Mus', 'DUT', 'Classe préparatoire ENCG', 'Classe préparatoire Cycle Ingénieur', 'Cycle Ingénieur', 'Diplome ENCG'] as $cycle)
                        <option value="{{ $cycle }}" {{ $demand->cycle === $cycle ? 'selected' : '' }}>{{ $cycle }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Filière</label>
                <input type="text" name="filiere" class="form-control" value="{{ $demand->filiere }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Année universitaire concernée</label>
                <select name="AnneeCon" class="form-select" required>
                    @for($year = 2015; $year <= 2023; $year++)
                        <option value="{{ $year }}-{{ $year + 1 }}" {{ $demand->annee_inscription == "$year-$year+1" ? 'selected' : '' }}>{{ $year }}-{{ $year + 1 }}</option>
                    @endfor
                </select>
            </div>

            <h4 class="mt-4">Les Semestres Concernés</h4>
            <div class="row">
                @foreach(['Semestre 1','Semestre 2','Semestre 3','Semestre 4','Semestre 5','Semestre 6'] as $index => $sem)
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="semesters[]" value="{{ $sem }}" id="sem{{ $index+1 }}"
                            {{ in_array($sem, $demand->semesters ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label" for="sem{{ $index+1 }}">{{ $sem }}</label>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-4">Modifier et télécharger votre PDF à nouveau</button>
        </form>
    </div>
</div>
@endsection
