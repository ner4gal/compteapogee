@extends('layouts.app')

@section('title', 'Admin Table de bord')

@section('content')
    <div class="bg-body-extra-light">
        <div class="content content-full">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Accueil / Table de bord</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Table de bord</li>
                </ol>
            </nav>

            <div class="container my-6">
                <h1 class="text-center mb-6">Admin Table de bord</h1>

                <!-- Centered Toggle Buttons -->
                <div class="text-center mb-4">
                    <div class="d-flex flex-wrap justify-content-center gap-2">
                        <button class="btn btn-sm btn-alt-primary toggle-table active" data-target="apogeeUsers">
                            Utilisateurs Apogée
                        </button>
                        <button class="btn btn-sm btn-alt-primary toggle-table" data-target="doctoratDemands">
                            Doctorat
                        </button>
                        <button class="btn btn-sm btn-alt-primary toggle-table" data-target="calculNotes">
                            Calcul Notes
                        </button>
                        <button class="btn btn-sm btn-alt-primary toggle-table" data-target="inscAnneeAnterieure">
                            Inscription Année Antérieure
                        </button>
                        <button class="btn btn-sm btn-alt-primary toggle-table" data-target="resultatEtudiant">
                            Résultat Étudiant
                        </button>
                        <button class="btn btn-sm btn-alt-primary toggle-table" data-target="annulationInscription">
                            Annulation Inscription
                        </button>
                        <button class="btn btn-sm btn-alt-primary toggle-table" data-target="suppressionNote">
                            Suppression Notes
                        </button>
                        <button class="btn btn-sm btn-alt-primary toggle-table" data-target="resultatModule">
                            Résultat Module
                        </button>
                    </div>
                </div>

                <!-- Tables Container -->
                <div class="tables-container">
                    <div id="apogeeUsers" class="table-section show">
                        @include('admin.tables.apogee-users')
                    </div>
                    <div id="doctoratDemands" class="table-section">
                        @include('admin.tables.doctorat-demands')
                    </div>
                    <div id="calculNotes" class="table-section">
                        @include('admin.tables.calcul-notes-demands')
                    </div>
                    <div id="inscAnneeAnterieure" class="table-section">
                        @include('admin.tables.insc-annee-anterieure')
                    </div>
                    <div id="resultatEtudiant" class="table-section">
                        @include('admin.tables.resultat-etudiant')
                    </div>
                    <div id="annulationInscription" class="table-section">
                        @include('admin.tables.annulation-inscription')
                    </div>
                    <div id="suppressionNote" class="table-section">
                        @include('admin.tables.suppression-note-etudiant')
                    </div>
                    <div id="resultatModule" class="table-section">
                        @include('admin.tables.insertion-resultat-module')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table-section {
            display: none;
        }
        .table-section.show {
            display: block;
        }
        .toggle-table.active {
            background-color: #3498db;
            color: white;
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hide all tables except the first one on initial load
        const tables = document.querySelectorAll('.table-section');
        tables.forEach((table, index) => {
            if (index !== 0) {
                table.classList.remove('show');
            }
        });

        // Add click event to all toggle buttons
        document.querySelectorAll('.toggle-table').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetSection = document.getElementById(targetId);
                
                // If clicking the already active button, do nothing
                if (this.classList.contains('active')) return;
                
                // Remove active class from all buttons
                document.querySelectorAll('.toggle-table').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Hide all tables
                document.querySelectorAll('.table-section').forEach(section => {
                    section.classList.remove('show');
                });
                
                // Show the selected table
                targetSection.classList.add('show');
            });
        });
    });
    </script>
@endsection
