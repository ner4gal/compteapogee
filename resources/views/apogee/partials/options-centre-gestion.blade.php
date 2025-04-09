@php
  $centres = [
    'GLA' => 'Cent Gestion Lic fac Langue, litt,art / GLA',
    'FCC' => 'Centre Gestion FC ENCG / FCC',
    'MGA' => 'Centre Gestion Master F Lang Lettre Arts / MGA',
    'MGL' => 'Centre Gestion Master F Sc Hum Sociale / MGL',
    'CGC' => 'Centre Géstion ENCG / CGC',
    'CGA' => 'Centre de Gestion ENSA Kenitra / CGA',
    'GST' => 'Centre de Gestion EST Kenitra / GST',
    'ECG' => 'Centre de Gestion Ecole Nat Sup Chimie K / ECG',
    'CFC' => 'Centre de Gestion formation Continu F.Sc / CFC',
    'MGJ' => 'Centre de GestionMaster F Sc JuridiquesP / MGJ',
    'CGK' => 'Centre de Géstion Central de Kénitra / CGK',
    'CDD' => 'Centre de gestion CED Droit, Eco Gestion / CDD',
    'CDS' => 'Centre de gestion CED Science / CDS',
    'CGE' => 'Centre de gestion Ecole Sup Edu Form Ken / CGE',
    'CDN' => 'Centre de gestion doctorat ENCG / CDN',
    'CDF' => 'Centre de gestion doctorat ESEF / CDF',
    'CDA' => 'Centre de gestion doctorat LANG / CDA',
    'CGL' => 'Centre de géstion Fac. Sc Hum Sociales / CGL',
    'MGD' => 'Centre de géstion Mast F.Sc.Eco.Ges / MGD',
    'CGS' => 'Centre de géstion de la fac des Sciences / CGS',
    'CMS' => 'Centre de géstion des Métiers de Sport / CMS',
    'CGD' => 'Centre de géstion fac.Sc.Eco.Ges / CGD',
    'CGJ' => 'Centre gestion FacSc Juridique Politique / CGJ',
    'CDE' => 'Centre étude doctorale ENSA / CDE',
    'CDL' => 'Centre de gestion CED Lettres et sc.Huma / CDL',
  ];
@endphp

@foreach($centres as $code => $label)
  <option value="{{ $code }}" {{ in_array($code, $selected ?? []) ? 'selected' : '' }}>
    {{ $label }}
  </option>
@endforeach
