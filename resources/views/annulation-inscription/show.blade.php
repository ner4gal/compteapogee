@extends('layouts.app')

@section('title', "Détails de l'annulation d'inscription")

@section('content')
<div class="bg-body-extra-light">
  <div class="content content-full">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
        <li class="breadcrumb-item">
          <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('Demands') }}">Demandes</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Détails de l'annulation</li>
      </ol>
    </nav>
    <!-- END Breadcrumb -->

    <h2 class="text-center mb-4">Détails de l'annulation d'inscription</h2>

    <div class="block block-rounded">
      <div class="block-content">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <th>Nom de la demande</th>
              <td>{{ $demand->nom_demande }}</td>
            </tr>
            <tr>
              <th>Filière</th>
              <td>{{ $demand->filiere }}</td>
            </tr>
            <tr>
              <th>Date de la demande</th>
              <td>{{ $demand->date_demande->format('d/m/Y') }}</td>
            </tr>
            <!-- You can add more fields as needed -->
          </tbody>
        </table>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex justify-content-center mt-4">
      <a href="" class="btn btn-primary me-2" title="Modifier la demande">
        <i class="fa fa-edit me-1"></i> Modifier et télécharger à nouveau
      </a>
      <a href="" class="btn btn-success" title="Télécharger le PDF">
        <i class="fa fa-download me-1"></i> Télécharger le PDF
      </a>
    </div>
  </div>
</div>
@endsection
