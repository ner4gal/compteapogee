<div class="mb-4">
  <label class="form-label">Centre de Gestion</label>
  <select class="selectcls" name="centre_gestion[]" multiple="multiple" style="width: 100%">
    @include('partials.options-centre-gestion')
  </select>
</div>
<div class="mb-4">
  <label class="form-label">Centre Traitement</label>
  <select class="selectcls" name="centre_traitement[]" multiple="multiple" style="width: 100%">
    @include('partials.options-centre-traitement')
  </select>
</div>
<div class="mb-4">
  <label class="form-label">Centre d'inscription pédagogique</label>
  <select class="selectcls" name="centre_inscription_pedagogique[]" multiple="multiple" style="width: 100%">
    @include('partials.options-centre-inscription')
  </select>
</div>
<div class="mb-4">
  <label class="form-label">Centre d'Incompatibilité</label>
  <select class="selectcls" name="centre_incompatibilite[]" multiple="multiple" style="width: 100%">
    @include('partials.options-centre-incompatibilite')
  </select>
</div>
