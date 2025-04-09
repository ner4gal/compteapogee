<div class="mb-4">
  <label class="form-label">Centre de Gestion</label>
  <select class="selectcls" name="centre_gestion[]" multiple="multiple" style="width: 100%">
    @include('apogee.partials.options-centre-gestion')
  </select>
</div>
<div class="mb-4">
  <label class="form-label">Centre Traitement</label>
  <select class="selectcls" name="centre_traitement[]" multiple="multiple" style="width: 100%">
    @include('apogee.partials.options-centre-traitement')
  </select>
</div>
<div class="mb-4">
  <label class="form-label">Centre d'inscription pédagogique</label>
  <select class="selectcls" name="centre_inscription_pedagogique[]" multiple="multiple" style="width: 100%">
    @include('apogee.partials.options-centre-inscription')
  </select>
</div>
<div class="mb-4">
  <label class="form-label">Centre d'Incompatibilité</label>
  <select class="selectcls" name="centre_incompatibilite[]" multiple="multiple" style="width: 100%">
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