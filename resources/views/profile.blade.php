@extends('layouts.app')

@section('title', 'Accueil - Portail des Demandes Administratives')

@section('content')
  <!-- Page Content -->
  <div class="bg-body-extra-light">
    <div class="content content-full">
    <!-- Breadcrumb -->

    <!-- END Breadcrumb -->

    <!-- Quick Menu -->
    <div class="row">

    </div>
    <!-- END Quick Menu -->

    <!-- Quick Stats -->
    <div class="row">
  <div class="col-12">
    <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
      <div class="py-4 text-center">
        <div class="mb-3">
          <i class="fa fa-user fa-3x text-xpro"></i>
        </div>
        <div class="col-12 fs-sm-4 fs-5 fw-semibold">
          <span class="badge rounded-pill bg-danger d-inline-block text-wrap">
            <i class="fa fa-fw fa-times-circle"></i> 
            Bienvenue ! Merci de compléter votre compte APOGEE et de définir vos privilèges pour accéder au portail.
          </span>
        </div>
      </div>
    </a>
  </div>
</div>
    <!-- END Quick Stats -->
    <form action="{{ route('apogee-user.store') }}" method="POST">
      @csrf
      <div class="block block-bordered block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">Voter APOGEE Profile</h3>
      </div>
      <div class="block-content">
        <div class="row">
        <div class="col-md-6">
          <div class="mb-4">
          <label class="form-label" for="etablissement">Etablissement</label>
          <select class="form-select" id="etablissement" name="etablissement">
            <option value="Faculté des Langues des Lettres et des Arts">Faculté des Langues des Lettres et des
            Arts</option>
            <option value="Faculté des Sciences Humaines et Sociales">Faculté des Sciences Humaines et
            Sociales</option>
            <option value="Faculté des Sciences">Faculté des Sciences</option>
            <option value="Faculté d'Economie et de Gestion">Faculté d'Economie et de Gestion</option>
            <option value="Faculté des Sciences Juridiques et Politiques">Faculté des Sciences Juridiques et
            Politiques</option>
            <option value="Ecole Nationale de Commerce et de Gestion">Ecole Nationale de Commerce et de
            Gestion</option>
            <option value="Ecole Nationale des Sciences Appliquées">Ecole Nationale des Sciences Appliquées
            </option>
            <option value="Ecole Supérieure de Technologie">Ecole Supérieure de Technologie</option>
            <option value="Ecole Nationale Supérieure de Chimie">Ecole Nationale Supérieure de Chimie</option>
            <option value="Ecole Supérieure d'Education et de Formation">Ecole Supérieure d'Education et de
            Formation</option>
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
        </div>

        <div class="col-md-6">
          <div class="mb-4">
          <label class="form-label">Centre de Gestion</label>
          <select class="selectcls" name="centre_gestion[]" multiple="multiple" style="width: 100%">
            <option value="GLA">Cent Gestion Lic fac Langue, litt,art / GLA</option>
            <option value="FCC">Centre Gestion FC ENCG / FCC</option>
            <option value="MGA">Centre Gestion Master F Lang Lettre Arts / MGA</option>
            <option value="MGL">Centre Gestion Master F Sc Hum Sociale / MGL</option>
            <option value="CGC">Centre Géstion ENCG / CGC</option>
            <option value="CGA">Centre de Gestion ENSA Kenitra / CGA</option>
            <option value="GST">Centre de Gestion EST Kenitra / GST</option>
            <option value="ECG">Centre de Gestion Ecole Nat Sup Chimie K / ECG</option>
            <option value="CFC">Centre de Gestion formation Continu F.Sc / CFC</option>
            <option value="MGJ">Centre de GestionMaster F Sc JuridiquesP / MGJ</option>
            <option value="CGK">Centre de Géstion Central de Kénitra / CGK</option>
            <option value="CDD">Centre de gestion CED Droit, Eco Gestion / CDD</option>
            <option value="CDS">Centre de gestion CED Science / CDS</option>
            <option value="CGE">Centre de gestion Ecole Sup Edu Form Ken / CGE</option>
            <option value="CDN">Centre de gestion doctorat ENCG / CDN</option>
            <option value="CDF">Centre de gestion doctorat ESEF / CDF</option>
            <option value="CDA">Centre de gestion doctorat LANG / CDA</option>
            <option value="CGL">Centre de géstion Fac. Sc Hum Sociales / CGL</option>
            <option value="MGD">Centre de géstion Mast F.Sc.Eco.Ges / MGD</option>
            <option value="CGS">Centre de géstion de la fac des Sciences / CGS</option>
            <option value="CMS">Centre de géstion des Métiers de Sport / CMS</option>
            <option value="CGD">Centre de géstion fac.Sc.Eco.Ges / CGD</option>
            <option value="CGJ">Centre gestion FacSc Juridique Politique / CGJ</option>
            <option value="CDE">Centre étude doctorale ENSA / CDE</option>
            <option value="CDL">Centre de gestion CED Lettres et sc.Huma / CDL</option>
          </select>
          </div>
          <div class="mb-4">
          <label class="form-label">Centre Traitement</label>
          <select class="selectcls" name="centre_traitement[]" multiple="multiple" style="width: 100%">
            <option value="CTL">CT ScHumS / CTL</option>
            <option value="CTK">CT DOC ENCG / CTK</option>
            <option value="CTG">CTGéstion / CTG</option>
            <option value="NDD">CTN Doc FD / NDD</option>
            <option value="NDL">CTN Doc Lt / NDL</option>
            <option value="NDS">CTN Doc Sc / NDS</option>
            <option value="TDE">CTN DocESE / TDE</option>
            <option value="TDL">CTN DocLan / TDL</option>
            <option value="NDR">CTN Droit / NDR</option>
            <option value="NSE">CTN ESEFK / NSE</option>
            <option value="NST">CTN EST K / NST</option>
            <option value="NFC">CTN FC ENC / NFC</option>
            <option value="NFS">CTN FC Sci / NFS</option>
            <option value="TSP">CTN IMSpor / TSP</option>
            <option value="CTH">CTN Lang / CTH</option>
            <option value="TLA">CTN LicLan / TLA</option>
            <option value="NMH">CTN M Lang / NMH</option>
            <option value="NML">CTN M Lett / NML</option>
            <option value="MDR">CTN MS Dro / MDR</option>
            <option value="MTD">CTN Mas FD / MTD</option>
            <option value="TMA">CTN MasLan / TMA</option>
            <option value="CTN">CTN Univ / CTN</option>
            <option value="CTC">CTN_ENCG / CTC</option>
            <option value="CTA">CTN_ENSA / CTA</option>
            <option value="CEC">CTN_ENSC / CEC</option>
            <option value="CTS">CTSciences / CTS</option>
            <option value="CTE">CT_NSA_DOC / CTE</option>
          </select>
          </div>
          <div class="mb-4">
          <label class="form-label">Centre d'inscription pédagogique</label>
          <select class="selectcls" name="centre_inscription_pedagogique[]" multiple="multiple"
            style="width: 100%">
            <option value="MPD">Centre Inscrip pédag Mast FSJES / MPD</option>
            <option value="PMS">Centre Inscrip pédagog Mét Sport / PMS</option>
            <option value="PFC">Centre Inscript pédag ForConti ENCG / PFC</option>
            <option value="PFS">Centre Inscript pédag ForConti Fac. Scien / PFS</option>
            <option value="PLJ">Centre Inscript pédag Lic Jurd / PLJ</option>
            <option value="PLA">Centre Inscript pédag Lic fac lang art / PLA</option>
            <option value="PMA">Centre Inscript pédag Mas LLA / PMA</option>
            <option value="PML">Centre Inscript pédag Mast F SHS / PML</option>
            <option value="PMJ">Centre Inscript pédag Mast Jurd / PMJ</option>
            <option value="PDF">Centre Inscription pédagogique Droit Fra / PDF</option>
            <option value="CPC">Centre Inscription pédagogique ENCG / CPC</option>
            <option value="CPA">Centre Inscription pédagogique ENSAK / CPA</option>
            <option value="PET">Centre Inscription pédagogique EST / PET</option>
            <option value="CPL">Centre Inscription pédagogique Fac. SHS / CPL</option>
            <option value="CPD">Centre Inscription pédagogique Fac.SJE / CPD</option>
            <option value="CP">Centre Inscription pédagogique Fac. Scien / CP</option>
            <option value="CPK">Centre Inscription pédagogique Kénitra / CPK</option>
            <option value="PEC">Centre inscrip pédag Ecole Nat Sup Chimi / PEC</option>
            <option value="PEE">Centre inscrip pédag Ecole Sup Edu Form / PEE</option>
          </select>
          </div>
          <div class="mb-4">
          <label class="form-label">Centre d'Incompatibilité</label>
          <select class="selectcls" name="centre_incompatibilite[]" multiple="multiple" style="width: 100%">
            <option value="CIE_FLLA">Centre d'Incompatibilié FLLA / CIE_FLLA</option>
            <option value="CIE_ENCG">Centre d'Incompatibilié d'Epreuves ENCG / CIE_ENCG</option>
            <option value="CIE_ENSC">Centre d'Incompatibilié d'Epreuves ENSC / CIE_ENSC</option>
            <option value="CIE_ESFE">Centre d'Incompatibilié d'Epreuves ESEF / CIE_ESFE</option>
            <option value="CIE_ESTK">Centre d'Incompatibilié d'Epreuves ESTK / CIE_ESTK</option>
            <option value="CIE_SCIENC">Centre d'Incompatibilié d'Epreuves Scien / CIE_SCIENC</option>
            <option value="CIE_DROIT">Centre d'incompatibilité Fac Sciences Ju / CIE_DROIT</option>
            <option value="CIE_ENSA">Centre d'incompatibilité d'Epreuves ENSA / CIE_ENSA</option>
            <option value="CIE_ECONOM">Centre d'incompatibilité d'Epreuves Econ / CIE_ECONOM</option>
            <option value="CIE_LETTRE">Centre d'incompatibilité d'Epreuves Lett / CIE_LETTRE</option>
          </select>
          </div>
        </div>
        </div>

        <hr class="my-4">
        <div class="row">
        <div class="col-md-12">
          <label class="form-label mb-2">Privilèges du Compte Utilisateur d’APOGEE par domaine</label>
          <div class="row">
          <div class="col-md-4">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="privileges_apogee[]"
              value="Inscription Administrative">
            <label class="form-check-label">Inscription Administrative</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="privileges_apogee[]"
              value="Inscription Pédagogique">
            <label class="form-check-label">Inscription Pédagogique</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="privileges_apogee[]" value="Résultat">
            <label class="form-check-label">Résultat</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="privileges_apogee[]"
              value="Structure des enseignements">
            <label class="form-check-label">Structure des enseignements</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="privileges_apogee[]" value="Dossier Etudiant">
            <label class="form-check-label">Dossier Etudiant</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="privileges_apogee[]"
              value="Modalités de contrôle des connaissances">
            <label class="form-check-label">Modalités de contrôle des connaissances</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="privileges_apogee[]" value="Epreuves">
            <label class="form-check-label">Epreuves</label>
            </div>
          </div>
          </div>
        </div>
        </div>
        <hr class="my-4">
        <div class="mb-4">
        <label class="form-label">Accès aux fonctionnalités réservées au responsable APOGÉE (Ouverture et Fermeture
          de la session ) </label>
        <input class="form-check-input" type="checkbox" name="responsable_apogee_access[]" value="T">
        <label class="form-check-label">T</label>

        <input class="form-check-input" type="checkbox" name="responsable_apogee_access[]" value="A">
        <label class="form-check-label">A </label>
        </div>

        <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-check me-1"></i> Enregistrer le profil APOGEE
        </button>
        </div>
      </div>

      </div>
    </form>

    <!-- END People and Tickets -->
    </div>
  </div>
  <!-- END Page Content -->

  <script>
    $(document).ready(function () {
    // Initialize Select2 with any options you need
    $('.selectcls').select2({
      placeholder: "Select options",
      allowClear: true,
      width: 'resolve' // This helps with theme conflicts
    });

    // If theme JS is trying to modify selects after page load, you might need
    $(document).on('theme-js-loaded', function () { // hypothetical event
      $('.selectcls').select2('destroy').select2();
    });
    });
  </script>

@endsection