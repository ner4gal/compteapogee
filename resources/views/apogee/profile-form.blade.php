@extends('layouts.app')

@section('title', 'Profil APOGÉE')

@section('content')
<div class="bg-body-extra-light">
  <div class="content content-full">
    <div class="row">
      <div class="col-12">
        <div class="block block-bordered block-rounded">
          <div class="block-header block-header-default">
            <h3 class="block-title">Votre Profil APOGÉE</h3>
          </div>
          <form action="{{ route('apogee-user.store') }}" method="POST">
            @csrf
            <div class="block-content">
              <div class="row">
                <div class="col-md-6">
                  @include('apogee.partials.apogee-left-form')
                </div>
                <div class="col-md-6">
                  @include('apogee.partials.apogee-right-form')
                </div>
              </div>

              <hr class="my-4">
              <div class="row">
                <div class="col-md-12">
                  @include('apogee.partials.apogee-privileges')
                </div>
              </div>

              <hr class="my-4">
              <div class="mb-4">
                <label class="form-label">Accès aux fonctionnalités réservées au responsable APOGÉE (Ouverture et Fermeture de la session)</label>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="responsable_apogee_access[]" value="T">
                  <label class="form-check-label">T</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="responsable_apogee_access[]" value="A">
                  <label class="form-check-label">A</label>
                </div>
              </div>

              <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-check me-1"></i> Enregistrer le profil APOGÉE
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
