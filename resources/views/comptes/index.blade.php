@extends('layouts')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="glass-card rounded-4 p-4 mb-4 slide-in position-relative overflow-hidden">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="text-white fw-bold mb-2">Liste des Comptes</h2>
                <p class="text-white-50 mb-0">Gérez les comptes bancaires</p>
            </div>
            <a href="{{ route('comptes.create') }}" class="btn-modern">
                Nouveau Compte
            </a>
        </div>
    </div>

    <!-- Accounts Table -->
    <div class="glass-card rounded-4 p-4 slide-in" style="animation-delay: 0.2s;">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="border-bottom border-white border-opacity-10">
                        <th class="text-white fw-semibold py-3">ID</th>
                        <th class="text-white fw-semibold py-3">RIB</th>
                        <th class="text-white fw-semibold py-3">Solde</th>
                        <th class="text-white fw-semibold py-3">Client</th>
                        <th class="text-white fw-semibold py-3 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($comptes as $c)
                    <tr class="border-bottom border-white border-opacity-10">
                        <td class="text-white-50 fw-bold">#{{ $c->id }}</td>
                        <td class="text-white font-monospace">{{ $c->rib }}</td>
                        <td class="text-white fw-bold">{{ number_format($c->solde, 2) }} DH</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="icon-glass rounded-circle p-2 me-2">
                                    <span class="text-white small">{{ substr($c->user->name, 0, 1) }}</span>
                                </div>
                                <span class="text-white">{{ $c->user->name }} {{ $c->user->prenom }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('comptes.edit', $c->id) }}" 
                                   class="btn btn-sm glass-effect text-warning px-3 rounded-pill">
                                    Modifier
                                </a>
                                <form action="{{ route('comptes.destroy', $c->id) }}" 
                                      method="POST" 
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm glass-effect text-danger px-3 rounded-pill">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($comptes->isEmpty())
            <div class="text-center py-5">
                <p class="text-white-50">Aucun compte enregistré</p>
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