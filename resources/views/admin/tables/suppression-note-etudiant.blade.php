<div class="block block-rounded mt-4">
    <div class="block-header block-header-default">
        <h3 class="block-title">Demandes de Suppression de Note</h3>
    </div>
    <div class="block-content block-content-full overflow-x-auto">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                    <th>Email de Demandeur</th>
                    <th>Nom & Prénom</th>
                    <th>Filière</th>
                    <th>Cycle</th>
                    <th>Année</th>
                    <th>Etablissement</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppressionNoteEtudiantDemands as $demand)
                    <tr>
                        <td>{{ $demand->user_email }}</td>
                        <td>{{ $demand->NomPrenom }}</td>
                        <td>{{ $demand->filiere }}</td>
                        <td>{{ $demand->cycle }}</td>
                        <td>{{ $demand->annee_inscription }}</td>
                        <td>{{ $demand->etablissement }}</td>
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