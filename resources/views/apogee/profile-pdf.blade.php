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
            text-align: left;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 210mm;
            height: 297mm;
            z-index: -1;
        }

        h2.title {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .info-table, .badge-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        .info-table td, .info-table th {
            padding: 8px;
            border: none;
            text-align: left;
        }

        .badge {
            display: inline-block;
            background: #eee;
            padding: 2px 6px;
            margin: 2px;
            border-radius: 4px;
            font-size: 11px;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 4px;
        }

        .border-table {
            width: 100%;
            border-collapse: collapse;
        }

        .border-table td, .border-table th {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

    </style>
</head>
<body>

    {{-- Optional background --}}
    <img src="{{ public_path('images/background.png') }}" class="background">

    <h2 class="title">Fiche Profil Utilisateur APOGÉE</h2>

    <table class="info-table">
        <tr>
            <th>Etablissement :</th>
            <td>{{ $apogeeUser->etablissement }}</td>
        </tr>
        <tr>
            <th>Nom & Prénom :</th>
            <td>{{ $apogeeUser->nom_prenom }}</td>
        </tr>
        <tr>
            <th>Email :</th>
            <td>{{ $apogeeUser->email }}</td>
        </tr>
        <tr>
            <th>Fonction :</th>
            <td>{{ $apogeeUser->fonction }}</td>
        </tr>
        <tr>
            <th>Téléphone :</th>
            <td>{{ $apogeeUser->telephone }}</td>
        </tr>
        <tr>
            <th>Nom d’utilisateur APOGÉE :</th>
            <td>{{ $apogeeUser->nom_utilisateur_apogee }}</td>
        </tr>
        <tr>
            <th>Adresse MAC :</th>
            <td>{{ $apogeeUser->mac_address }}</td>
        </tr>
    </table>

    <div class="section-title">Centre de Gestion</div>
    @foreach($apogeeUser->centre_gestion ?? [] as $item)
        <span class="badge">{{ $item }}</span>
    @endforeach

    <div class="section-title">Centre de Traitement</div>
    @foreach($apogeeUser->centre_traitement ?? [] as $item)
        <span class="badge">{{ $item }}</span>
    @endforeach

    <div class="section-title">Centre d'inscription pédagogique</div>
    @foreach($apogeeUser->centre_inscription_pedagogique ?? [] as $item)
        <span class="badge">{{ $item }}</span>
    @endforeach

    <div class="section-title">Centre d'incompatibilité</div>
    @foreach($apogeeUser->centre_incompatibilite ?? [] as $item)
        <span class="badge">{{ $item }}</span>
    @endforeach

    <div class="section-title">Privilèges APOGÉE</div>
    @foreach($apogeeUser->privileges_apogee ?? [] as $item)
        <span class="badge">{{ $item }}</span>
    @endforeach

    <div class="section-title">Responsable APOGÉE</div>
    @forelse($apogeeUser->responsable_apogee_access ?? [] as $access)
        <span class="badge">{{ $access === 'T' ? 'T (Ouverture)' : 'A (Fermeture)' }}</span>
    @empty
        <span class="badge">Aucun</span>
    @endforelse

    <table class="info-table" style="margin-top: 20px;">
        <tr>
            <th>Date de création :</th>
            <td>{{ $apogeeUser->created_at->format('d/m/Y H:i') }}</td>
        </tr>
    </table>

</body>
</html>
