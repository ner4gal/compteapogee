<div class="mb-4">
  <label class="form-label">Centre de Gestion</label>
  <select class="selectcls" name="centre_gestion[]" multiple="multiple" style="width: 100%" required>
    @include('apogee.partials.options-centre-gestion', [
      'selected' => old('centre_gestion', $apogeeUser->centre_gestion ?? [])
    ])
  </select>
</div>

<div class="mb-4">
  <label class="form-label">Centre Traitement</label>
  <select class="selectcls" name="centre_traitement[]" multiple="multiple" style="width: 100%" >
    @include('apogee.partials.options-centre-traitement', [
      'selected' => old('centre_traitement', $apogeeUser->centre_traitement ?? [])
    ])
  </select>
</div>

<div class="mb-4">
  <label class="form-label">Centre d'inscription pédagogique</label>
  <select class="selectcls" name="centre_inscription_pedagogique[]" multiple="multiple" style="width: 100%" >
    @include('apogee.partials.options-centre-inscription', [
      'selected' => old('centre_inscription_pedagogique', $apogeeUser->centre_inscription_pedagogique ?? [])
    ])
  </select>
</div>

<div class="mb-4">
  <label class="form-label">Centre d'Incompatibilité</label>
  <select class="selectcls" name="centre_incompatibilite[]" multiple="multiple" style="width: 100%" >
    @include('apogee.partials.options-centre-incompatibilite', [
      'selected' => old('centre_incompatibilite', $apogeeUser->centre_incompatibilite ?? [])
    ])
  </select>
</div>

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
