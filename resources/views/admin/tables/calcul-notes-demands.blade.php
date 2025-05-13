<div class="block block-rounded mt-4">
    <div class="block-header block-header-default">
        <h3 class="block-title">Calcul des Notes Demands</h3>
    </div>
    <div class="block-content block-content-full overflow-x-auto">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Etablissement</th>
                    <th>Date de la demande</th>
                    <th>Cycle</th>
                    <th>Filière</th>
                    <th>Année Concernée</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calculNotesDemands as $demand)
                    <tr>
                        <td>{{ $demand->user_email }}</td>
                        <td>{{ $demand->etablissement }}</td>
                        <td>{{ optional($demand->date_demande)->format('d/m/Y') ?? '—' }}</td>
                        <td>{{ $demand->cycle }}</td>
                        <td>{{ $demand->filiere }}</td>
                        <td>{{ $demand->annee_universitaire }}</td>
                        <td>
                            <span class="badge @if($demand->statut === 'Traité') bg-success @elseif($demand->statut === 'Rejeté') bg-danger @else bg-warning text-dark @endif">
                                {{ $demand->statut ?? 'En attente' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group mb-1">
                                <button type="button" class="btn btn-sm btn-alt-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                    Changer statut
                                </button>
                                <div class="dropdown-menu">
                                    <form method="POST" action="{{ route('admin.calcul-notes.update-status', $demand->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="status" value="En attente" class="dropdown-item @if($demand->statut === 'En attente') active @endif">
                                            En attente
                                        </button>
                                        <button type="submit" name="status" value="Traité" class="dropdown-item @if($demand->statut === 'Traité') active @endif">
                                            Traité
                                        </button>
                                        <button type="submit" name="status" value="Rejeté" class="dropdown-item @if($demand->statut === 'Rejeté') active @endif">
                                            Rejeté
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <form action="{{ route('admin.calcul-notes.destroy', $demand->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
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