@extends('layouts.app')

@section('title', 'Accueil - Portail des Demandes Administratives')

@section('content')
  @if($apogeeUser ?? false)
    <div class="bg-body-extra-light">
      <div class="content content-full">
        <div class="row">
          <div class="alert alert-info fs-5 text-center">
            <div class="alert alert-info">
              <p>Vous avez déjà soumis votre demande d'accès APOGÉE. Merci de patienter pour la prise en compte de votre demande.</p>
              <p>
                <strong>Statut actuel:</strong>
                <span class="badge 
                  @if($apogeeUser->acces_apogee_statut === 'Accès accordé') bg-success
                  @elseif($apogeeUser->acces_apogee_statut === 'Accès refusé') bg-danger
                  @else bg-warning text-dark @endif">
                  {{ $apogeeUser->acces_apogee_statut }}
                </span>
              </p>
              @if($apogeeUser->acces_apogee_statut === 'Accès refusé')
                <p class="mt-2 text-muted">Contactez l'administration pour plus d'informations.</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  @else
    <div class="bg-body-extra-light">
      <div class="content content-full">
        <div class="row">
          <div class="alert alert-info fs-5 text-center">
            <p class="mb-2">
              🎓 <strong>Bienvenue sur le Portail APOGEE !</strong>
            </p>
            <p>Merci de choisir votre situation pour continuer :</p>
          </div>
        </div>

        {{-- Navigation Buttons --}}
        <div class="row my-4 justify-content-center">
          <div class="col-md-6 d-flex justify-content-around">
            <a href="{{ route('AppogetConfirme') }}" class="btn btn-outline-primary btn-lg w-100 me-2">
              <i class="fa fa-user-check me-1"></i> Vous avez déjà un compte APOGÉE
            </a>
            <a href="{{ route('CreateAppogetDemand') }}" class="btn btn-outline-success btn-lg w-100 ms-2">
              <i class="fa fa-user-plus me-1"></i> Création de compte APOGÉE
            </a>
          </div>
        </div>

      </div>
    </div>
  @endif
@endsection