@php
  $centresInscription = [
    'MPD' => 'Centre Inscrip pédag Mast FSJES / MPD',
    'PMS' => 'Centre Inscrip pédagog Mét Sport / PMS',
    'PFC' => 'Centre Inscript pédag ForConti ENCG / PFC',
    'PFS' => 'Centre Inscript pédag ForConti Fac. Scien / PFS',
    'PLJ' => 'Centre Inscript pédag Lic Jurd / PLJ',
    'PLA' => 'Centre Inscript pédag Lic fac lang art / PLA',
    'PMA' => 'Centre Inscript pédag Mas LLA / PMA',
    'PML' => 'Centre Inscript pédag Mast F SHS / PML',
    'PMJ' => 'Centre Inscript pédag Mast Jurd / PMJ',
    'PDF' => 'Centre Inscription pédagogique Droit Fra / PDF',
    'CPC' => 'Centre Inscription pédagogique ENCG / CPC',
    'CPA' => 'Centre Inscription pédagogique ENSAK / CPA',
    'PET' => 'Centre Inscription pédagogique EST / PET',
    'CPL' => 'Centre Inscription pédagogique Fac. SHS / CPL',
    'CPD' => 'Centre Inscription pédagogique Fac.SJE / CPD',
    'CP' => 'Centre Inscription pédagogique Fac. Scien / CP',
    'CPK' => 'Centre Inscription pédagogique Kénitra / CPK',
    'PEC' => 'Centre inscrip pédag Ecole Nat Sup Chimi / PEC',
    'PEE' => 'Centre inscrip pédag Ecole Sup Edu Form / PEE',
  ];
@endphp

@foreach($centresInscription as $code => $label)
  <option value="{{ $code }}" {{ in_array($code, $selected ?? []) ? 'selected' : '' }}>
    {{ $label }}
  </option>
@endforeach
