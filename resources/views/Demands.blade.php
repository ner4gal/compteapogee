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
        <a href="javascript:void(0)">Accueil / Table de bord</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Demandes</li>
      </ol>
    </nav>
    <!-- END Breadcrumb -->

    <!-- Quick Menu -->
    <div class="row g-4 mb-4">
      <div class="col-12 col-md-6 col-xl-6">
      <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('home') }}">
        <div class="block-content">
        <p class="my-2">
          <i class="fa fa-compass fa-2x text-muted"></i>
        </p>
        <p class="fw-semibold">Accueil / Table de bord</p>
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
    <h2 class="text-center mb-4">le Portail des Demandes Administratives</h2>
    <p class="text-center">Choisissez une demande parmi les options ci-dessous :</p>



    <!-- Quick Stats -->
    <h2 class="content-heading">
      <i class="fa fa-angle-right text-muted me-1"></i> Licence / Master
    </h2>
    <div class="row g-4 demands-grid">

      <div class="col-md-6 col-xl-6">
      <a class="block block-rounded block-bordered" href="{{ route('insertion.module.form') }}">
        <div class="block-content p-2 h-100">
        <div class="py-5 px-3 text-center bg-body-light rounded h-100 demand-card">
          <p class="my-2">
          <i class="fa fa-tasks fa-2x text-muted"></i>
          </p>
          <div class="fs-sm fw-semibold text-uppercase">Résultat Par Module</div>
          <p class="mt-3 text-muted fs-sm">
          <strong>NB :</strong> Cette demande concerne uniquement <strong>un seul module</strong> pour une liste
          ou plusieurs étudiants. Vous devez saisir leurs résultats pour ce module spécifique.
          </p>
        </div>
        </div>

      </a>
      </div>
      <div class="col-md-6 col-xl-6">
      <a class="block block-rounded block-bordered" href="{{route('insertion.resultat.etudiant')}}">
        <div class="block-content p-2 h-100">
        <div class="py-5 px-3 text-center bg-body-light rounded h-100 demand-card">
          <p class="my-2">
          <i class="fa fa-file-alt fa-2x text-muted"></i>
          </p>
          <div class="fs-sm fw-semibold text-uppercase">Résultat Étudiant</div>
          <p class="mt-3 text-muted fs-sm">
          <strong>NB :</strong> Cette demande concerne un <strong>étudiant unique</strong> pour saisir ou corriger
          ses résultats sur <strong>un ou plusieurs modules</strong>.
          </p>
        </div>
        </div>
      </a>
      </div>
      <div class="col-md-6 col-xl-6">
      <a class="block block-rounded block-bordered" href="{{ route('calcul.notes.show') }}">
        <div class="block-content p-2 h-100">
        <div class="py-5 px-3 text-center bg-body-light rounded h-100 demand-card">
          <p class="my-2">
          <i class="fa fa-calculator fa-2x text-muted"></i>
          </p>
          <div class="fs-sm fw-semibold text-uppercase">Calcul des Notes</div>
        </div>
        </div>
      </a>
      </div>
      <div class="col-md-6 col-xl-6">
      <a class="block block-rounded block-bordered" href="{{ route('inscription-annee-anterieure') }}">
        <div class="block-content p-2 h-100">
        <div class="py-5 px-3 text-center bg-body-light rounded h-100 demand-card">
          <p class="my-2">
          <i class="fa fa-user-plus fa-2x text-muted"></i>
          </p>
          <div class="fs-sm fw-semibold text-uppercase">Inscription Administrative</div>
        </div>
        </div>
      </a>
      </div>
      <div class="col-md-6 col-xl-6">
      <a class="block block-rounded block-bordered" href="{{ route('annulation.inscription.form') }}">
        <div class="block-content p-2 h-100">
        <div class="py-5 px-3 text-center bg-body-light rounded h-100 demand-card">
          <p class="my-2">
          <i class="fa fa-user-minus fa-2x text-muted"></i>
          </p>
          <div class="fs-sm fw-semibold text-uppercase">Annulation d'Inscription</div>
        </div>
        </div>
      </a>
      </div>
      <div class="col-md-6 col-xl-6">
      <a class="block block-rounded block-bordered" href="{{ route('suppression.note.etudiant.form') }}">
        <div class="block-content p-2 h-100">
        <div class="py-5 px-3 text-center bg-body-light rounded h-100 demand-card">
          <p class="my-2">
          <i class="fa fa-calculator fa-2x text-muted"></i>
          </p>
          <div class="fs-sm fw-semibold text-uppercase">suppression des notes</div>
        </div>
        </div>
      </a>
      </div>
      <div class="col-md-6 col-xl-6">
      <a class="block block-rounded block-bordered" href="{{ route('verrouillage.compte.apogee.form') }}">
        <div class="block-content p-2 h-100">
        <div class="py-5 px-3 text-center bg-body-light rounded h-100 demand-card">
          <p class="my-2">
          <i class="fa fa-lock fa-2x text-muted"></i>
          </p>
          <div class="fs-sm fw-semibold text-uppercase">Fermeture Definitive Compte APOGEE</div>
          <p class="mt-3 text-muted fs-sm">
          Demande de fermeture definitive d'un compte APOGEE avec les informations du demandeur preremplies.
          </p>
        </div>
        </div>
      </a>
      </div>

    </div>
    <!-- END Quick Stats -->
    <!-- Quick Stats -->
    <h2 class="content-heading">
      <i class="fa fa-angle-right text-muted me-1"></i> Doctorat
    </h2>
    <div class="row g-4 demands-grid">
      <div class="col-md-6 col-xl-12">
      <a class="block block-rounded block-bordered" href="{{ route('doctorat.inscription.show')  }}">
        <div class="block-content p-2 h-100">
        <div class="py-5 px-3 text-center bg-body-light rounded h-100 demand-card">
          <p class="my-2">
          <i class="fa fa-graduation-cap fa-2x text-muted"></i>
          </p>
          <div class="fs-sm fw-semibold text-uppercase">Inscription Doctorat</div>
        </div>
        </div>
      </a>
      </div>
    </div>
    <!-- END Quick Stats -->


    <!-- END People and Tickets -->
    </div>
  </div>
  <!-- END Page Content -->
  <style>
    .demands-grid .block {
      margin-bottom: 0;
      height: 100%;
    }

    .demand-card {
      display: flex;
      flex-direction: column;
      justify-content: center;
      min-height: 220px;
    }
  </style>
@endsection
