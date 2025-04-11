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
                                    <th>Centre Gestion</th>
                                    <th>Centre Traitement</th>
                                    <th>Inscription Pédagogique</th>
                                    <th>Incompatibilité</th>
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

                                        {{-- Privileges APOGEE --}}
                                        <td>
                                            @foreach($user->privileges_apogee ?? [] as $item)
                                                <span
                                                    class="badge bg-primary text-white me-1">{{ $item }}@if(!$loop->last),@endif</span>
                                            @endforeach
                                        </td>

                                        {{-- Centre Gestion --}}
                                        <td>
                                            @foreach($user->centre_gestion ?? [] as $item)
                                                <span
                                                    class="badge bg-info text-white me-1">{{ $item }}@if(!$loop->last),@endif</span>
                                            @endforeach
                                        </td>

                                        {{-- Centre Traitement --}}
                                        <td>
                                            @foreach($user->centre_traitement ?? [] as $item)
                                                <span
                                                    class="badge bg-info text-white me-1">{{ $item }}@if(!$loop->last),@endif</span>
                                            @endforeach
                                        </td>

                                        {{-- Inscription Pédagogique --}}
                                        <td>
                                            @foreach($user->centre_inscription_pedagogique ?? [] as $item)
                                                <span
                                                    class="badge bg-info text-white me-1">{{ $item }}@if(!$loop->last),@endif</span>
                                            @endforeach
                                        </td>

                                        {{-- Incompatibilité --}}
                                        <td>
                                            @foreach($user->centre_incompatibilite ?? [] as $item)
                                                <span
                                                    class="badge bg-info text-white me-1">{{ $item }}@if(!$loop->last),@endif</span>
                                            @endforeach
                                        </td>

                                        {{-- Statut --}}
                                        <td>
                                            <span class="badge 
                                                                @if($user->acces_apogee_statut === 'Accès accordé') bg-success
                                                                @elseif($user->acces_apogee_statut === 'Accès refusé') bg-danger
                                                                @else bg-warning text-dark @endif">
                                                {{ $user->acces_apogee_statut }}
                                            </span>
                                        </td>

                                        {{-- Date --}}
                                        <td>{{ optional($user->created_at)->format('d/m/Y') ?? '—' }}</td>

                                        {{-- Actions --}}
                                        <td>
                                            <div class="btn-group mb-1">
                                                <button type="button" class="btn btn-sm btn-alt-secondary dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-label="Changer le statut de l'utilisateur">
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

                                            <a href=""
                                                class="btn btn-sm btn-alt-info" aria-label="Voir le profil utilisateur">
                                                <i class="fa fa-eye"></i> Voir
                                            </a>

                                            {{-- Delete Button --}}
                                            <form action="" method="POST"
                                                style="display:inline-block;"
                                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-alt-danger"
                                                    aria-label="Supprimer l'utilisateur">
                                                    <i class="fa fa-trash"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- Doctorat Inscription Demands Table -->

                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Doctorat Inscription Demands</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Etablissement</th>
                                    <th>Date de la demande</th>
                                    <th>Nom & Prénom</th>
                                    <th>CIN</th>
                                    <th>N° Apogée</th>
                                    <th>Formation Doctorale</th>
                                    <th>Année d'inscription concernée</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctoratDemands as $demand)
                                    <tr>
                                        <td>{{ $demand->id }}</td>
                                        <td>{{ $demand->etbl }}</td>
                                        <td>{{ optional($demand->dateDM)->format('d/m/Y') ?? '—' }}</td>
                                        <td>{{ $demand->nomPrenom }}</td>
                                        <td>{{ $demand->CIN }}</td>
                                        <td>{{ $demand->NumApogee }}</td>
                                        <td>{{ $demand->FormationDoctorale }}</td>
                                        <td>{{ $demand->aneINS }}</td>
                                        <td>
                                            <span class="badge 
                                                            @if($demand->statut === 'Traité') bg-success
                                                            @elseif($demand->statut === 'Rejeté') bg-danger
                                                            @else bg-warning text-dark @endif">
                                                {{ $demand->statut ?? '—' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group mb-1">
                                                <button type="button" class="btn btn-sm btn-alt-secondary dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-label="Changer le statut de la demande">
                                                    Changer statut
                                                </button>
                                                <div class="dropdown-menu">
                                                    <form method="POST"
                                                        action="{{ route('admin.doctorat.update-status', $demand->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="status" value="En attente"
                                                            class="dropdown-item @if($demand->statut === 'En attente') active @endif">
                                                            En attente
                                                        </button>
                                                        <button type="submit" name="status" value="Traité"
                                                            class="dropdown-item @if($demand->statut === 'Traité') active @endif">
                                                            Traité
                                                        </button>
                                                        <button type="submit" name="status" value="Rejeté"
                                                            class="dropdown-item @if($demand->statut === 'Rejeté') active @endif">
                                                            Rejeté
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <form action="{{ route('admin.doctorat.destroy', $demand->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-alt-danger"
                                                    aria-label="Supprimer la demande">
                                                    <i class="fa fa-trash-alt"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>


                <!-- Calcul des Notes Demands Table -->
                <div class="block block-rounded mt-4">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Calcul des Notes Demands</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Etablissement</th>
                                    <th>Date de la demande</th>
                                    <th>Cycle</th>
                                    <th>Filière</th>
                                    <th>Année Concernée</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calculNotesDemands as $demand)
                                    <tr>
                                        <td>{{ $demand->user_email }}</td>
                                        <td>{{ $demand->etablissement }}</td>
                                        <td>{{ optional($demand->date_demande)->format('d/m/Y') ?? '—' }}</td>
                                        <td>{{ $demand->cycle }}</td>
                                        <td>{{ $demand->filiere }}</td>
                                        <td>{{ $demand->AnneeCon }}</td>

                                        {{-- Statut avec badge --}}
                                        <td>
                                            <span class="badge 
                                        @if($demand->statut === 'Traité') bg-success
                                        @elseif($demand->statut === 'Rejeté') bg-danger
                                        @else bg-warning text-dark @endif">
                                                {{ $demand->statut ?? 'En attente' }}
                                            </span>
                                        </td>

                                        {{-- Actions --}}
                                        <td>
                                            <div class="btn-group mb-1">
                                                <button type="button" class="btn btn-sm btn-alt-secondary dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-label="Changer le statut de la demande">
                                                    Changer statut
                                                </button>
                                                <div class="dropdown-menu">
                                                    <form method="POST"
                                                        action="{{ route('admin.calcul-notes.update-status', $demand->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="status" value="En attente"
                                                            class="dropdown-item @if($demand->statut === 'En attente') active @endif">
                                                            En attente
                                                        </button>
                                                        <button type="submit" name="status" value="Traité"
                                                            class="dropdown-item @if($demand->statut === 'Traité') active @endif">
                                                            Traité
                                                        </button>
                                                        <button type="submit" name="status" value="Rejeté"
                                                            class="dropdown-item @if($demand->statut === 'Rejeté') active @endif">
                                                            Rejeté
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>


                                            <form action="{{ route('admin.calcul-notes.destroy', $demand->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-alt-danger"
                                                    aria-label="Supprimer la demande">
                                                    <i class="fa fa-trash-alt"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection