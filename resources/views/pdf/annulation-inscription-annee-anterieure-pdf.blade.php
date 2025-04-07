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
            margin-top: 0px;
        }

        .signature-table th{
            padding: 0px;
            border: 1px solid black;
        }
        .signature-table1 th{
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

        .signature-table1 {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        .signature-table1 td {
            border: 1px solid black;
            text-align: center;
            padding: 12px;
            height: 80px;
            word-wrap: break-word;
        }

        .signature-small1 {
            font-size: 11px;
            font-weight: normal;
        }

        .signature-table1 thead th {
            padding: 0px 0px;
            margin: 0%;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <img src="{{ public_path('images/background.png') }}" class="background">

    <div class="content">

        <div class=""> &nbsp; &nbsp; </div>
        <div class=""> &nbsp; &nbsp; </div>
        <div class="top-ref"> &nbsp; &nbsp; </div>

        <div class="title">Demande d'annulation d'inscription administrative à une année antérieure</div>
        
        <table class="info-table">
            <tr>
                <td><strong>Etablissement : {{ $data['etbl'] }} </strong></td>
                <td style="text-align: right;"><strong>Date de la demande : {{ $data['dateDM'] }} </strong></td>
            </tr>
        </table>

        <p><strong>Cycle :</strong> {{ $data['typ'] }}</p>
        <p><strong>Filière :</strong> {{ $data['flr'] }}</p>
        <p><strong>Année d’inscription concernée :</strong> {{ $data['aneINS'] }}</p>
        
        <div class="section-title">Liste des Étudiants :</div>
        <table class="module-table">
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

        <p style="margin-top: 10px;"><strong>La raison de l'annulation :</strong></p>
        <div class="reason-box">
            {{ $data['mtf'] }}
        </div>

        <table class="signature-table1" style="margin-top: 30px;">
            <thead>
                <tr>
                    <th>Responsable Administratif</th>
                    <th>Avis du Chef Service</th>
                    <th>Avis du Chef d'établissement</th>
                    <th>Avis du Président de l’Université</th>
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
