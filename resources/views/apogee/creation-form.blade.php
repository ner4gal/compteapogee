@extends('layouts.app')

@section('title', 'Demande de Création APOGÉE')

@section('content')
  <div class="bg-body-extra-light">
    <div class="content content-full">
    <div class="row">
      <div class="col-12">
      <div class="block block-bordered block-rounded">
        <div class="block-header block-header-default">
        <h3 class="block-title">Demande d'ouverture d'un compte APOGÉE</h3>
        </div>

        <!-- ✅ FORM -->
        <form id="pdfForm" action="{{ route('generate.doc') }}" method="POST"
        onsubmit="return showConfirmation(event)">
        @csrf
        <div class="block-content">
          <div class="row">
          <div class="col-md-6">
            @include('apogee.partials.apogee-creation-left')
          </div>
          <div class="col-md-6">
            @include('apogee.partials.apogee-creation-right')
          </div>
          </div>

          <hr class="my-4">
          <div class="row">
          <div class="col-md-12">
            @include('apogee.partials.apogee-privileges-creation')
          </div>
          </div>

          <hr class="my-4">
          <div class="mb-4">
  <label class="form-label">Avancement de délibération</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="p8" value="T" id="radioT" required>
    <label class="form-check-label" for="radioT">T</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="p8" value="A" id="radioA" required>
    <label class="form-check-label" for="radioA">A</label>
  </div>
</div>


          <div class="mt-4 text-center">
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-file-pdf me-1"></i> Générer le PDF
          </button>
          </div>
        </div>
        </form>
        <!-- ✅ END FORM -->

      </div>
      </div>
    </div>
    </div>
  </div>

  <!-- ✅ CONFIRMATION MODAL -->
  <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Confirmation de votre demande</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body" id="confirmationContent">
      <!-- Filled by JS -->
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Modifier</button>
      <button type="button" class="btn btn-success" onclick="confirmAndSubmit()">Confirmer</button>
      </div>
    </div>
    </div>
  </div>
@endsection

@push('scripts')
  <!-- ✅ SELECT2 INIT -->
  <script>
    $(document).ready(function () {
    $('.selectcls').select2({
      placeholder: "Select options",
      allowClear: true,
      width: 'resolve'
    });

    $(document).on('theme-js-loaded', function () {
      $('.selectcls').select2('destroy').select2();
    });
    });
  </script>

  <!-- ✅ CONFIRMATION LOGIC -->
  <script>
    function showConfirmation(e) {
    e.preventDefault();
    const form = document.getElementById('pdfForm');
    const formData = new FormData(form);
    const entries = Array.from(formData.entries());

    let html = '<div class="table-responsive"><table class="table table-bordered"><tbody>';
    const prettyLabels = {
      etbl: "Établissement",
      dateDM: "Date de la demande",
      nomPrenomUser: "Nom et Prénom",
      userName: "Nom d'utilisateur APOGÉE",
      fonction: "Fonction",
      tele: "Téléphone",
      mac: "Adresse MAC",
      "centre_gestion[]": "Centre de Gestion",
      "centre_traitement[]": "Centre de Traitement",
      "centre_inscription_pedagogique[]": "Centre d'inscription pédagogique",
      "centre_incompatibilite[]": "Centre d'Incompatibilité",
      p1: "Inscription Administrative",
      p2: "Inscription Pédagogique",
      p3: "Résultat",
      p4: "Structure des enseignements",
      p5: "Dossier Étudiant",
      p6: "Modalités de contrôle des connaissances",
      p7: "Épreuves",
      p8: "Accès Responsable T",
      p9: "Accès Responsable A",
    };

    const displayed = new Set();

    entries.forEach(([key, value]) => {
      if (key === "_token") return; // skip token

      const label = prettyLabels[key] || prettyLabels[key.replace(/\[\]$/, '')] || key.replace(/_/g, ' ');
      if (!displayed.has(key)) {
      const allValues = entries
        .filter(entry => entry[0] === key)
        .map(entry => entry[1])
        .join(', ');
      html += `<tr><td><strong>${label}</strong></td><td>${allValues}</td></tr>`;
      displayed.add(key);
      }
    });

    html += '</tbody></table></div>';
    document.getElementById('confirmationContent').innerHTML = html;
    new bootstrap.Modal(document.getElementById('confirmationModal')).show();

    return false;
    }

    function confirmAndSubmit() {
    document.getElementById('pdfForm').submit();
    }
  </script>
@endpush