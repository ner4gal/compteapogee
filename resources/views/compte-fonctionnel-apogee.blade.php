@extends('layouts.app')

@section('title', 'Accueil - Portail des Demandes Administratives')




@section('content')
    <!-- Page Content -->
    <div class="bg-body-extra-light">
        <div class="content content-full">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('Demands') }}">Demands</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Compte APOGEE </li>
                </ol>
            </nav>
            <!-- END Breadcrumb -->

            <!-- Quick Menu -->
            <div class="row">
                <div class="col-12 col-md-6 col-xl-6">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('home') }}">
                        <div class="block-content">
                            <p class="my-2">
                                <i class="fa fa-compass fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">Home</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-xl-6">
                    <a class="block block-rounded block-bordered block-link-shadow text-center"
                        href="{{ route('Demands') }}">
                        <div class="block-content">
                            <p class="my-2">
                                <i class="fa fa-file-word fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">Les Demandes Administratives</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- END Quick Menu -->
            <!-- END Quick Menu -->
            <h2 class="text-center mb-4">Demande d'ouverture ou de modification d'un compte APOGEE</h2>

            <!-- Quick Stats -->
            <div class="row">
                <form id = "pdfForm" action="{{ route('generate.doc') }}" method="POST" onsubmit="showLoading()">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="etablissement">Etablissement</label>
                        <select class="form-select" name="etbl">
                            <option value="Faculté des Langues des Lettres et des Arts">Faculté des Langues des Lettres et
                                des
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
                            <option value="Ecole Nationale Supérieure de Chimie">Ecole Nationale Supérieure de Chimie
                            </option>
                            <option value="Ecole Supérieure d'Education et de Formation">Ecole Supérieure d'Education et de
                                Formation</option>
                            <option value="Institut des Métiers de Sport">Institut des Métiers de Sport</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date de la demande</label>
                        <input type="date" name="dateDM" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nature de la demande</label>
                        <input type="text" name="demNTR" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nom et Prénom du demandeur</label>
                        <input type="text" name="nomPrenomUser" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nom d’utilisateur APOGEE</label>
                        <input type="text" name="userName" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fonction</label>
                        <input type="text" name="fonction" class="form-control" required>
                    </div>

                    <h4 class="mt-4">Centres</h4>

                    <div class="mb-3">
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

                    <div class="mb-3">
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

                    <div class="mb-3">
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
                    <div class="mb-3">
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

                    <div class="mb-3">
                        <label class="form-label">Téléphone</label>
                        <input type="text" name="tele" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Adresse MAC de l'ordinateur</label>
                        <input type="text" name="mac" class="form-control" required>
                    </div>

                    <h4 class="mt-4">Privilèges du Compte Utilisateur d’APOGEE</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="p1" value="✅">
                        <label class="form-check-label">Inscription Administrative</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="p2" value="✅">
                        <label class="form-check-label">Inscription Pédagogique</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="p3" value="✅">
                        <label class="form-check-label">Résultat</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="p4" value="✅">
                        <label class="form-check-label">Structure des enseignements</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="p5" value="✅">
                        <label class="form-check-label">Dossier Étudiant</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="p6" value="✅">
                        <label class="form-check-label">Modalités de contrôle des connaissances</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="p7" value="✅">
                        <label class="form-check-label">Épreuves</label>
                    </div>

                    <h4 class="mt-4">Accès aux fonctionnalités réservées au responsable APOGÉE (Ouverture et Fermeture de la
                        session </h4>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="p8" value="✅">
                        <label class="form-check-label">T </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="p9" value="✅">
                        <label class="form-check-label">A</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Générer le PDF</button>
                </form>
            </div>
            <!-- END Quick Stats -->
        </div>
    </div>
    <!-- END Page Content -->
    <!-- Modal Popup -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4">
                <h5 class="modal-title mb-3" id="pdfModalLabel">Génération du PDF</h5>
                <p id="countdownText">Votre PDF sera prêt dans <strong><span id="counter">7</span></strong> secondes...</p>
            </div>
        </div>
    </div>

    <script>
        function showLoading() {
            const modal = new bootstrap.Modal(document.getElementById('pdfModal'));
            modal.show();

            let count = 7;
            const counterSpan = document.getElementById('counter');
            const countdownText = document.getElementById('countdownText');
            const modalContent = document.querySelector('#pdfModal .modal-content');

            const interval = setInterval(() => {
                count--;
                counterSpan.textContent = count;

                if (count <= 0) {
                    clearInterval(interval);

                    // ✅ Show success icon and message
                    countdownText.innerHTML = `
                                                <div class="text-success mb-2">
                                                    <i class="fa fa-check-circle fa-2x"></i>
                                                </div>
                                                <p><strong>Votre PDF est prêt !</strong></p>
                                            `;

                    // ✅ Auto-close after 3 seconds
                    setTimeout(() => {
                        modal.hide();
                        pdfForm.reset();
                    }, 3000);
                    pdfForm.reset();
                }
            }, 1000);
            
        }

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