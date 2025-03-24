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
            padding: 35mm 20mm 20mm;
            text-align: center;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 210mm;
            height: 297mm;
            z-index: -1;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }


        /* Make tables completely invisible but maintain structure */
         /* Remove borders for tables */
         .inline-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .inline-table td {
            padding: 5px;
            text-align: left;
            width: 50%;
            border: none; /* No border */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            border: 1px solid black;
            text-align: center;
        }
         /* Formatting for compact text layout */
        .info-block {
            width: 100%;
            text-align: left;
            margin-bottom: 3px; /* Smaller spacing between lines */
        }
       

    </style>
</head>
<body>

    <img src="{{ public_path('images/background.png') }}" class="background">

    <h2 class="title">Demande d'insertion ou modification d'un résultat des années antérieures (Par Module)</h2>

    <!-- First Row: Etablissement & Date de la demande -->
    <table class="inline-table" style="border: none; border-collapse: collapse;">
    <tr>
        <td style="border: none;"><strong>Etablissement:</strong> {{ $data['etbl'] }}</td>
        <td style="border: none;"><strong>Date de la demande:</strong> {{ $data['dateDM'] }}</td>
    </tr>
    </table>
    <!-- Second Row: Cycle & Filière -->
    <table class="inline-table" class="inline-table" style="border: none; border-collapse: collapse;" >
        <tr>
            <td style="border: none;"><strong>Cycle:</strong> {{ $data['typ'] }}</td>
            <td style="border: none;"><strong>Filière:</strong> {{ $data['flr'] }}</td>
        </tr>
    </table>

    <!-- Third Row: Nature de la demande & Année universitaire concernée -->
    <table class="inline-table" class="inline-table" style="border: none; border-collapse: collapse;">
        <tr>
            <td style="border: none;"><strong>Nature de la demande:</strong> {{ $data['nrtDM'] }}</td>
            <td style="border: none;"><strong>Année universitaire concernée:</strong> {{ $data['AnneeCon'] }}</td>
        </tr>
    </table>

    <!-- Fourth Row: Semestre & Nom du Module -->
    <table class="inline-table" class="inline-table" style="border: none; border-collapse: collapse;">
        <tr>
            <td style="border: none;"><strong>Semestre:</strong> {{ $data['Semestre'] }}</td>
            <td style="border: none;"><strong>Nom du Module:</strong> {{ $data['module'] }}</td>
        </tr>
    </table>


    <h3 style="text-align: left;">Liste des Étudiants</h3>
    <table>
        <thead>
            <tr>
                <th>Numéro APOGEE</th>
                <th>Nom & Prénom</th>
                <th>Session</th>
                <th>Note Initiale</th>
                <th>Note Corrigée</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['students'] as $student)
                <tr>
                    <td>{{ $student['apogee'] }}</td>
                    <td>{{ $student['name'] }}</td>
                    <td>{{ $student['session'] }}</td>
                    <td>{{ $student['note_initiale'] }}</td>
                    <td>{{ $student['note_corrigee'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="inline-table" class="inline-table" style="width: 100%;">
    <tr>
        <td style="width: 100%;">
            <strong>Raison du retard :</strong>
            <div> {{ $data['raso'] }} </div> 
        </td>
    </tr>
</table>

    <!-- Table for Signatures -->
    <table>
        <thead>
            <tr>
                <th>Responsable du Module:{{ $data['ResP'] }}</th>
                <th>Coordinateur de la Filière : {{ $data['Cordi'] }}</th>
                <th>Avis du Responsable Administratif</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="height: 80px;"></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th>Avis du Chef d'établissement</th>
                <th>Avis du Président de l'Université</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="height: 80px;"></td>
                <td></td>
            </tr>
        </tbody>
    </table>

</body>
</html>
