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
            padding: 35mm 20mm 100mm; /* Increased bottom padding to accommodate signature */
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

        /* Signature table styling */
        .signature-container {
            position: absolute;
            bottom: 25mm;
            left: 20mm;
            right: 20mm;
            width: calc(100% - 40mm);
            z-index: 1;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
        }

        .signature-table th {
            padding: 0px;
            border: 1px solid black;
        }

        .signature-table td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
            height: 80px;
            word-wrap: break-word;
        }

        .signature-small {
            font-size: 11px;
            font-weight: normal;
        }

        .signature-table thead th {
            padding: 0px 0px;
            margin: 0%;
            font-weight: bold;
        }
        .reference {
            position: absolute;
            top: 3mm;
            left: 20;
        }

    </style>
</head>
<body>

    <img src="{{ public_path('images/background.png') }}" class="background">
    <!-- Reference number in top right corner -->
    <div class="reference">réf : APOGEE-001</div>

    <div class="content">
        <div class=""> &nbsp; &nbsp; </div>
        

        <div class="title">Demande d'inscription administrative à une année antérieure</div>
        
        <table class="info-table">
            <tr>
                <td><strong>Etablissement : {{ $data['etbl'] }} </strong></td>
                <td style="text-align: right;"><strong>Date de la demande :{{ $data['dateDM'] }} </strong>  </td>
            </tr>
        </table>

        <p><strong>Cycle :</strong> {{ $data['typ'] }}</p>
        <p><strong>Filière :</strong> {{ $data['flr'] }}</p>
        <p><strong>Année d'inscription concernée :</strong> {{ $data['aneINS'] }}</p>
        <p><strong>Nature de la demande :</strong> {{ $data['nrtDM'] }}</p>
        
        <div class="section-title">Liste des Étudiants :</div>
        <table class="module-table ">
            <thead>
                <tr>
                    <th>Numéro APOGEE</th>
                    <th>Nom & Prénom</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['students'] as $student)
                    <tr>
                        <td>{{ $student['apogee'] }}</td>
                        <td>{{ $student['name'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p style="margin-top: 10px;"><strong>Raison du retard :</strong></p>
        <div class="reason-box">
            {{ $data['mtf'] }}
        </div>
    </div>

    <!-- Signature table positioned absolutely at the bottom -->
    <div class="signature-container">
        <table class="signature-table">
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