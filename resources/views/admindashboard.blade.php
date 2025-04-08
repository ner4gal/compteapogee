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

            <div class="container my-6">
                <h1 class="text-center mb-6">Admin Dashboard</h1>

                <!-- Users Table -->

                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Apogee Users</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                            <thead>
                                <tr>
                                    <th>Nom & Prenom</th>
                                    <th>Email</th>
                                    <th>Etablissement</th>
                                    <th>Privilèges APOGEE</th>
                                    <th>Statut</th>
                                    <th>Registered At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->nom_prenom }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->etablissement }}</td>
                                        <td>
                                            @foreach($user->privileges_apogee ?? [] as $item)
                                                <span class="badge bg-primary text-white me-1">{{ $item }},</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <span class="badge 
                                        @if($user->acces_apogee_statut === 'Accès accordé') bg-success
                                        @elseif($user->acces_apogee_statut === 'Accès refusé') bg-danger
                                        @else bg-warning text-dark @endif">
                                                {{ $user->acces_apogee_statut }}
                                            </span>
                                        </td>
                                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-alt-secondary dropdown-toggle"
                                                    data-bs-toggle="dropdown">
                                                    Changer statut
                                                </button>
                                                <div class="dropdown-menu">
                                                    <form method="POST" action="{{ route('admin.update-status', $user->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="status" value="Traitement en cours"
                                                            class="dropdown-item @if($user->acces_apogee_statut === 'Traitement en cours') active @endif">
                                                            Traitement en cours
                                                        </button>
                                                        <button type="submit" name="status" value="Accès accordé"
                                                            class="dropdown-item @if($user->acces_apogee_statut === 'Accès accordé') active @endif">
                                                            Accès accordé
                                                        </button>
                                                        <button type="submit" name="status" value="Accès refusé"
                                                            class="dropdown-item @if($user->acces_apogee_statut === 'Accès refusé') active @endif">
                                                            Accès refusé
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

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