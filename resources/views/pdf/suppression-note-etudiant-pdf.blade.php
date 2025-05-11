<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        @page {
            size: A4;
            margin: 10mm 15mm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            margin: 0;
            padding: 0;
            line-height: 1.2;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 210mm;
            height: 297mm;
            z-index: -1;
            opacity: 0.05;
        }

        .document-container {
            position: relative;
            min-height: 277mm;
            padding-bottom: 80mm;
        }

        .reference {
            position: absolute;
            top: 5mm;
            left: 0;
            font-weight: bold;
        }

        .title {
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0 10px 0;
            padding-top: 15px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        .info-table td {
            padding: 1px 0;
        }

        .info-row {
            margin: 3px 0;
        }

        .main-table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0;
            font-size: 10px;
            table-layout: fixed;
        }

        .main-table th, 
        .main-table td {
            border: 1px solid black;
            padding: 3px;
            text-align: center;
        }

        .main-table th:nth-child(1) {
            width: 60%;
        }
        .main-table th:nth-child(2),
        .main-table th:nth-child(3) {
            width: 20%;
        }

        .reason-box {
            border: 1px solid black;
            padding: 5px;
            min-height: 30px;
            margin: 5px 0;
            font-size: 10px;
            line-height: 1.3;
        }

        .signature-section {
            position: absolute;
            bottom: 10mm;
            left: 0;
            right: 0;
            width: 100%;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            font-size: 10px;
            table-layout: fixed;
        }

        .signature-table th {
            border: 1px solid black;
            padding: 3px;
            font-weight: bold;
            height: 30px;
        }

        .signature-table td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
            height: 40px;
        }

        .section-title {
            font-weight: bold;
            margin: 8px 0 3px 0;
        }

        .university-address {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            padding: 5px 0;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('images/background.png') }}" class="background">
    <div class="document-container">
        <div class="reference">réf : APOGEE-006</div>
        
        <div class="title">
            Demande de suppression des notes de l'année antérieure<br>
            (Par Étudiant)
        </div>

        <table class="info-table">
            <tr>
                <td><strong>Etablissement :</strong> {{ $data['etbl'] }}</td>
                <td style="text-align: right;"><strong>Date de la demande :</strong> {{ $data['dateDM'] }}</td>
            </tr>
        </table>

        <div class="info-row"><strong>Cycle :</strong> {{ $data['typ'] }}</div>
        <div class="info-row"><strong>Filière :</strong> {{ $data['flr'] }}</div>
        <div class="info-row"><strong>Nom & Prénom :</strong> {{ $data['NomPrenom'] }}</div>
        <div class="info-row"><strong>Numéro APOGEE :</strong> {{ $data['NumApogee'] }}</div>
        <div class="info-row"><strong>Semestre :</strong> {{ $data['Semestre'] }}</div>
        <div class="info-row"><strong>Année universitaire concernée :</strong> {{ $data['AnneeCon'] }}</div>
        <div class="info-row"><strong>Nature de la demande :</strong> {{ $data['nrtDM'] }}</div>
        
        @if(isset($data['statut']))
            <div class="info-row"><strong>Statut :</strong> {{ $data['statut'] }}</div>
        @endif

        <div class="section-title">Liste des Modules :</div>
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

        <div class="section-title">Raison de suppression des notes :</div>
        <div class="reason-box">
            {{ $data['raison'] }}
        </div>

        <div class="signature-section">
            <table class="signature-table">
                <thead>
                    <tr>
                        <th width="50%">Nom & Prénom Etudiant<br>{{ $data['NomPrenom'] }}</th>
                        <th width="50%">Avis du Responsable administratif</th>
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
                        <th width="33%">Avis du Chef Service</th>
                        <th width="33%">Avis du Chef d'établissement</th>
                        <th width="34%">Avis du Président de l'Université</th>
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

        <div class="university-address">
            14000 - الفنيطرة - 242 رئاسة جامعة ابن طهيل، المركب الجامعي، صب
        </div>
    </div>
</body>
</html>