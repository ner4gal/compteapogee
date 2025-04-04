@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="bg-body-extra-light">
    <div class="content content-full">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
            <li class="breadcrumb-item">
              <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
          </ol>
        </nav>
        <!-- END Breadcrumb -->

        <div class="container my-4">
            <h1 class="text-center mb-4">Admin Dashboard</h1>

            <!-- Users Table -->
            <h2>All Appoget Users</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registered At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->nom_prenom }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Doctorat Inscription Demands Table -->
            <h2>Doctorat Inscription Demands</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Etablissement</th>
                        <th>Date de la demande</th>
                        <th>Nom & Prénom</th>
                        <th>CIN</th>
                        <th>N° Apogee</th>
                        <th>Formation Doctorale</th>
                        <th>Année d'inscription concernée</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctoratDemands as $demand)
                    <tr>
                        <td>{{ $demand->id }}</td>
                        <td>{{ $demand->etbl }}</td>
                        <td>{{ $demand->dateDM->format('d/m/Y') }}</td>
                        <td>{{ $demand->nomPrenom }}</td>
                        <td>{{ $demand->CIN }}</td>
                        <td>{{ $demand->NumApogee }}</td>
                        <td>{{ $demand->FormationDoctorale }}</td>
                        <td>{{ $demand->aneINS }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Calcul des Notes Demands Table -->
            <h2>Calcul des Notes Demands</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Etablissement</th>
                        <th>Date de la demande</th>
                        <th>Cycle</th>
                        <th>Filière</th>
                        <th>Année Concernée</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calculNotesDemands as $demand)
                    <tr>
                        <td>{{ $demand->user_email }}</td>
                        <td>{{ $demand->etablissement}}</td>
                        <td>{{ $demand->date_demande->format('d/m/Y') }}</td>
                        <td>{{ $demand->cycle }}</td>
                        <td>{{ $demand->filiere }}</td>
                        <td>{{ $demand->AnneeCon }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
