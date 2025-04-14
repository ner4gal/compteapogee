<div class="block block-rounded mt-4">
    <div class="block-header block-header-default">
        <h3 class="block-title">Demandes d'Inscription à une Année Antérieure</h3>
    </div>
    <div class="block-content block-content-full overflow-x-auto">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom & Prénom</th>
                    <th>Email</th>
                    <th>Année Demandée</th>
                    <th>Filière</th>
                    <th>Semestre</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inscAnneeAnterieureDemands as $demand)
                    <tr>
                        <td>{{ $demand->id }}</td>
                        <td>{{ $demand->nom_prenom }}</td>
                        <td>{{ $demand->user_email }}</td>
                        <td>{{ $demand->annee_universitaire }}</td>
                        <td>{{ $demand->filiere }}</td>
                        <td>{{ $demand->semestre }}</td>
                        <td>
                            <span class="badge @if($demand->statut === 'Traité') bg-success @elseif($demand->statut === 'Rejeté') bg-danger @else bg-warning text-dark @endif">
                                {{ $demand->statut ?? 'En attente' }}
                            </span>
                        </td>
                        <td>
                            <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette demande ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-alt-danger">
                                    <i class="fa fa-trash-alt"></i> Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>