@extends('layouts.app')

@section('title', 'Accueil - Portail des Demandes Administratives')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Bienvenue sur le Portail des Demandes Administratives</h2>
        <p class="text-center">Choisissez une demande parmi les options ci-dessous :</p>

        <div class="row g-3">
            @php
                $links = [
                    ['url' => '/inscription-annee-anterieure', 'icon' => 'fa-user-plus', 'text' => 'Inscription Administrative'],
                    ['url' => '/compte-fonctionnel-apogee', 'icon' => 'fa-user-cog', 'text' => 'Compte Fonctionnel Apogée'],
                    ['url' => '/insertion-resultat-etudiant', 'icon' => 'fa-file-alt', 'text' => 'Résultat Étudiant'],
                    ['url' => '/insertion-resultat-module', 'icon' => 'fa-tasks', 'text' => 'Résultat Par Module'],
                    ['url' => '/inscription-doctorat-anterieure', 'icon' => 'fa-graduation-cap', 'text' => 'Inscription Doctorat'],
                    ['url' => '/calcul-notes-annee-anterieure', 'icon' => 'fa-calculator', 'text' => 'Calcul des Notes'],
                    ['url' => '/insertion-nouvelle-specialite-doctorat', 'icon' => 'fa-book', 'text' => 'Nouvelle Spécialité Doctorat']
                ];
            @endphp

            @foreach($links as $link)
                <div class="col-md-4">
                    <a href="{{ $link['url'] }}" class="btn btn-primary w-100 d-flex align-items-center justify-content-center p-3 animated-button">
                        <i class="fas {{ $link['icon'] }} me-2"></i> {{ $link['text'] }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

