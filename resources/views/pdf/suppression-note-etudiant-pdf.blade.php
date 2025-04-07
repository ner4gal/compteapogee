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

        .top-ref {
            font-size: 10px;
            text-align: left;
            margin-bottom: 5px;
        }

        .title {
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
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
            margin: 3px 0;
            word-wrap: break-word;
        }

        .main-table th,
        .main-table td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
            word-wrap: break-word;
        }

        .main-table {
            margin-top: 10px;
        }

        .reason-box {
            border: 1px solid black;
            padding: 5px;
            margin-top: 10px;
            word-wrap: break-word;
            min-height: 40px;
        }

        .signature-table {

            width: 100%;
            border-collapse: collapse;
            margin-top: 0px;
        }

        .signature-table th {
            padding: 0px;
            border: 1px solid black;
        }

        .signature-table1 th {
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
            /* réduit l’espace vertical dans les en-têtes */
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
            padding: 5px;
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
            /* réduit l’espace vertical dans les en-têtes */
            font-weight: bold;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('images/background.png') }}" class="background">
    <div class="content">
        <div class="top-ref">&nbsp;</div>
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

        <h3 style="text-align: left; margin-top: 10px;">Liste des Modules :</h3>
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

        <p style="margin-top: 10px;"><strong>Raison de suppression des notes :</strong></p>
        <div class="reason-box">
            {{ $data['raison'] }}
        </div>

        <table class="signature-table1">
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
                    <th>Avis du Chef d’établissement</th>
                    <th>Avis du Président de l’Université</th>
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