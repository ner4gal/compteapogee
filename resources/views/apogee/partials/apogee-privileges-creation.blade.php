<label class="form-label mb-3 fw-bold">Privilèges du Compte Utilisateur d'APOGÉE par domaine</label>
<div class="row g-3">
  @php
    $privileges = $apogeeUser->privileges_apogee ?? [];
    $privilegeOptions = [
        'p1' => 'Inscription Administrative',
        'p2' => 'Inscription Pédagogique',
        'p3' => 'Résultat',
        'p4' => 'Structure des enseignements',
        'p5' => 'Dossier Étudiant',
        'p6' => 'Modalités de contrôle des connaissances',
        'p7' => 'Épreuves',
        'p8' => 'Théses HDR'
    ];
  @endphp

  @foreach ($privilegeOptions as $name => $label)
    <div class="col-md-6 col-lg-4">
      <div class="form-check">
        <input 
          class="form-check-input" 
          type="checkbox" 
          name="{{ $name }}" 
          value="✅" 
          id="{{ $name }}" 
          {{ old($name) || in_array($label, $privileges) ? 'checked' : '' }}>
        <label class="form-check-label" for="{{ $name }}">
          {{ $label }}
        </label>
      </div>
    </div>
  @endforeach
</div>