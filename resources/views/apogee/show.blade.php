@extends('layouts.app')

@section('title', "Modifier la demande d'APOGEE")

@section('content')
<div class="bg-body-extra-light">
  <div class="content content-full">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('Demands') }}">Demandes</a></li>
        <li class="breadcrumb-item active">Modification APOGEE</li>
      </ol>
    </nav>

    <h2 class="text-center mb-4">Demande de modification d'un compte fonctionnel d'accès à l'applicatif d'APOGEE</h2>

    <form action="{{ route('apogee.update', $apogeeUser->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label">Etablissement</label>
        <input type="text" name="etablissement" class="form-control" value="{{ old('etablissement', $apogeeUser->etablissement) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Nom et Prénom</label>
        <input type="text" name="nom_prenom" class="form-control" value="{{ old('nom_prenom', $apogeeUser->nom_prenom) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $apogeeUser->email) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Fonction</label>
        <input type="text" name="fonction" class="form-control" value="{{ old('fonction', $apogeeUser->fonction) }}">
      </div>

      <div class="mb-3">
        <label class="form-label">Téléphone</label>
        <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $apogeeUser->telephone) }}">
      </div>

      <div class="mb-3">
        <label class="form-label">Nom d'utilisateur APOGEE</label>
        <input type="text" name="nom_utilisateur_apogee" class="form-control" value="{{ old('nom_utilisateur_apogee', $apogeeUser->nom_utilisateur_apogee) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Adresse MAC</label>
        <input type="text" name="mac_address" class="form-control" value="{{ old('mac_address', $apogeeUser->mac_address) }}">
      </div>

      <!-- Repeat for array fields using a multi-select input -->
      @php
        $selectClass = 'form-select selectcls' // for Select2 enhancement
      @endphp

      <div class="mb-3">
        <label class="form-label">Centre de Gestion</label>
        <select name="centre_gestion[]" class="{{ $selectClass }}" multiple>
          @foreach(config('apogee.centres_gestion') as $option)
            <option value="{{ $option }}" {{ in_array($option, old('centre_gestion', $apogeeUser->centre_gestion ?? [])) ? 'selected' : '' }}>{{ $option }}</option>
          @endforeach
        </select>
      </div>

      <!-- Repeat for: centre_traitement, centre_inscription_pedagogique, centre_incompatibilite, privileges_apogee, responsable_apogee_access -->

      <button type="submit" class="btn btn-primary w-100 mt-3">
        <i class="fa fa-paper-plane me-1"></i> Générer votre demande de modification
      </button>
    </form>
  </div>
</div>

<script>
$(document).ready(function () {
  $('.selectcls').select2({
    placeholder: "Sélectionnez...",
    allowClear: true,
    width: '100%'
  });
});
</script>
@endsection
