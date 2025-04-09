@extends('layouts.app')

@section('title', 'Demande de Création APOGÉE')

@section('content')
<div class="bg-body-extra-light">
  <div class="content content-full">
    <div class="row">
      <div class="col-12">
        <div class="block block-bordered block-rounded">
          <div class="block-header block-header-default">
            <h3 class="block-title">Demande d'ouverture d'un compte APOGÉE</h3>
          </div>
          <form id="pdfForm" action="{{ route('generate.doc') }}" method="POST" onsubmit="showLoading()">
            @csrf
            <div class="block-content">
              <div class="row">
                <div class="col-md-6">
                  @include('apogee.partials.apogee-creation-left')
                </div>
                <div class="col-md-6">
                  @include('apogee.partials.apogee-creation-right')
                </div>
              </div>

              <hr class="my-4">
              <div class="row">
                <div class="col-md-12">
                  @include('apogee.partials.apogee-privileges-creation')
                </div>
              </div>

              <hr class="my-4">
              <div class="mb-4">
                <label class="form-label">Accès aux fonctionnalités réservées au responsable APOGÉE (Ouverture et Fermeture de la session)</label>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="p8" value="✅" id="accessT">
                  <label class="form-check-label" for="accessT">T</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="p9" value="✅" id="accessA">
                  <label class="form-check-label" for="accessA">A</label>
                </div>
              </div>

              <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-file-pdf me-1"></i> Générer le PDF
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
