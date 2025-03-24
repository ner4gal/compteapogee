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
            position: relative;
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
            padding-top: 50mm;
            padding-left: 20mm;
            padding-right: 20mm;
            z-index: 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 8px;
            border: 1px solid black;
            text-align: center;
        }

        .title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <img src="{{ public_path('images/background.png') }}" class="background">

    <div class="content">
        <div class="title">Demande d’inscription administrative à une année antérieure</div>

        <p><strong>Etablissement:</strong> {{ $data['etbl'] }}</p>
        <p><strong>Date de la demande:</strong> {{ $data['dateDM'] }}</p>
        <p><strong>Cycle:</strong> {{ $data['typ'] }}</p>
        <p><strong>Filière:</strong> {{ $data['flr'] }}</p>
        <p><strong>Nature de la demande:</strong> {{ $data['nrtDM'] }}</p>
        <p><strong>Année d’inscription concernée:</strong> {{ $data['aneINS'] }}</p>

        <h3>Liste des Étudiants :</h3>
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

        <h4>La raison du retard :</h4>
        <p>{{ $data['mtf'] }}</p>

        <br><br>

        <!-- Approval Table with 4 Columns -->
        <table>
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
                    <td style="height: 100px;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </div>

</body>
</html>
