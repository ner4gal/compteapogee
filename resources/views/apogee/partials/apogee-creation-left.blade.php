<div class="mb-4">
  <label class="form-label" for="etbl">Établissement</label>
  <select class="form-select" name="etbl" required>
    @include('apogee.partials.options-etablissement', [
        'selectedEtablissement' => old('etbl', $apogeeUser->etablissement ?? '')
    ])
  </select>
</div>

<div class="mb-4">
  <label class="form-label">Date de la demande</label>
  <input type="date" name="dateDM" class="form-control"
         value="{{ old('dateDM', \Carbon\Carbon::parse($apogeeUser->created_at ?? now())->format('Y-m-d')) }}" required>
</div>

<div class="mb-4">
  <label class="form-label">Nom et Prénom du demandeur</label>
  <input type="text" name="nomPrenomUser" class="form-control"
         value="{{ old('nomPrenomUser', $apogeeUser->nom_prenom ?? auth()->user()->name) }}" required>
</div>

<div class="mb-4">
  <label class="form-label">Nom d'utilisateur APOGÉE</label>
  <input type="text" name="userName" class="form-control"
         value="{{ old('userName', $apogeeUser->nom_utilisateur_apogee ?? '') }}" required>
</div>

<div class="mb-4">
  <label class="form-label">Fonction</label>
  <input type="text" name="fonction" class="form-control"
         value="{{ old('fonction', $apogeeUser->fonction ?? '') }}" required>
</div>

<div class="mb-4">
  <label class="form-label">Téléphone</label>
  <input type="text" name="tele" class="form-control"
         value="{{ old('tele', $apogeeUser->telephone ?? '') }}" required>
</div>

<div class="mb-4">
  <label class="form-label">Adresse MAC de l'ordinateur</label>
  <input type="text" name="mac" class="form-control"
         value="{{ old('mac', $apogeeUser->mac_address ?? '') }}" required>
</div>
