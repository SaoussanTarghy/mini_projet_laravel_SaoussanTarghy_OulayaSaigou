@extends('layouts')

@section('content')
<div class="container py-5">
    <!-- Header with glass effect -->
    <div class="glass-card rounded-4 p-4 mb-4 slide-in position-relative overflow-hidden">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="text-white fw-bold mb-2">Liste des Clients</h2>
                <p class="text-white-50 mb-0">Gérez vos clients et leurs informations</p>
            </div>
            <a href="{{ route('clients.create') }}" class="btn-modern">
                Nouveau Client
            </a>
        </div>
    </div>

    <!-- Clients Table Card -->
    <div class="glass-card rounded-4 p-4 slide-in" style="animation-delay: 0.2s;">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="border-bottom border-white border-opacity-10">
                        <th class="text-white fw-semibold py-3">ID</th>
                        <th class="text-white fw-semibold py-3">Nom Complet</th>
                        <th class="text-white fw-semibold py-3">Email</th>
                        <th class="text-white fw-semibold py-3 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($clients as $client)
                    <tr class="border-bottom border-white border-opacity-10">
                        <td class="text-white-50 fw-bold">#{{ $client->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="icon-glass rounded-circle p-2 me-3">
                                    <span class="text-white fw-bold">{{ substr($client->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="text-white fw-semibold">{{ $client->name }} {{ $client->prenom }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-white-50">{{ $client->email }}</td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('clients.show', $client->id) }}" 
                                   class="btn btn-sm glass-effect text-white px-3 rounded-pill"
                                   title="Détails">
                                    Voir
                                </a>
                                <a href="{{ route('clients.edit', $client->id) }}" 
                                   class="btn btn-sm glass-effect text-warning px-3 rounded-pill"
                                   title="Modifier">
                                    Modifier
                                </a>
                                <form action="{{ route('clients.destroy', $client->id) }}" 
                                      method="POST" 
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm glass-effect text-danger px-3 rounded-pill" title="Supprimer">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($clients->isEmpty())
            <div class="text-center py-5">
                <div class="text-white-50 fs-1 mb-3">0</div>
                <p class="text-white-50">Aucun client enregistré pour le moment</p>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    .table tbody tr {
        transition: all 0.3s ease;
    }
    .table tbody tr:hover {
        background: rgba(255, 255, 255, 0.05);
        transform: scale(1.01);
    }
    .table {
        --bs-table-bg: transparent;
        --bs-table-color: white;
    }
</style>
@endsection