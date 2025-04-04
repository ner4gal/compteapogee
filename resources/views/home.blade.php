@extends('layouts.app')

@section('title', 'Accueil - Portail des Demandes Administratives')

@section('content')
  <!-- Page Content -->
  <div class="bg-body-extra-light">
    <div class="content content-full">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
      <li class="breadcrumb-item">
        <a href="javascript:void(0)">Home</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
    <!-- END Breadcrumb -->

    <!-- Quick Menu -->
    <div class="row">
      <div class="col-19 col-md-6 col-xl-6">
      <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('home') }}">
        <div class="block-content">
        <p class="my-2">
          <i class="fa fa-compass fa-2x text-muted"></i>
        </p>
        <p class="fw-semibold">Home</p>
        </div>
      </a>
      </div>
      <div class="col-12 col-md-6 col-xl-6">
      <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('Demands') }}">
        <div class="block-content">
        <p class="my-2">
          <i class="fa fa-file-word fa-2x text-muted"></i>
        </p>
        <p class="fw-semibold">Les Demandes Administratives</p>
        </div>
      </a>
      </div>
    </div>
    <!-- END Quick Menu -->
    <div class="row">
      @if($apogeeUser)
      <div class="col-12">
      <div class="block block-rounded block-bordered p-3">
      <h4 class="mb-3 text-center">Vos Informations APOGEE</h4>
      <table class="table table-striped table-bordered">
      <tbody>
        <tr>
        <th>Etablissement</th>
        <td>{{ $apogeeUser->etablissement }}</td>
        </tr>
        <tr>
        <th>Nom et Prénom</th>
        <td>{{ $apogeeUser->nom_prenom }}</td>
        </tr>
        <tr>
        <th>Email</th>
        <td>{{ $apogeeUser->email }}</td>
        </tr>
        <tr>
        <th>Fonction</th>
        <td>{{ $apogeeUser->fonction }}</td>
        </tr>
        <tr>
        <th>Téléphone</th>
        <td>{{ $apogeeUser->telephone }}</td>
        </tr>
        <tr>
        <th>Nom d’utilisateur APOGEE</th>
        <td>{{ $apogeeUser->nom_utilisateur_apogee }}</td>
        </tr>
        <tr>
        <th>Adresse MAC</th>
        <td>{{ $apogeeUser->mac_address }}</td>
        </tr>
        <tr>
        <th>Centre de Gestion</th>
        <td>
        @foreach($apogeeUser->centre_gestion ?? [] as $item)
      <span class="badge bg-info text-dark me-1">{{ $item }}</span>
    @endforeach
        </td>
        </tr>
        <tr>
        <th>Centre Traitement</th>
        <td>
        @foreach($apogeeUser->centre_traitement ?? [] as $item)
      <span class="badge bg-warning text-dark me-1">{{ $item }}</span>
    @endforeach
        </td>
        </tr>
        <tr>
        <th>Centre d'inscription pédagogique</th>
        <td>
        @foreach($apogeeUser->centre_inscription_pedagogique ?? [] as $item)
      <span class="badge bg-success text-white me-1">{{ $item }}</span>
    @endforeach
        </td>
        </tr>
        <tr>
        <th>Centre d'incompatibilité</th>
        <td>
        @foreach($apogeeUser->centre_incompatibilite ?? [] as $item)
      <span class="badge bg-danger text-white me-1">{{ $item }}</span>
    @endforeach
        </td>
        </tr>
        <tr>
        <th>Privilèges APOGEE</th>
        <td>
        @foreach($apogeeUser->privileges_apogee ?? [] as $item)
      <span class="badge bg-primary text-white me-1">{{ $item }}</span>
    @endforeach
        </td>
        </tr>
        <tr>
        <th>Responsable APOGÉE</th>
        <td>
        @foreach($apogeeUser->responsable_apogee_access ?? [] as $access)
      @if($access === 'T')
      <span class="badge bg-success me-1">T</span>
    @elseif($access === 'A')
      <span class="badge bg-primary me-1">A</span>
    @endif
    @endforeach
        </td>
        </tr>
        <tr>
        <th>Date de création</th>
        <td>{{ $apogeeUser->created_at }}</td>
        </tr>
      </tbody>
      </table>
      <div class="d-flex justify-content-between">
      <a href="{{ route('apogee-user.pdf') }}" class="btn btn-outline-danger" target="_blank">
        <i class="fa fa-file-pdf me-1"></i> Télécharger en PDF
      </a>
      <a href="" class="btn btn-outline-primary">
        <i class="fa fa-edit me-1"></i> Modifier mon profil
      </a>
      </div>
      </div>
      </div>
    @else
      <div class="alert alert-warning text-center">
      Vos informations APOGEE ne sont pas encore enregistrées.
      <br>
      Cliquez sur le bouton ci-dessous pour compléter votre profil.
      <br>
      <a class="btn btn-primary mt-3" href="{{ route('Profile') }}">
      Compléter mon profil
      </a>
      </div>
    @endif
    </div>


    <!-- Quick Stats -->
    <div class="row">
      <div class="block block-rounded">
      <div class="block-content">
        
        
      <h4 class="mb-3 text-center">Vos dernières demandes</h4>
       
      <!-- Contextual Table -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
        <h3 class="block-title">Inscription administrative</h3>
        </div>
        <div class="block-content">
        <table  class="table table-vcenter">
          <thead>
          <tr>
            <th></th>
            <th>Filière</th>
            <th>Date</th>
          </tr>
          </thead>
          <tbody>
          @foreach($demandes as $d)
            <tr >
            <td class="fw-semibold" >{{ $d->nom_demande }}</td>
            <td>{{ $d->filiere }}</td>
            <td scope="row" >{{ $d->date_demande->format('d/m/Y') }}</td>
            </tr>
           @endforeach
          </tbody>
        </table>
        </div>
      </div>
      <div class="block block-rounded">
        <div class="block-header block-header-default">
        <h3 class="block-title">Résultat étudiant</h3>
        </div>
        <div class="block-content">
        <table  class="table table-vcenter">
          <thead>
          <tr>
          <th></th>
          <th>Etudiant</th>
          <th>Date</th>
          </tr>
          </thead>
          <tbody>
          @foreach($demandesResultatEtudiant as $d)
        <tr>
        <td>{{ $d->nom_demande }}</td>
        <td>{{ $d->NomPrenom }}</td>
        <td>{{ $d->date_demande->format('d/m/Y') }}</td>
        </tr>
      @endforeach
          </tbody>
        </table>
        </div>
      </div>
      <div class="block block-rounded">
        <div class="block-header block-header-default">
        <h3 class="block-title">Résultat par module</h3>
        </div>
        <div class="block-content">
        <table  class="table table-vcenter">
          <thead>
          <tr>
          <th></th>
          <th>Module</th>
          <th>Date</th>
          </tr>
          </thead>
          <tbody>
          @foreach($demandesReultatModul as $d)
        <tr>
        <td>{{ $d->nom_demande }}</td>
        <td>{{ $d->module_nom }}</td>
        <td>{{ $d->date_demande->format('d/m/Y') }}</td>
        </tr>
      @endforeach
          </tbody>
        </table>
        </div>
      </div>
      <div class="block block-rounded">
        <div class="block-header block-header-default">
        <h3 class="block-title">Calcule des notes</h3>
        </div>
        <div class="block-content">
        <table  class="table table-vcenter">
          <thead>
          <tr>
          <th></th>
          <th>Etudiant</th>
          <th>Date</th>

          </tr>
          </thead>
          <tbody>
          @foreach($demandescalcul as $d)
        <tr>
        <td>{{ $d->nom_demande }}</td>
        <td>{{ $d->NomPrenomETD }}</td>
        <td>{{ $d->date_demande->format('d/m/Y') }}</td>
        </tr>
      @endforeach
          </tbody>
        </table>
        </div>
      </div>
      <div class="block block-rounded">
        <div class="block-header block-header-default">
        <h3 class="block-title">Inscription administrative Doc</h3>
        </div>
        <div class="block-content">
        <table  class="table table-vcenter">
          <thead>
          <tr>
          <th></th>
          <th>DOCTORANT</th>
          <th>Date</th>

          </tr>
          </thead>
          <tbody>
          @foreach($demandeInscDoc as $d)
        <tr>
        <td>{{ $d->nom_demande }}</td>
        <td>{{ $d->nomPrenom}}</td>
        <td>{{ $d->dateDM->format('d/m/Y') }}</td>
        </tr>
      @endforeach
          </tbody>
        </table>
        </div>
      </div>
      <!-- END Contextual Table -->
      </div>
      <!-- END Quick Stats -->

    </div>
    </div>
    <!-- END Page Content -->
  @endsection