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

        .section-title {
            font-weight: bold;
            margin-top: 10px;
        }

       

        .signature-table th{
            padding: 0px;
            border: 1px solid black;
        }
        .signature-table1 th{
            padding: 0px;
            border: 1px solid black;
        }
     

        .signature-small {
            font-size: 11px;
            font-weight: normal;
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
        .checkmark { color: green; font-weight: bold; font-size: 14px; }
        .crossmark { color: red; font-weight: bold; font-size: 14px; }

        .privileges-table, .privileges-table td {
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 8px;
            vertical-align: middle;
        }

        .privilege-section-title {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <img src="{{ public_path('images/background.png') }}" class="background">
    <div class=""> &nbsp; &nbsp; </div>
        <div class=""> &nbsp; &nbsp; </div>

    <div class="content">
        <div class="title">Demande d'ouverture d’un compte fonctionnel
d'accès a l'applicatif d'APOGEE 
</div>
<div class=""> &nbsp; &nbsp; </div>
        <table class="info-table">
            <tr>
                <td><strong>Etablissement :</strong> {{ $data['etbl'] }}</td>
                <td style="text-align: right;"><strong>Date de la demande :</strong> {{ $data['dateDM'] }}</td>
            </tr>
        </table>

        <p><strong>Nom & Prénom :</strong> {{ $data['nomPrenomUser'] }}</p>
        <p><strong>Nom d'utilisateur APOGÉE :</strong> {{ $data['userName'] }}</p>
        <p><strong>Fonction :</strong> {{ $data['fonction'] }}</p>
        <p><strong>Téléphone :</strong> {{ $data['tele'] }}</p>
        <p><strong>Adresse MAC :</strong> {{ $data['mac'] }}</p>

        <div class="section-title">Centres sélectionnés</div>
        <div class=""> &nbsp; &nbsp; </div>
        <p><strong>Centre de gestion :</strong> {{ implode(', ', $data['centre_gestion']) }}</p>
        <p><strong>Centre de traitement :</strong> {{ implode(', ', $data['centre_traitement']) }}</p>
        <p><strong>Centre d'inscription pédagogique :</strong> {{ implode(', ', $data['centre_inscription_pedagogique']) }}</p>
        <p><strong>Centre d'incompatibilité :</strong> {{ implode(', ', $data['centre_incompatibilite']) }}</p>

        <p class="privilege-section-title">Privilèges du Compte Utilisateur d’APOGÉE par domaine</p>
        <table class="privileges-table">
            <tr>
                <td>@if($data['p2']) <span class="checkmark">&#10004;</span> @else <span class="crossmark">&#10008;</span> @endif Inscription Pédagogique</td>
                <td>@if($data['p1']) <span class="checkmark">&#10004;</span> @else <span class="crossmark">&#10008;</span> @endif Inscription Administrative</td>
            </tr>
            <tr>
                <td>@if($data['p3']) <span class="checkmark">&#10004;</span> @else <span class="crossmark">&#10008;</span> @endif Résultat</td>
                <td>@if($data['p4']) <span class="checkmark">&#10004;</span> @else <span class="crossmark">&#10008;</span> @endif Structure des enseignements</td>
            </tr>
            <tr>
                <td>@if($data['p6']) <span class="checkmark">&#10004;</span> @else <span class="crossmark">&#10008;</span> @endif Modalités de contrôle des connaissances</td>
                <td>@if($data['p5']) <span class="checkmark">&#10004;</span> @else <span class="crossmark">&#10008;</span> @endif Dossier Étudiant</td>
            </tr>
            <tr>
                <td>@if($data['p7']) <span class="checkmark">&#10004;</span> @else <span class="crossmark">&#10008;</span> @endif Épreuves</td>
                <td></td>
            </tr>
        </table>
        <p class="privilege-section-title">Demande d’accès à certaines fonctionnalités réservée au responsable APOGÉE de l’établissement :</p>
        <p>Avancement de délibération: (Ouverture et Fermeture de la session)</p>
        <table class="privileges-table">
            <tr>
                <td style="text-align: center;">
                    @if($data['p8'] === 'T') <span class="checkmark">&#10004;</span> @else <span class="crossmark">&#10008;</span> @endif <strong>T</strong>
                </td>
                <td style="text-align: center;">
                    @if($data['p8'] === 'A') <span class="checkmark">&#10004;</span> @else <span class="crossmark">&#10008;</span> @endif <strong>A</strong>
                </td>
            </tr>
        </table>
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
