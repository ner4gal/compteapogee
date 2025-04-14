<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Apogee Users</h3>
    </div>
    <div class="block-content block-content-full overflow-x-auto">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                    <th>Nom & Prenom</th>
                    <th>Email</th>
                    <th>Etablissement</th>
                    <th>Privilèges APOGEE</th>
                    <th>Centre Gestion</th>
                    <th>Centre Traitement</th>
                    <th>Inscription Pédagogique</th>
                    <th>Incompatibilité</th>
                    <th>Statut</th>
                    <th>Registered At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->nom_prenom }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->etablissement }}</td>
                        <td>
                            @foreach($user->privileges_apogee ?? [] as $item)
                                <span class="badge bg-primary text-white me-1">{{ $item }}@if(!$loop->last),@endif</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($user->centre_gestion ?? [] as $item)
                                <span class="badge bg-info text-white me-1">{{ $item }}@if(!$loop->last),@endif</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($user->centre_traitement ?? [] as $item)
                                <span class="badge bg-info text-white me-1">{{ $item }}@if(!$loop->last),@endif</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($user->centre_inscription_pedagogique ?? [] as $item)
                                <span class="badge bg-info text-white me-1">{{ $item }}@if(!$loop->last),@endif</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($user->centre_incompatibilite ?? [] as $item)
                                <span class="badge bg-info text-white me-1">{{ $item }}@if(!$loop->last),@endif</span>
                            @endforeach
                        </td>
                        <td>
                            <span class="badge @if($user->acces_apogee_statut === 'Accès accordé') bg-success @elseif($user->acces_apogee_statut === 'Accès refusé') bg-danger @else bg-warning text-dark @endif">
                                {{ $user->acces_apogee_statut }}
                            </span>
                        </td>
                        <td>{{ optional($user->created_at)->format('d/m/Y') ?? '—' }}</td>
                        <td>
                            <div class="btn-group mb-1">
                                <button type="button" class="btn btn-sm btn-alt-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                    Changer statut
                                </button>
                                <div class="dropdown-menu">
                                    <form method="POST" action="{{ route('admin.update-status', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="status" value="Traitement en cours" class="dropdown-item @if($user->acces_apogee_statut === 'Traitement en cours') active @endif">
                                            Traitement en cours
                                        </button>
                                        <button type="submit" name="status" value="Accès accordé" class="dropdown-item @if($user->acces_apogee_statut === 'Accès accordé') active @endif">
                                            Accès accordé
                                        </button>
                                        <button type="submit" name="status" value="Accès refusé" class="dropdown-item @if($user->acces_apogee_statut === 'Accès refusé') active @endif">
                                            Accès refusé
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <form action="{{ route('admin.apogee-users.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-alt-danger">
                                    <i class="fa fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>