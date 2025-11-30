@extends('layouts')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="glass-card rounded-4 p-4 mb-4 slide-in position-relative overflow-hidden">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="text-white fw-bold mb-1">Créer un Compte</h2>
                        <p class="text-white-50 mb-0">Ajouter un nouveau compte bancaire</p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="glass-card rounded-4 p-5 slide-in position-relative overflow-hidden" style="animation-delay: 0.2s;">
                <form action="{{ route('comptes.store') }}" method="POST">
                    @csrf

                    <div class="row g-4">
                        <!-- Client Selection -->
                        <div class="col-12">
                            <label class="form-label text-white fw-semibold mb-2">Client</label>
                            <select name="user_id" class="form-control form-control-glass" required>
                                <option value="" class="text-dark">-- Sélectionner un client --</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" class="text-dark">
                                        {{ $client->name }} {{ $client->prenom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- RIB -->
                        <div class="col-12">
                            <label class="form-label text-white fw-semibold mb-2">RIB</label>
                            <input type="text" name="rib" class="form-control form-control-glass" placeholder="Ex: FR76..." required>
                        </div>

                        <!-- Solde Initial -->
                        <div class="col-12">
                            <label class="form-label text-white fw-semibold mb-2">Solde Initial</label>
                            <div class="input-group">
                                <input type="number" name="solde" class="form-control form-control-glass" step="0.01" required>
                                <span class="input-group-text form-control-glass border-0">DH</span>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-3 mt-5">
                        <button type="submit" class="btn-modern flex-grow-1 border-0">
                            Créer le Compte
                        </button>
                        <a href="{{ route('comptes.index') }}" class="btn btn-outline-light rounded-pill px-4 py-2">
                            Retour
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
