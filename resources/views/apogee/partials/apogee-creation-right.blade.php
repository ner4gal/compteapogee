<div class="mb-4">
  <label class="form-label">Centre de Gestion</label>
  <select class="selectcls" name="centre_gestion[]" multiple="multiple" style="width: 100%" required>
    @include('apogee.partials.options-centre-gestion')
  </select>
</div>
<div class="mb-4">
  <label class="form-label">Centre Traitement</label>
  <select class="selectcls" name="centre_traitement[]" multiple="multiple" style="width: 100%" required>
    @include('apogee.partials.options-centre-traitement')
  </select>
</div>
<div class="mb-4">
  <label class="form-label">Centre d'inscription pédagogique</label>
  <select class="selectcls" name="centre_inscription_pedagogique[]" multiple="multiple" style="width: 100%" required>
    @include('apogee.partials.options-centre-inscription')
  </select>
</div>
<div class="mb-4">
  <label class="form-label">Centre d'Incompatibilité</label>
  <select class="selectcls" name="centre_incompatibilite[]" multiple="multiple" style="width: 100%" required>
    @include('apogee.partials.options-centre-incompatibilite')
  </select>
</div>
<script>
  $(document).ready(function () {
  // Initialize Select2 with any options you need.
  $('.selectcls').select2({
    placeholder: "Select options",
    allowClear: true,
    width: 'resolve' // This helps with theme conflicts.
  });

  // If theme JS is trying to modify selects after page load, you might need:
  $(document).on('theme-js-loaded', function () { // hypothetical event
    $('.selectcls').select2('destroy').select2();
  });
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
