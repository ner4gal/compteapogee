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
            padding-top: 40mm;
            padding-left: 20mm;
            padding-right: 20mm;
            z-index: 1;
            word-wrap: break-word;
        }

        .top-ref {
            text-align: left;
            font-size: 10px;
            margin-bottom: 5px;
        }

        .title {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin: 10px 0 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td, th {
            padding: 5px;
            border: 1px solid black;
            text-align: center;
            word-wrap: break-word;
        }

        .info-table td {
            border: none;
            padding: 3px 0;
            word-wrap: break-word;
        }

        .section-title {
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        .reason {
            border: 1px solid black;
            padding: 5px;
            min-height: 50px;
            margin-top: 5px;
            word-wrap: break-word;
        }

        .avis-table th, .avis-table td {
            height: 80px;
        }
    </style>
</head>
<body>

    <img src="{{ public_path('images/background.png') }}" class="background">

    <div class="content">

        <div class="top-ref">Ref : Form-Apogee1</div>

        <div class="title">Demande d’inscription administrative à une année antérieure</div>

        <table class="info-table">
            <tr>
                <td><strong>Etablissement :</strong> {{ $data['etbl'] }}</td>
                <td style="text-align: right;"><strong>Date de la demande :</strong> {{ $data['dateDM'] }}</td>
            </tr>
        </table>

        <p><strong>Cycle :</strong> {{ $data['typ'] }}</p>
        <p><strong>Filière :</strong> {{ $data['flr'] }}</p>
        <p><strong>Nature de la demande :</strong> {{ $data['nrtDM'] }}</p>
        <p><strong>Année d’inscription concernée :</strong> {{ $data['aneINS'] }}</p>

        <div class="section-title">Liste des Étudiants :</div>
        <table>
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

        <div class="section-title">La raison du retard :</div>
        <div class="reason">
            {{ $data['mtf'] }}
        </div>

        <table class="avis-table" style="margin-top: 30px;">
            <thead>
                <tr>
                    <th>Avis du Coordinateur de la filière</th>
                    <th>Avis du responsable administratif</th>
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
