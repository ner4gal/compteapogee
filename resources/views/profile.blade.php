@extends('layouts.app')

@section('title', 'Accueil - Portail des Demandes Administratives')

@section('content')
    {{-- Check if the user has already submitted the form --}}
  @if($apogeeUser ?? false)
    {{-- Only display the alert if the user has already sent a demand --}}
    <div class="bg-body-extra-light">
    <div class="content content-full">
    <div class="row">
    <div class="alert alert-info fs-5 text-center">
    <div class="alert alert-info">
      <p>
        Vous avez déjà soumis votre demande d'accès APOGÉE. Merci de patienter pour la prise en compte de votre demande.
      </p>
      {{-- You can also show the current status if available --}}
      <p>
        <strong>Statut actuel:</strong>
        <span class="badge 
          @if($apogeeUser->acces_apogee_statut === 'Accès accordé') bg-success
          @elseif($apogeeUser->acces_apogee_statut === 'Accès refusé') bg-danger
          @else bg-warning text-dark @endif">
          {{ $apogeeUser->acces_apogee_statut }}
        </span>
      </p>
      @if($apogeeUser->acces_apogee_statut === 'Accès refusé')
        <p class="mt-2 text-muted">
          Contactez l'administration pour plus d'informations.
        </p>
      @endif
    </div>
    </div>
    </div>
    </div>
    </div>
  @else
    {{-- Otherwise display all the forms --}}
    <div class="bg-body-extra-light">
      <div class="content content-full">

        {{-- Quick Menu Alert --}}
        <div class="row">
          <div class="alert alert-info fs-5 text-center">
            <p class="mb-2">
              🎓 <strong>Bienvenue sur le Portail APOGEE !</strong>
            </p>
            <p>
              Merci de remplir le formulaire ci-dessous en fonction de votre situation :
            </p>
            <ul class="text-start mt-3">
              <li>
                <strong>✅ Vous avez déjà un compte APOGEE</strong> : complétez ou mettez à jour vos informations personnelles, sélectionnez vos centres et définissez vos privilèges d’accès.
              </li>
              <li>
                <strong>🆕 Vous ne possédez pas encore de compte APOGEE</strong> : remplissez le formulaire de demande d’ouverture de compte situé plus bas sur cette page.
              </li>
            </ul>
            <p class="mt-2">
              🔒 Toutes les données saisies sont strictement confidentielles et utilisées uniquement pour la gestion de votre accès APOGEE.
            </p>
          </div>
        </div>
        {{-- End Quick Menu Alert --}}

        {{-- Voter APOGEE Profile Form --}}
        <div class="row">
          <div class="col-12">
            <div class="block block-bordered block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Voter APOGEE Profile</h3>
              </div>
              <form action="{{ route('apogee-user.store') }}" method="POST">
            @csrf
              <div class="block-content">
                <div class="row">
                  {{-- Left Column --}}
                  <div class="col-md-6">
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
                  </div>
                  {{-- End Left Column --}}

                  {{-- Right Column --}}
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
                      <select class="selectcls" name="centre_inscription_pedagogique[]" multiple="multiple" style="width: 100%">
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
                  {{-- End Right Column --}}
                </div>

                {{-- Privileges Section --}}
                <hr class="my-4">
                <div class="row">
                  <div class="col-md-12">
                    <label class="form-label mb-2">Privilèges du Compte Utilisateur d’APOGEE par domaine</label>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="privileges_apogee[]" value="Inscription Administrative">
                          <label class="form-check-label">Inscription Administrative</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="privileges_apogee[]" value="Inscription Pédagogique">
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
                          <input class="form-check-input" type="checkbox" name="privileges_apogee[]" value="Structure des enseignements">
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
                          <input class="form-check-input" type="checkbox" name="privileges_apogee[]" value="Modalités de contrôle des connaissances">
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

                {{-- Accès Responsable --}}
                <hr class="my-4">
                <div class="mb-4">
                  <label class="form-label">Accès aux fonctionnalités réservées au responsable APOGÉE (Ouverture et Fermeture de la session)</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="responsable_apogee_access[]" value="T">
                    <label class="form-check-label">T</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="responsable_apogee_access[]" value="A">
                    <label class="form-check-label">A</label>
                  </div>
                </div>

                {{-- Submit Button --}}
                <div class="mt-4 text-center">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check me-1"></i> Enregistrer le profil APOGEE
                  </button>
                </div>
              </div>
            
            </form>
            </div>
          </div>
        </div>
        {{-- End Voter APOGEE Profile Form --}}

        {{-- Demande d'ouverture d'un compte APOGEE Form --}}
        <div class="row">
          <div class="col-12">
            <div class="block block-bordered block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Demande d'ouverture d'un compte APOGEE</h3>
              </div>
              <form id="pdfForm" action="{{ route('generate.doc') }}" method="POST" onsubmit="showLoading()">
        @csrf
        <div class="block-content">
          <div class="row">
            <!-- Left Column -->
            <div class="col-md-6">
              <div class="mb-4">
                <label class="form-label" for="etbl">Etablissement</label>
                <select class="form-select" name="etbl">
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
                <label class="form-label">Date de la demande</label>
                <input type="date" name="dateDM" class="form-control" required>
              </div>
              
              <div class="mb-4">
                <label class="form-label">Nom et Prénom du demandeur</label>
                <input type="text" name="nomPrenomUser" class="form-control" required>
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
            </div>
            <!-- End Left Column -->

            <!-- Right Column -->
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
                <select class="selectcls" name="centre_inscription_pedagogique[]" multiple="multiple" style="width: 100%">
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
            <!-- End Right Column -->
          </div>

          <!-- Privileges Section -->
          <hr class="my-4">
          <div class="row">
            <div class="col-md-12">
              <label class="form-label mb-2">Privilèges du Compte Utilisateur d'APOGEE par domaine</label>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p1" value="✅" id="privilege1">
                    <label class="form-check-label" for="privilege1">Inscription Administrative</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p2" value="✅" id="privilege2">
                    <label class="form-check-label" for="privilege2">Inscription Pédagogique</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p3" value="✅" id="privilege3">
                    <label class="form-check-label" for="privilege3">Résultat</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p4" value="✅" id="privilege4">
                    <label class="form-check-label" for="privilege4">Structure des enseignements</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p5" value="✅" id="privilege5">
                    <label class="form-check-label" for="privilege5">Dossier Étudiant</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p6" value="✅" id="privilege6">
                    <label class="form-check-label" for="privilege6">Modalités de contrôle des connaissances</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="p7" value="✅" id="privilege7">
                    <label class="form-check-label" for="privilege7">Épreuves</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Responsable Access Section -->
          <hr class="my-4">
          <div class="mb-4">
            <label class="form-label">Accès aux fonctionnalités réservées au responsable APOGÉE (Ouverture et Fermeture de la session)</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="p8" value="✅" id="accessT">
              <label class="form-check-label" for="accessT">T</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="p9" value="✅" id="accessA">
              <label class="form-check-label" for="accessA">A</label>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-file-pdf me-1"></i> Générer le PDF
            </button>
          </div>
        </div>
      </form>
            </div>
          </div>
        </div>
        {{-- End Demande d'ouverture d'un compte APOGEE Form --}}

      </div>
    </div>
  @endif

  {{-- Modal and Script Section remain as-is --}}
  <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center p-4">
        <h5 class="modal-title mb-3" id="pdfModalLabel">Génération du PDF</h5>
        <p id="countdownText">Votre PDF sera prêt dans <strong><span id="counter">7</span></strong> secondes...</p>
      </div>
    </div>
  </div>

  <script>
    // Store the original countdown HTML so it can be reset on each call.
    const originalCountdownHTML = 'Votre PDF sera prêt dans <strong id="counter">7</strong> secondes...';

    function showLoading() {
      // Get the modal element and show the modal.
      const modalElement = document.getElementById('pdfModal');
      const modal = new bootstrap.Modal(modalElement);
      modal.show();

      // Reset the countdown text to its original HTML.
      const countdownText = document.getElementById('countdownText');
      countdownText.innerHTML = originalCountdownHTML;

      // Re-query the counter element now that the content has been reset.
      const counterSpan = document.getElementById('counter');

      let count = 7;
      counterSpan.textContent = count; // Ensure it starts at 7.

      const interval = setInterval(() => {
        count--;
        counterSpan.textContent = count;

        if (count <= 0) {
          clearInterval(interval);

          // Show success icon and message.
          countdownText.innerHTML = `
            <div class="text-success mb-2">
              <i class="fa fa-check-circle fa-2x"></i>
            </div>
            <p><strong>Votre PDF est prêt !</strong></p>
          `;

          // Auto-close after 3 seconds.
          setTimeout(() => {
            modal.hide();
            pdfForm.reset();
          }, 3000);
          pdfForm.reset();
        }
      }, 1000);
    }

    $(document).ready(function () {
      // Initialize Select2 with any options you need.
      $('.selectcls').select2({
        placeholder: "Select options",
        allowClear: true,
        width: 'resolve' // This helps with theme conflicts.
      });

      // If theme JS is trying to modify selects after page load, you might need:
      $(document).on('theme-js-loaded', function () {
        $('.selectcls').select2('destroy').select2();
      });
    });
  </script>
@endsection
