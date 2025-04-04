<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <style>
        /* Page Setup */
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

        /* Background image with logos, footer, etc. */
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 210mm;
            height: 297mm;
            z-index: -1;
        }

        /* Main content container */
        .content {
            position: relative;
            padding-top: 40mm;
            padding-left: 20mm;
            padding-right: 20mm;
            z-index: 1;
        }

        /* Small reference text at top-left */
        .top-ref {
            font-size: 10px;
            text-align: left;
            margin-bottom: 5px;
        }

        /* Title */
        .title {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin: 10px 0 5px;
        }

        .subtitle {
            text-align: center;
            font-size: 12px;
            margin-bottom: 10px;
        }

        /* Table defaults */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td,
        th {
            padding: 5px;
            border: 1px solid black;
            text-align: center;
            word-wrap: break-word;
        }

        /* For top info table (no border) */
        .info-table td {
            border: none;
            padding: 3px 0;
        }

        /* For the Doctorant / الباحث(ة) heading */
        .doctorant-heading {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        /* Minimal margin for paragraphs */
        p {
            margin: 3px 0;
        }

        .section-title {
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        /* Reason box */
        .reason {
            border: 1px solid black;
            padding: 5px;
            min-height: 50px;
            margin-top: 5px;
            word-wrap: break-word;
        }

        /* Signatures table */
        .avis-table th,
        .avis-table td {
            height: 80px;
        }

        .rtl { 
            direction: rtl !important; 
            text-align: right !important;
            unicode-bidi: embed !important;
            font-family: "Amiri", "DejaVu Sans", sans-serif !important;
        }
    </style>
</head>

<body>

    <!-- Background -->
    <img src="{{ public_path('images/background.png') }}" class="background">

    <div class="content">

        <!-- Reference -->
        <div class="top-ref">Ref : Form-Apogees</div>

        <!-- Title and Subtitle -->
        <div class="title">Demande d’inscription administrative à une année antérieure</div>
        <div class="subtitle">(Cycle Doctorat)</div>

        <!-- Top info table -->
        <table class="info-table">
            <tr>
                <td><strong>Etablissement :</strong> {{ $data['etbl'] }}</td>
                <td style="text-align: right;">
                    <strong>Date de la demande :</strong> {{ $data['dateDM'] }}
                </td>
            </tr>
        </table>

        <!-- CED -->
        <p><strong>CED :</strong> {{ $data['ced'] }}</p>

        <!-- Nature de la demande & Année d’inscription concernée -->
        <p><strong>Nature de la demande :</strong> {{ $data['nrtDM'] }}</p>
        <p><strong>Année d’inscription concernée :</strong> {{ $data['aneINS'] }}</p>

        <!-- Doctorant Heading -->
        <table>
            <!-- Header: Doctorant / طالب الدكتوراه -->
            <tr class="header-row">
                <th colspan="3">DOCTORANT / <span class="rtl">طالب الدكتوراه</span></th>
            </tr>
            <!-- Row for Nom et Prénom -->
            <tr>
                <td><strong>Nom et Prénom</strong></td>
                <td>{{ $data['nomPrenom'] }}</td>
                <td class="rtl" ><strong> الاسم العائلي والشخصي</strong></td>
            </tr>
            <!-- Row for Date de la 1ère inscription -->
            <tr>
                <td><strong>Date de la 1ère inscription</strong></td>
                <td>{{ $data['date1Ins'] }}</td>
                <td class="rtl"><strong>سنة التسجيل في الدكتوراه</strong></td>
            </tr>
            <!-- Row for CIN -->
            <tr>
                <td><strong>CIN</strong></td>
                <td>{{ $data['CIN'] }}</td>
                <td class="rtl"><strong>رقم بطاقة التعريف الوطنية</strong></td>
            </tr>
            <!-- Row for CNE -->
            <tr>
                <td><strong>CNE</strong></td>
                <td>{{ $data['CNE'] }}</td>
                <td class="rtl"><strong>الرقم الوطني للطالب</strong></td>
            </tr>
            <!-- Row for N Apogee -->
            <tr>
                <td><strong>N Apogee</strong></td>
                <td>{{ $data['NumApogee'] }}</td>
                <td class="rtl"><strong>رقم أبوجي</strong></td>
            </tr>
            <!-- Row for Tel -->
            <tr>
                <td><strong>Tel</strong></td>
                <td>{{ $data['tel'] }}</td>
                <td class="rtl"><strong>رقم الهاتف</strong></td>
            </tr>
            <!-- Row for Email Institutionnel -->
            <tr>
                <td><strong>Email Institutionnel</strong></td>
                <td>{{ $data['email'] }}</td>
                <td class="rtl"><strong>البريد الإلكتروني المؤسساتي</strong></td>
            </tr>
            <!-- Row for Formation Doctorale -->
            <tr>
                <td><strong>Formation Doctorale</strong></td>
                <td>{{ $data['FormationDoctorale'] }}</td>
                <td class="rtl"><strong>التكوين في الدكتوراه</strong></td>
            </tr>
            <!-- Row for Directeur de Thèse -->
            <tr>
                <td><strong>Directeur de Thèse</strong></td>
                <td>{{ $data['DirThese'] }}</td>
                <td class="rtl"><strong>الأستاذ المشرف</strong></td>
            </tr>
            <!-- Row for Structure de Recherche -->
            <tr>
                <td><strong>Structure de Recherche</strong></td>
                <td>{{ $data['StructureRecherche'] }}</td>
                <td class="rtl"><strong>بنية البحث</strong></td>
            </tr>
        </table>
        <!-- Signatures -->
        <h3 style="margin-top: 15px; margin-bottom:5px;">Avis et signature</h3>
        <table class="avis-table">
            <thead>
                <tr>
                    <th>Directeur de Thèse</th>
                    <th>Directeur du Centre d’Études Doctorales</th>
                    <th>Avis du Chef d’établissement</th>
                    <th>Avis du Président de l’Université</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="height:100px;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </div>

</body>

</html>