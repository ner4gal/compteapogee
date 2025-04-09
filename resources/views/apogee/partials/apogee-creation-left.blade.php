<div class="mb-4">
  <label class="form-label" for="etbl">Etablissement</label>
  <select class="form-select" name="etbl">
    @include('apogee.partials.options-etablissement')
  </select>
</div>
<div class="mb-4">
  <label class="form-label">Date de la demande</label>
  <input type="date" name="dateDM" class="form-control" required>
</div>
<div class="mb-4">
  <label class="form-label">Nom et Prénom du demandeur</label>
  <input type="text" name="nomPrenomUser" class="form-control" value="{{ auth()->user()->name }}" required>

</div>
<div class="mb-4">
  <label class="form-label">Nom d'utilisateur APOGEE</label>
  <input type="text" name="userName" class="form-control" required>
</div>
<div class="mb-4">
  <label class="form-label">Fonction</label>
  <input type="text" name="fonction" class="form-control" required>
</div>
<div class="mb-4">
  <label class="form-label">Téléphone</label>
  <input type="text" name="tele" class="form-control" required>
</div>
<div class="mb-4">
  <label class="form-label">Adresse MAC de l'ordinateur</label>
  <input type="text" name="mac" class="form-control" required>
</div>
