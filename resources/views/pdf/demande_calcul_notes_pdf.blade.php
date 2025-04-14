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

    <!-- Background image with logos & footer already in the PNG -->
    <img src="{{ public_path('images/background.png') }}" class="background">

    <div class="content">

        <!-- Reference top-left -->
        <div class=""> &nbsp; &nbsp; </div>
        <div class=""> &nbsp; &nbsp; </div>
        <div class="top-ref"> &nbsp; &nbsp; </div>

        <!-- Title centered -->
        <div class="title">Demande de calcul des notes à une année universitaire antérieure</div>
        <div class=""> &nbsp; &nbsp; </div>

        <!-- Table for Etablissement (left) & Date (right) -->
        <table class="info-table" style="margin-bottom: 10px;">
            <tr>
                <td><strong>Etablissement :</strong> {{ $data['etbl'] }}</td>
                <td style="text-align: right;"><strong>Date de la demande :</strong> {{ $data['dateDM'] }}</td>
            </tr>
        </table>

        <!-- Basic info fields -->
        <p><strong>Nom &amp; Prénom :</strong> {{ $data['NomPrenomETD'] }}</p>
        <p><strong>Numéro d'Apogée :</strong> {{ $data['NumETD'] }}</p>
        <p><strong>Cycle :</strong> {{ $data['cycle'] }}</p>
        <p><strong>Filière :</strong> {{ $data['filiere'] }}</p>
        <p><strong>Année concernée :</strong> {{ $data['AnneeCon'] }}</p>

        <!-- Semesters -->
        <p><strong>Les Semestres Concernés :</strong></p>
        <div class=""> &nbsp; &nbsp; </div>
        <table style="width:100%; border-collapse: collapse; margin-bottom: 10px;">
            <thead>
                <tr>
                    <th style="border:1px solid black; padding:5px;">Semestre</th>
                    <th style="border:1px solid black; padding:5px;">Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach (['Semestre 1', 'Semestre 2', 'Semestre 3', 'Semestre 4', 'Semestre 5', 'Semestre 6'] as $semestre)
                            <tr>
                                <td style="border:1px solid black; padding:5px;">{{ $semestre }}</td>
                                <td style="border:1px solid black; padding:5px; text-align:center;">
                                    {!! (isset($data['semesters']) && in_array($semestre, $data['semesters']))
                    ? '<span style="color:green; font-size:18px; font-weight:bold;">&#x2714;</span>'
                    : '<span style="color:red; font-size:18px; font-weight:bold;">&#10006;</span>' !!}
                                </td>
                            </tr>
                @endforeach
            </tbody>
        </table>
        

        <p style="margin-top: 10px;"><strong>La raison de l'annulation :</strong></p>
        <div class="reason-box">
            {{ $data['mtf'] }}
        </div>
        <div class=""> &nbsp; &nbsp; </div>
        <div class=""> &nbsp; &nbsp; </div>
        <div class=""> &nbsp; &nbsp; </div>
        <!-- Signatures Table (4 columns) -->
        <table class="signature-table" style="margin-top: 20px;">
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