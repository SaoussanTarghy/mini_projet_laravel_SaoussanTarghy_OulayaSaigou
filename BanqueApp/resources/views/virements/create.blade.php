@extends('layouts')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="glass-card rounded-4 p-4 mb-4 slide-in position-relative overflow-hidden">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="text-white fw-bold mb-1">Effectuer un Virement</h2>
                        <p class="text-white-50 mb-0">Transférez de l'argent entre comptes</p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="glass-card rounded-4 p-5 slide-in position-relative overflow-hidden" style="animation-delay: 0.2s;">
                <form action="{{ route('virements.store') }}" method="POST">
                    @csrf

                    <div class="row g-4">
                        <!-- Compte Émetteur -->
                        <div class="col-12">
                            <label class="form-label text-white fw-semibold mb-2">Compte Émetteur</label>
                            <select name="compte_emetteur_id" class="form-control form-control-glass" required>
                                <option value="" class="text-dark">-- Sélectionner le compte source --</option>
                                @foreach ($comptes as $c)
                                    <option value="{{ $c->id }}" class="text-dark">
                                        {{ $c->rib }} — {{ $c->user->name }} {{ $c->user->prenom }} ({{ $c->solde }} DH)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Compte Récepteur -->
                        <div class="col-12">
                            <label class="form-label text-white fw-semibold mb-2">Compte Récepteur</label>
                            <select name="compte_recepteur_id" class="form-control form-control-glass" required>
                                <option value="" class="text-dark">-- Sélectionner le compte destination --</option>
                                @foreach ($comptes as $c)
                                    <option value="{{ $c->id }}" class="text-dark">
                                        {{ $c->rib }} — {{ $c->user->name }} {{ $c->user->prenom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Montant -->
                        <div class="col-12">
                            <label class="form-label text-white fw-semibold mb-2">Montant</label>
                            <div class="input-group">
                                <input type="number" name="montant" step="0.01" class="form-control form-control-glass" required>
                                <span class="input-group-text form-control-glass border-0">DH</span>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-3 mt-5">
                        <button type="submit" class="btn-modern flex-grow-1 border-0">
                            Effectuer le Virement
                        </button>
                        <a href="{{ route('virements.index') }}" class="btn btn-outline-light rounded-pill px-4 py-2">
                            Retour
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
