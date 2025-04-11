@php
  $etablissements = [
    "Faculté des Langues des Lettres et des Arts",
    "Faculté des Sciences Humaines et Sociales",
    "Faculté des Sciences",
    "Faculté d'Economie et de Gestion",
    "Faculté des Sciences Juridiques et Politiques",
    "Ecole Nationale de Commerce et de Gestion",
    "Ecole Nationale des Sciences Appliquées",
    "Ecole Supérieure de Technologie",
    "Ecole Nationale Supérieure de Chimie",
    "Ecole Supérieure d'Education et de Formation",
    "Institut des Métiers de Sport",
    "Présidence de l'Université Ibn Tofail ",
  ];
@endphp

@foreach($etablissements as $etab)
  <option value="{{ $etab }}" {{ (isset($selectedEtablissement) && $selectedEtablissement === $etab) ? 'selected' : '' }}>
    {{ $etab }}
  </option>
@endforeach
