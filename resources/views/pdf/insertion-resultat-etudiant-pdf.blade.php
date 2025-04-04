<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <style>
    @page {
        size: A4;
        margin: 0;
    }

    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 12px;
        margin: 0;
        padding: 0;
        word-wrap: break-word;
    }

    .background {
        position: fixed;
        top: 0;
        left: 0;
        width: 210mm;
        height: 297mm;
        z-index: -1;
    }

    .content {
        position: relative;
        padding: 35mm 20mm 20mm;
        z-index: 1;
    }

    .title {
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    .info-table td {
        padding: 2px 0;
    }

    p {
        margin: 3px 0;
    }

    .module-table th,
    .module-table td {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    .reason-box {
        border: 1px solid black;
        padding: 5px;
        margin-top: 10px;
        min-height: 40px;
    }

    .signature-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 5px;
    }

    .signature-table th,
    .signature-table td {
        border: 1px solid black;
        text-align: center;
        padding: 5px;
        height: 80px;
    }

    .signature-table th {
        padding: 3px;
        font-weight: bold;
    }
  </style>
</head>
<body>

  <img src="{{ public_path('images/background.png') }}" class="background">

  <div class="content">
    <div class="title">Demande d’insertion ou modification d’un résultat des années antérieures sur le système APOGEE (Par Étudiant)</div>

    <table class="info-table">
        <tr>
            <td><strong>Etablissement :</strong> {{ $data['etbl'] }}</td>
            <td style="text-align: right;"><strong>Date :</strong> {{ $data['dateDM'] }}</td>
        </tr>
    </table>

    <p><strong>Nom & Prénom :</strong> {{ $data['NomPrenom'] }}</p>
    <p><strong>Numéro APOGEE :</strong> {{ $data['NumApogee'] }}</p>
    <p><strong>Cycle :</strong> {{ $data['typ'] }}</p>
    <p><strong>Filière :</strong> {{ $data['flr'] }}</p>
    <p><strong>Semestre :</strong> {{ $data['Semestre'] }}</p>
    <p><strong>Année universitaire concernée :</strong> {{ $data['AnneeCon'] }}</p>
    <p><strong>Nature de la demande :</strong> {{ $data['nrtDM'] }}</p>

    <h3 style="margin-top: 10px;">Liste des Modules</h3>
    <table class="module-table">
        <thead>
            <tr>
                <th>Nom du Module</th>
                <th>Session</th>
                <th>Note Initiale</th>
                <th>Note Corrigée</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['modules'] as $module)
                <tr>
                    <td>{{ $module['M'] }}</td>
                    <td>{{ $module['S'] }}</td>
                    <td>{{ $module['NI'] }}</td>
                    <td>{{ $module['NC'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 10px;"><strong>Raison du retard :</strong></p>
    <div class="reason-box">
        {{ $data['raison'] }}
    </div>

    <table class="signature-table" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>Responsable du module</th>
                <th>Coordinateur de la Filière</th>
                <th>Avis du Responsable administratif</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <table class="signature-table">
        <thead>
            <tr>
                <th>Avis du Chef d’établissement</th>
                <th>Avis du Président de l’Université</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

  </div>
</body>
</html>
