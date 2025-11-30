@extends('layouts')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="glass-card rounded-4 p-4 mb-4 slide-in position-relative overflow-hidden">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="text-white fw-bold mb-1">Ajouter un Client</h2>
                        <p class="text-white-50 mb-0">Créez un nouveau profil client</p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="glass-card rounded-4 p-5 slide-in position-relative overflow-hidden" style="animation-delay: 0.2s;">
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf 

                    <div class="row g-4">
                        <!-- Nom -->
                        <div class="col-md-6">
                            <label class="form-label text-white fw-semibold mb-2">Nom</label>
                            <input type="text" name="name" class="form-control form-control-glass" required>
                        </div>

                        <!-- Prénom -->
                        <div class="col-md-6">
                            <label class="form-label text-white fw-semibold mb-2">Prénom</label>
                            <input type="text" name="prenom" class="form-control form-control-glass" required>
                        </div>

                        <!-- Email -->
                        <div class="col-12">
                            <label class="form-label text-white fw-semibold mb-2">Email</label>
                            <input type="email" name="email" class="form-control form-control-glass" required>
                        </div>

                        <!-- Mot de passe -->
                        <div class="col-12">
                            <label class="form-label text-white fw-semibold mb-2">Mot de passe</label>
                            <input type="password" name="password" class="form-control form-control-glass" required>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-3 mt-5">
                        <button type="submit" class="btn-modern flex-grow-1 border-0">
                            Ajouter
                        </button>
                        <a href="{{ route('clients.index') }}" class="btn btn-outline-light rounded-pill px-4 py-2">
                            Retour
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
