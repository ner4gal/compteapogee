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
            position: relative;
            min-height: 297mm;
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
            padding: 35mm 20mm 100mm; /* Increased bottom padding for signature space */
            z-index: 1;
        }

        .title {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .reference {
            position: absolute;
            top: 5mm;
            left: 20mm;
            z-index: 2;
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

        /* Signature container */
        .signature-container {
            position: absolute;
            bottom: 25mm;
            left: 20mm;
            right: 20mm;
            width: calc(100% - 40mm);
            z-index: 1;
        }

        /* Signature table styles */
        .signature-table1 {
            width: 100%;
            border-collapse: collapse;
        }

        .signature-table1 th {
            padding: 0px;
            border: 1px solid black;
        }

        .signature-table1 td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            height: 80px;
            word-wrap: break-word;
        }

        .signature-table1 thead th {
            padding: 0px 0px;
            margin: 0%;
            font-weight: bold;
        }

        h3 {
            margin: 10px 0 5px 0;
        }
    </style>
</head>

<body>
    <!-- Background image with logos & footer already in the PNG -->
    <img src="{{ public_path('images/background.png') }}" class="background">

    <!-- Reference number in top left corner -->
    <div class="reference">réf : APOGEE-002</div>
    <div class=""> &nbsp; &nbsp; </div>
    

    <div class="content">
        <div class="title">Demande d'insertion ou modification d'un résultat des années antérieures sur le système
            APOGEE (Par Étudiant)</div>

        <table class="info-table">
            <tr>
                <td><strong>Etablissement : {{ $data['etbl'] }} </strong></td>
                <td style="text-align: right;"><strong>Date de la demande :{{ $data['dateDM'] }} </strong></td>
            </tr>
        </table>

        <p><strong>Nom & Prénom :</strong> {{ $data['NomPrenom'] }}</p>
        <p><strong>Numéro APOGEE :</strong> {{ $data['NumApogee'] }}</p>
        <p><strong>Cycle :</strong> {{ $data['typ'] }}</p>
        <p><strong>Filière :</strong> {{ $data['flr'] }}</p>
        <p><strong>Semestre :</strong> {{ $data['Semestre'] }}</p>
        <p><strong>Année universitaire concernée :</strong> {{ $data['AnneeCon'] }}</p>
        <p><strong>Nature de la demande :</strong> {{ $data['nrtDM'] }}</p>

        <h3>Liste des Modules</h3>
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
    </div>

    <!-- Signature table positioned absolutely at the bottom -->
    <div class="signature-container">
        <table class="signature-table1">
            <thead>
                <tr>
                    <th>Avis du Coordinateur de la filière</th>
                    <th>Avis du responsable administratif</th>
                    <th>Avis du Chef d'établissement</th>
                    <th>Avis du Président de l'Université</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>