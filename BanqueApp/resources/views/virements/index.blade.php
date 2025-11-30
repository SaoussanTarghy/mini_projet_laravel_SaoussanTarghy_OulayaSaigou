@extends('layouts')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="glass-card rounded-4 p-4 mb-4 slide-in position-relative overflow-hidden">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="text-white fw-bold mb-2">Historique des Virements</h2>
                <p class="text-white-50 mb-0">Consultez les transactions effectuées</p>
            </div>
            <a href="{{ route('virements.create') }}" class="btn-modern">
                Nouveau Virement
            </a>
        </div>
    </div>

    <!-- Transfers Table -->
    <div class="glass-card rounded-4 p-4 slide-in" style="animation-delay: 0.2s;">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="border-bottom border-white border-opacity-10">
                        <th class="text-white fw-semibold py-3">Émetteur</th>
                        <th class="text-white fw-semibold py-3">Récepteur</th>
                        <th class="text-white fw-semibold py-3">Montant</th>
                        <th class="text-white fw-semibold py-3">Date</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($virements as $v)
                    <tr class="border-bottom border-white border-opacity-10">
                        <td>
                            <div class="d-flex flex-column">
                                <span class="text-white fw-semibold">{{ $v->compteEmetteur->rib }}</span>
                                <span class="text-white-50 small">{{ $v->compteEmetteur->user->name }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="text-white fw-semibold">{{ $v->compteRecepteur->rib }}</span>
                                <span class="text-white-50 small">{{ $v->compteRecepteur->user->name }}</span>
                            </div>
                        </td>
                        <td class="text-white fw-bold">{{ number_format($v->montant, 2) }} DH</td>
                        <td class="text-white-50">{{ $v->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($virements->isEmpty())
            <div class="text-center py-5">
                <p class="text-white-50">Aucun virement effectué</p>
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