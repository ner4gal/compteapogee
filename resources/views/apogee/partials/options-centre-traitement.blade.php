@php
  $centresTraitement = [
    'CTL' => 'CT ScHumS / CTL',
    'CTK' => 'CT DOC ENCG / CTK',
    'CTG' => 'CTGéstion / CTG',
    'NDD' => 'CTN Doc FD / NDD',
    'NDL' => 'CTN Doc Lt / NDL',
    'NDS' => 'CTN Doc Sc / NDS',
    'TDE' => 'CTN DocESE / TDE',
    'TDL' => 'CTN DocLan / TDL',
    'NDR' => 'CTN Droit / NDR',
    'NSE' => 'CTN ESEFK / NSE',
    'NST' => 'CTN EST K / NST',
    'NFC' => 'CTN FC ENC / NFC',
    'NFS' => 'CTN FC Sci / NFS',
    'TSP' => 'CTN IMSpor / TSP',
    'CTH' => 'CTN Lang / CTH',
    'TLA' => 'CTN LicLan / TLA',
    'NMH' => 'CTN M Lang / NMH',
    'NML' => 'CTN M Lett / NML',
    'MDR' => 'CTN MS Dro / MDR',
    'MTD' => 'CTN Mas FD / MTD',
    'TMA' => 'CTN MasLan / TMA',
    'CTN' => 'CTN Univ / CTN',
    'CTC' => 'CTN_ENCG / CTC',
    'CTA' => 'CTN_ENSA / CTA',
    'CEC' => 'CTN_ENSC / CEC',
    'CTS' => 'CTSciences / CTS',
    'CTE' => 'CT_NSA_DOC / CTE',
  ];
@endphp

@foreach($centresTraitement as $code => $label)
  <option value="{{ $code }}" {{ in_array($code, $selected ?? []) ? 'selected' : '' }}>
    {{ $label }}
  </option>
@endforeach
