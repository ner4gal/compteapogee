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
            padding: 25mm 20mm 100mm; /* Adjusted padding for better spacing */
            z-index: 1;
        }

        .top-ref {
            font-size: 10px;
            text-align: left;
            margin-bottom: 5px;
        }

        .title {
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 2px 0;
            word-wrap: break-word;
        }

        p {
            margin: 5px 0;
            word-wrap: break-word;
        }

        .main-table {
            margin: 10px 0;
        }

        .main-table th,
        .main-table td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
            word-wrap: break-word;
        }

        .reason-box {
            border: 1px solid black;
            padding: 8px;
            margin: 10px 0;
            min-height: 40px;
            word-wrap: break-word;
        }

        /* Signature tables styling */
        .signature-container {
            position: absolute;
            bottom: 20mm;
            left: 20mm;
            right: 20mm;
            width: calc(100% - 40mm);
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .signature-table th {
            border: 1px solid black;
            padding: 5px;
            font-weight: bold;
        }

        .signature-table td {
            border: 1px solid black;
            text-align: center;
            padding: 12px;
            height: 60px;
            word-wrap: break-word;
        }
        .reference {
            position: absolute;
            top: 5mm;
            left: 20mm;
            z-index: 2;
        }

        h3 {
            margin: 15px 0 5px 0;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('images/background.png') }}" class="background">
    <div class="reference">réf : APOGEE-006</div>
    <div class="content">
        <div class="title">
            Demande de suppression des notes de l'année antérieure <br> (Par Étudiant)
        </div>

        <table class="info-table">
            <tr>
                <td><strong>Etablissement :</strong> {{ $data['etbl'] }}</td>
                <td style="text-align: right;"><strong>Date de la demande :</strong> {{ $data['dateDM'] }}</td>
            </tr>
        </table>

        <p><strong>Cycle :</strong> {{ $data['typ'] }}</p>
        <p><strong>Filière :</strong> {{ $data['flr'] }}</p>
        <p><strong>Nom &amp; Prénom :</strong> {{ $data['NomPrenom'] }}</p>
        <p><strong>Numéro APOGEE :</strong> {{ $data['NumApogee'] }}</p>
        <p><strong>Semestre :</strong> {{ $data['Semestre'] }}</p>
        <p><strong>Année universitaire concernée :</strong> {{ $data['AnneeCon'] }}</p>
        <p><strong>Nature de la demande :</strong> {{ $data['nrtDM'] }}</p>
        
        @if(isset($data['statut']))
            <p><strong>Statut :</strong> {{ $data['statut'] }}</p>
        @endif

        <h3>Liste des Modules :</h3>
        <table class="main-table">
            <thead>
                <tr>
                    <th>Nom du Module</th>
                    <th>Session</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['modules'] as $module)
                    <tr>
                        <td>{{ $module['M'] }}</td>
                        <td>{{ $module['S'] }}</td>
                        <td>{{ $module['NI'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p><strong>Raison de suppression des notes :</strong></p>
        <div class="reason-box">
            {{ $data['raison'] }}
        </div>
    </div>

    <!-- Signature tables positioned at bottom -->
    <div class="signature-container">
        <table class="signature-table">
            <thead>
                <tr>
                    <th>Nom &amp; Prénom Etudiant <br>{{ $data['NomPrenom'] }}</th>
                    <th>Avis du Responsable administratif</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>

        <table class="signature-table">
            <thead>
                <tr>
                    <th>Avis du Chef Service</th>
                    <th>Avis du Chef d'établissement</th>
                    <th>Avis du Président de l'Université</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>