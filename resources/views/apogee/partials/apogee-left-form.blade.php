<div class="mb-4">
  <label class="form-label" for="etablissement">Etablissement</label>
  <select class="form-select" id="etablissement" name="etablissement">
    <option value="Faculté des Langues des Lettres et des Arts">Faculté des Langues des Lettres et des Arts</option>
    <option value="Faculté des Sciences Humaines et Sociales">Faculté des Sciences Humaines et Sociales</option>
    <option value="Faculté des Sciences">Faculté des Sciences</option>
    <option value="Faculté d'Economie et de Gestion">Faculté d'Economie et de Gestion</option>
    <option value="Faculté des Sciences Juridiques et Politiques">Faculté des Sciences Juridiques et Politiques</option>
    <option value="Ecole Nationale de Commerce et de Gestion">Ecole Nationale de Commerce et de Gestion</option>
    <option value="Ecole Nationale des Sciences Appliquées">Ecole Nationale des Sciences Appliquées</option>
    <option value="Ecole Supérieure de Technologie">Ecole Supérieure de Technologie</option>
    <option value="Ecole Nationale Supérieure de Chimie">Ecole Nationale Supérieure de Chimie</option>
    <option value="Ecole Supérieure d'Education et de Formation">Ecole Supérieure d'Education et de Formation</option>
    <option value="Institut des Métiers de Sport">Institut des Métiers de Sport</option>
  </select>
</div>
<div class="mb-4">
  <label class="form-label">Nom et Prénom</label>
  <input type="text" class="form-control" name="nom_prenom" value="{{ auth()->user()->name }}" readonly>
</div>
<div class="mb-4">
  <label class="form-label">Email</label>
  <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" readonly>
</div>
<div class="mb-4">
  <label class="form-label">Fonction</label>
  <input type="text" class="form-control" name="fonction">
</div>
<div class="mb-4">
  <label class="form-label">Téléphone</label>
  <input type="text" class="form-control" name="telephone">
</div>
<div class="mb-4">
  <label class="form-label">Nom d’utilisateur APOGEE</label>
  <input type="text" class="form-control" name="nom_utilisateur_apogee">
</div>
<div class="mb-4">
  <label class="form-label">Adresse MAC de l'ordinateur</label>
  <input type="text" class="form-control" name="mac_address">
</div>
