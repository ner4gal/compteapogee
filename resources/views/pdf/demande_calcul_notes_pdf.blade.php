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
            padding: 25mm 20mm 100mm; /* Adjusted top padding to 25mm */
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
            padding: 12px;
            height: 80px;
            word-wrap: break-word;
        }

        .signature-table thead th {
            padding: 0px 0px;
            margin: 0%;
            font-weight: bold;
        }

        /* Semester table styles */
        .semester-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .semester-table th,
        .semester-table td {
            border: 1px solid black;
            padding: 5px;
        }

        .semester-table td {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Background image with logos & footer -->
    <img src="{{ public_path('images/background.png') }}" class="background">

    <!-- Reference number in top left corner -->
    <div class="reference">réf : APOGEE-004</div>
       
    <div class="content">
    <div class=""> &nbsp; &nbsp; </div><div class=""> &nbsp; &nbsp; </div><div class=""> &nbsp; &nbsp; </div>
        <!-- Title centered -->
        <div class="title">Demande de calcul des notes à une année universitaire antérieure</div>

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
        <table class="semester-table">
            <thead>
                <tr>
                    <th>Semestre</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
    @foreach (['Semestre 1', 'Semestre 2', 'Semestre 3', 'Semestre 4', 'Semestre 5', 'Semestre 6'] as $semestre)
        <tr>
            <td>{{ $semestre }}</td>
            <td>
                {!! (isset($data['semesters']) && in_array($semestre, $data['semesters']))
                    ? '<span style="color:green; font-size:18px; font-weight:bold;">&#x2714;</span>'
                    : '<span style="color:red; font-size:18px; font-weight:bold;">&#10006;</span>' !!}
            </td>
        </tr>
    @endforeach
</tbody>
        </table>
        
        <p style="margin-top: 10px;"><strong>La raison :</strong></p>
        <div class="reason-box">
            {{ $data['mtf'] }}
        </div>
    </div>

    <!-- Signature table positioned absolutely at the bottom -->
    <div class="signature-container">
        <table class="signature-table">
            <thead>
                <tr>
                    <th>Responsable Administratif</th>
                    <th>Avis du Chef Service</th>
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