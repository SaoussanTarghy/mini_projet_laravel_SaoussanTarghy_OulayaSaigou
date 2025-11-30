@extends('layouts')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="glass-card rounded-4 p-4 mb-4 slide-in position-relative overflow-hidden">
                <div class="pink-glow-line"></div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="icon-modern rounded-circle p-3 me-3 float-animation">
                            <span class="fs-3">👤</span>
                        </div>
                        <div>
                            <h2 class="text-white fw-bold mb-1">Détails du Client</h2>
                            <p class="text-white-50 mb-0">Informations complètes et comptes bancaires</p>
                        </div>
                    </div>
                    <a href="{{ route('clients.index') }}" class="btn-modern-secondary">
                        ↩️ Retour
                    </a>
                </div>
            </div>

            <div class="row g-4">
                <!-- Client Information Card -->
                <div class="col-lg-6">
                    <div class="glass-card rounded-4 p-4 h-100 slide-in position-relative overflow-hidden" style="animation-delay: 0.1s;">
                        <div class="pink-glow-line-small"></div>
                        <h4 class="text-white fw-semibold mb-4">
                            <span class="me-2">📋</span> Informations Personnelles
                        </h4>
                        
                        <div class="d-flex flex-column gap-3">
                            <!-- ID -->
                            <div class="info-item">
                                <div class="text-white-50 small mb-1">ID Client</div>
                                <div class="text-white fw-bold fs-5">#{{ $client->id }}</div>
                            </div>

                            <!-- Nom Complet -->
                            <div class="info-item">
                                <div class="text-white-50 small mb-1">Nom Complet</div>
                                <div class="text-white fw-semibold fs-5">
                                    {{ $client->name }} {{ $client->prenom }}
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="info-item">
                                <div class="text-white-50 small mb-1">Email</div>
                                <div class="text-white fw-semibold">{{ $client->email }}</div>
                            </div>

                            <!-- Role (if exists) -->
                            @if(isset($client->role))
                            <div class="info-item">
                                <div class="text-white-50 small mb-1">Rôle</div>
                                <div class="text-white fw-semibold">
                                    @if($client->role == 'admin')
                                        <span class="badge-modern badge-admin">⭐ Admin</span>
                                    @else
                                        <span class="badge-modern badge-client">👤 Client</span>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('clients.edit', $client->id) }}" 
                               class="btn-modern-primary flex-grow-1">
                                ✏️ Modifier
                            </a>
                            <form action="{{ route('clients.destroy', $client->id) }}" 
                                  method="POST" 
                                  class="flex-grow-1"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
                                @csrf @method('DELETE')
                                <button class="btn-modern-danger w-100">
                                    🗑️ Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Bank Accounts Card -->
                <div class="col-lg-6">
                    <div class="glass-card rounded-4 p-4 h-100 slide-in position-relative overflow-hidden" style="animation-delay: 0.2s;">
                        <div class="pink-glow-line-small"></div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="text-white fw-semibold mb-0">
                                <span class="me-2">💳</span> Comptes Bancaires
                            </h4>
                            <span class="badge-modern badge-count">
                                {{ $client->comptes->count() }} compte(s)
                            </span>
                        </div>

                        @if($client->comptes->isEmpty())
                            <div class="text-center py-5">
                                <div class="icon-modern rounded-circle d-inline-flex p-4 mb-3">
                                    <span class="fs-1">💰</span>
                                </div>
                                <p class="text-white-50 mb-3">Aucun compte bancaire</p>
                                <a href="{{ route('comptes.create') }}" 
                                   class="btn-modern-primary">
                                    + Créer un compte
                                </a>
                            </div>
                        @else
                            <div class="d-flex flex-column gap-3">
                                @foreach ($client->comptes as $compte)
                                <div class="account-card position-relative overflow-hidden">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="flex-grow-1">
                                            <div class="text-white-50 small mb-1">RIB</div>
                                            <div class="text-white fw-bold mb-2 font-monospace">
                                                {{ $compte->rib }}
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="text-white-50 small">Solde:</span>
                                                <span class="text-white fw-bold fs-5">
                                                    {{ number_format($compte->solde, 2, ',', ' ') }} DH
                                                </span>
                                            </div>
                                        </div>
                                        <div class="icon-modern rounded-circle p-2">
                                            <span>💳</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Decorative pink line -->
                                    <div class="account-glow"></div>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Pink glowing lines */
    .pink-glow-line {
        position: absolute;
        top: -2px;
        left: 20%;
        width: 60%;
        height: 3px;
        background: linear-gradient(90deg, 
            transparent 0%, 
            rgba(236, 72, 153, 0.8) 50%, 
            transparent 100%);
        box-shadow: 0 0 20px rgba(236, 72, 153, 0.8),
                    0 0 40px rgba(236, 72, 153, 0.4);
        animation: lineGlow 3s ease-in-out infinite;
    }

    .pink-glow-line-small {
        position: absolute;
        top: -2px;
        left: 10%;
        width: 40%;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent 0%, 
            rgba(236, 72, 153, 0.6) 50%, 
            transparent 100%);
        box-shadow: 0 0 15px rgba(236, 72, 153, 0.6);
        animation: lineGlow 3s ease-in-out infinite;
    }

    @keyframes lineGlow {
        0%, 100% {
            opacity: 0.6;
            transform: translateX(-10px);
        }
        50% {
            opacity: 1;
            transform: translateX(10px);
        }
    }

    /* Modern icon style */
    .icon-modern {
        background: linear-gradient(135deg, rgba(236, 72, 153, 0.2), rgba(219, 39, 119, 0.2));
        border: 1px solid rgba(236, 72, 153, 0.3);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    /* Info items */
    .info-item {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(236, 72, 153, 0.2);
        border-radius: 12px;
        padding: 16px 20px;
        transition: all 0.3s ease;
    }

    .info-item:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(236, 72, 153, 0.4);
        transform: translateX(5px);
    }

    /* Modern badges */
    .badge-modern {
        padding: 8px 16px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .badge-admin {
        background: linear-gradient(135deg, rgba(251, 191, 36, 0.3), rgba(245, 158, 11, 0.3));
        border: 1px solid rgba(251, 191, 36, 0.4);
        color: rgb(251, 191, 36);
    }

    .badge-client {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.3), rgba(37, 99, 235, 0.3));
        border: 1px solid rgba(59, 130, 246, 0.4);
        color: rgb(147, 197, 253);
    }

    .badge-count {
        background: linear-gradient(135deg, rgba(236, 72, 153, 0.3), rgba(219, 39, 119, 0.3));
        border: 1px solid rgba(236, 72, 153, 0.4);
        color: rgb(244, 114, 182);
    }

    /* Account card */
    .account-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(236, 72, 153, 0.2);
        border-radius: 16px;
        padding: 20px;
        transition: all 0.3s ease;
        position: relative;
    }

    .account-card:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(236, 72, 153, 0.4);
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(236, 72, 153, 0.3);
    }

    .account-glow {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, 
            transparent 0%, 
            rgba(236, 72, 153, 0.6) 50%, 
            transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .account-card:hover .account-glow {
        opacity: 1;
    }

    .font-monospace {
        font-family: 'Courier New', monospace;
        letter-spacing: 1px;
    }

    /* Modern buttons */
    .btn-modern-primary {
        background: linear-gradient(135deg, rgba(236, 72, 153, 0.4), rgba(219, 39, 119, 0.4));
        color: white;
        padding: 12px 24px;
        border-radius: 50px;
        border: 1px solid rgba(236, 72, 153, 0.5);
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-modern-primary:hover {
        background: linear-gradient(135deg, rgba(236, 72, 153, 0.6), rgba(219, 39, 119, 0.6));
        border: 1px solid rgba(236, 72, 153, 0.7);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(236, 72, 153, 0.5);
    }

    .btn-modern-secondary {
        background: rgba(255, 255, 255, 0.05);
        color: white;
        padding: 12px 24px;
        border-radius: 50px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-modern-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
        transform: translateY(-2px);
    }

    .btn-modern-danger {
        background: rgba(239, 68, 68, 0.2);
        color: rgb(252, 165, 165);
        padding: 12px 24px;
        border-radius: 50px;
        border: 1px solid rgba(239, 68, 68, 0.4);
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-modern-danger:hover {
        background: rgba(239, 68, 68, 0.3);
        border: 1px solid rgba(239, 68, 68, 0.6);
        color: rgb(254, 202, 202);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
    }
</style>
@endsection