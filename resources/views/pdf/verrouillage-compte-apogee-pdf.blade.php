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

        .reference {
            position: absolute;
            top: 5mm;
            left: 20mm;
            z-index: 2;
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

        .reason-box {
            border: 1px solid black;
            padding: 8px;
            margin-top: 10px;
            min-height: 90px;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
        }

        .signature-table th,
        .signature-table td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }

        .signature-table td {
            height: 80px;
        }

        .signature-container {
            position: absolute;
            bottom: 25mm;
            left: 20mm;
            right: 20mm;
            width: calc(100% - 40mm);
        }
    </style>
</head>
<body>
    <img src="{{ public_path('images/background.png') }}" class="background">

    <div class="reference">réf : APOGEE-007</div>

    <div class="content">
        <div>&nbsp; &nbsp;</div>

        <div class="title">Demande de fermeture definitive de compte APOGEE</div>

        <table class="info-table">
            <tr>
                <td><strong>Etablissement :</strong> {{ $data['etablissement'] }}</td>
                <td style="text-align: right;"><strong>Date de la demande :</strong> {{ $data['date_demande'] }}</td>
            </tr>
        </table>

        <p><strong>Fonction :</strong> {{ $data['fonction'] }}</p>
        <p><strong>Nom & Prénom :</strong> {{ $data['nom_prenom'] }}</p>
        <p><strong>Username APOGEE :</strong> {{ $data['username_apogee'] }}</p>

        <p style="margin-top: 10px;"><strong>Pourquoi vous avez besoin de fermer definitivement le compte :</strong></p>
        <div class="reason-box">
            {{ $data['motif_verrouillage'] }}
        </div>

        <div class="signature-container">
            <table class="signature-table">
                <thead>
                    <tr>
                        <th>Avis du demandeur</th>
                        <th>Avis du responsable administratif</th>
                        <th>Avis du Chef d'établissement</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
