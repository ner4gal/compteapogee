@php
  $centresIncompatibilite = [
    'CIE_FLLA' => "Centre d'Incompatibilié FLLA / CIE_FLLA",
    'CIE_ENCG' => "Centre d'Incompatibilié d'Epreuves ENCG / CIE_ENCG",
    'CIE_ENSC' => "Centre d'Incompatibilié d'Epreuves ENSC / CIE_ENSC",
    'CIE_ESFE' => "Centre d'Incompatibilié d'Epreuves ESEF / CIE_ESFE",
    'CIE_ESTK' => "Centre d'Incompatibilié d'Epreuves ESTK / CIE_ESTK",
    'CIE_SCIENC' => "Centre d'Incompatibilié d'Epreuves Scien / CIE_SCIENC",
    'CIE_DROIT' => "Centre d'incompatibilité Fac Sciences Ju / CIE_DROIT",
    'CIE_ENSA' => "Centre d'incompatibilité d'Epreuves ENSA / CIE_ENSA",
    'CIE_ECONOM' => "Centre d'incompatibilité d'Epreuves Econ / CIE_ECONOM",
    'CIE_LETTRE' => "Centre d'incompatibilité d'Epreuves Lett / CIE_LETTRE",
  ];
@endphp

@foreach($centresIncompatibilite as $code => $label)
  <option value="{{ $code }}" {{ in_array($code, $selected ?? []) ? 'selected' : '' }}>
    {{ $label }}
  </option>
@endforeach
