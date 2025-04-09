<label class="form-label mb-2">Privilèges du Compte Utilisateur d'APOGÉE par domaine</label>
<div class="row">
  @php
    $privileges = $apogeeUser->privileges_apogee ?? [];
  @endphp

  <div class="col-md-4">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="p1" value="✅" id="privilege1"
             {{ old('p1') || in_array('Inscription Administrative', $privileges) ? 'checked' : '' }}>
      <label class="form-check-label" for="privilege1">Inscription Administrative</label>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="p2" value="✅" id="privilege2"
             {{ old('p2') || in_array('Inscription Pédagogique', $privileges) ? 'checked' : '' }}>
      <label class="form-check-label" for="privilege2">Inscription Pédagogique</label>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="p3" value="✅" id="privilege3"
             {{ old('p3') || in_array('Résultat', $privileges) ? 'checked' : '' }}>
      <label class="form-check-label" for="privilege3">Résultat</label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="p4" value="✅" id="privilege4"
             {{ old('p4') || in_array('Structure des enseignements', $privileges) ? 'checked' : '' }}>
      <label class="form-check-label" for="privilege4">Structure des enseignements</label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="p5" value="✅" id="privilege5"
             {{ old('p5') || in_array('Dossier Étudiant', $privileges) ? 'checked' : '' }}>
      <label class="form-check-label" for="privilege5">Dossier Étudiant</label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="p6" value="✅" id="privilege6"
             {{ old('p6') || in_array('Modalités de contrôle des connaissances', $privileges) ? 'checked' : '' }}>
      <label class="form-check-label" for="privilege6">Modalités de contrôle des connaissances</label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="p7" value="✅" id="privilege7"
             {{ old('p7') || in_array('Épreuves', $privileges) ? 'checked' : '' }}>
      <label class="form-check-label" for="privilege7">Épreuves</label>
    </div>
  </div>
</div>
