<div class="block block-rounded mt-4">
    <div class="block-header block-header-default">
        <h3 class="block-title">Demandes de fermeture definitive de compte APOGEE</h3>
    </div>
    <div class="block-content block-content-full overflow-x-auto">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                    <th>Email de Demandeur</th>
                    <th>Nom & Prénom</th>
                    <th>Username APOGEE</th>
                    <th>Etablissement</th>
                    <th>Date</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($verrouillageCompteApogeeDemands as $demand)
                    <tr>
                        <td>{{ $demand->user_email }}</td>
                        <td>{{ $demand->nom_prenom }}</td>
                        <td>{{ $demand->username_apogee }}</td>
                        <td>{{ $demand->etablissement }}</td>
                        <td>{{ $demand->date_demande->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge @if($demand->statut === 'Traité' || $demand->statut === 'Approuvé') bg-success @elseif($demand->statut === 'Rejeté') bg-danger @else bg-warning text-dark @endif">
                                {{ $demand->statut ?? 'En attente' }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
