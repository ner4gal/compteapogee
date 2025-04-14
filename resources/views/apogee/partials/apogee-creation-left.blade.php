@php
  $etablissements = [
    'FLLA' => "Faculté des Langues des Lettres et des Arts",
    'FSHS' => "Faculté des Sciences Humaines et Sociales",
    'FS' => "Faculté des Sciences",
    'FEG' => "Faculté d'Economie et de Gestion",
    'FSJP' => "Faculté des Sciences Juridiques et Politiques",
    'ENCG' => "Ecole Nationale de Commerce et de Gestion",
    'ENSA' => "Ecole Nationale des Sciences Appliquées",
    'EST' => "Ecole Supérieure de Technologie",
    'ENSC' => "Ecole Nationale Supérieure de Chimie",
    'ESEF' => "Ecole Supérieure de l'Education et de la Formation ",
    'IMS' => "Institut des Métiers de Sport",
    'PRES' => "Présidence de l'Université Ibn Tofail",
  ];
@endphp

<!-- Établissement -->
<div class="mb-4">
  <label class="form-label" for="etbl">Établissement</label>
  <select class="form-select" name="etbl" id="etbl" required>
    @foreach($etablissements as $code => $etab)
      <option value="{{ $etab }}" {{ old('etbl', $apogeeUser->etablissement ?? '') === $etab ? 'selected' : '' }}>
        {{ $etab }}
      </option>
    @endforeach
  </select>
</div>

<!-- Composantes -->
<div class="mb-4" id="composanteContainer" hidden>
  <label class="form-label" for="composante">Les Composantes</label>
  <select class="form-select selectcls" name="composante[]" id="composante" multiple style="width: 100%">
    @foreach($etablissements as $code => $etab)
      @if($code !== 'PRES')
        <option value="{{ $code }}" {{ in_array($code, old('composante', [])) ? 'selected' : '' }}>
          {{ $etab }}
        </option>
      @endif
    @endforeach
  </select>
</div>




<!-- Date -->
<div class="mb-4">
  <label class="form-label">Date de la demande</label>
  <input type="date" name="dateDM" class="form-control"
         value="{{ old('dateDM', \Carbon\Carbon::parse($apogeeUser->created_at ?? now())->format('Y-m-d')) }}" required>
</div>

<!-- Nom & Prénom -->
<div class="mb-4">
  <label class="form-label">Nom et Prénom du demandeur</label>
  <input type="text" name="nomPrenomUser" class="form-control"
         value="{{ old('nomPrenomUser', $apogeeUser->nom_prenom ?? auth()->user()->name) }}" required>
</div>

<!-- Nom utilisateur Apogée -->
<div class="mb-4">
  <label class="form-label">Nom d'utilisateur APOGÉE</label>
  <input type="text" name="userName" class="form-control"
         value="{{ old('userName', $apogeeUser->nom_utilisateur_apogee ?? '') }}" required>
</div>

<!-- Fonction -->
<div class="mb-4">
  <label class="form-label">Fonction</label>
  <input type="text" name="fonction" class="form-control"
         value="{{ old('fonction', $apogeeUser->fonction ?? '') }}" required>
</div>

<!-- Téléphone -->
<div class="mb-4">
  <label class="form-label">Téléphone</label>
  <input type="text" name="tele" class="form-control"
         value="{{ old('tele', $apogeeUser->telephone ?? '') }}" required>
</div>

<!-- MAC Address -->
<div class="mb-4">
  <label class="form-label">Adresse MAC de l'ordinateur</label>
  <input type="text" name="mac" class="form-control"
         value="{{ old('mac', $apogeeUser->mac_address ?? '') }}" required>
</div>

<!-- JS for toggling composante -->
<!-- jQuery and Select2 -->


<script>
  function toggleComposante() {
    const etbl = document.getElementById('etbl').value.trim();
    const container = document.getElementById('composanteContainer');

    if (etbl === "Présidence de l'Université Ibn Tofail") {
      container.removeAttribute('hidden');
    } else {
      container.setAttribute('hidden', true);
      $('#composante').val(null).trigger('change'); // clear if not PRES
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    $('#composante').select2({
      placeholder: "Sélectionnez les composantes",
      allowClear: true,
      width: '100%'
    });

    toggleComposante(); // show if PRES was preselected
    document.getElementById('etbl').addEventListener('change', toggleComposante);
  });
</script>

<style>
/* Selected items in the box */
.select2-selection__choice {
    background-color: #0d6efd; /* Bootstrap Primary */
    border: none;
    color: white;
    font-weight: 500;
    padding: 4px 10px;
    border-radius: 0.375rem;
}

/* Hover effect for remove (X) */
.select2-selection__choice__remove {
    color: #ffffff;
    margin-right: 8px;
}
.select2-selection__choice__remove:hover {
    color: #ffdddd;
}

/* Dropdown style */
.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #0d6efd;
    color: white;
}
/* Selected tag style */
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #0d6efd !important; /* Bootstrap Primary Blue */
    border: none !important;
    color: white !important;
    font-weight: 500;
    padding: 4px 10px;
    border-radius: 0.375rem;
    margin-top: 4px;
}

/* Remove (x) button inside tags */
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: #ffffff !important;
    margin-right: 8px;
    font-weight: bold;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
    color: #ffcccc !important;
}

/* When item is hovered in the dropdown */
.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #0d6efd !important;
    color: white !important;
}
</style>
