<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Banque</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }
        
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .slide-in {
            animation: slideIn 0.6s ease-out forwards;
        }

        .slide-in:nth-child(1) {
            animation-delay: 0.1s;
        }

        .slide-in:nth-child(2) {
            animation-delay: 0.2s;
        }

        .slide-in:nth-child(3) {
            animation-delay: 0.3s;
        }
        
        .glass-card {
            background: linear-gradient(135deg, 
                rgba(139, 0, 139, 0.15) 0%, 
                rgba(75, 0, 130, 0.15) 50%, 
                rgba(139, 0, 139, 0.15) 100%);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(199, 21, 133, 0.2);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.1), 
                transparent);
            transition: left 0.5s;
        }

        .glass-card:hover::before {
            left: 100%;
        }
        
        .glass-card:hover {
            background: linear-gradient(135deg, 
                rgba(139, 0, 139, 0.25) 0%, 
                rgba(75, 0, 130, 0.25) 50%, 
                rgba(139, 0, 139, 0.25) 100%);
            border: 1px solid rgba(199, 21, 133, 0.4);
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(139, 0, 139, 0.3);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .icon-glass {
            background: rgba(199, 21, 133, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(199, 21, 133, 0.3);
            transition: all 0.3s ease;
        }

        .glass-card:hover .icon-glass {
            background: rgba(199, 21, 133, 0.4);
            border: 1px solid rgba(199, 21, 133, 0.5);
            transform: scale(1.1) rotate(5deg);
        }

        .wave-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .wave-bottom svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 150px;
        }

        body {
            background-image: url("{{ asset('images/back.jpg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="bg-black min-h-screen relative overflow-x-hidden">

    <!-- Dashboard Title Header -->
    <div class="text-center py-16 relative z-10">
        <div class="absolute top-4 right-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="glass-card px-6 py-2 rounded-xl text-white font-medium hover:bg-white/10 transition-colors flex items-center gap-2">
                    <span>Déconnexion</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-4">
            Bienvenue dans l'application de Gestion Bancaire
        </h1>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 pb-20 relative z-10">
        <div class="max-w-6xl mx-auto">
            
            <!-- Three Cards on the Right -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Clients Card -->
                <a href="{{ route('clients.index') }}" class="glass-card rounded-3xl p-8 block group relative overflow-hidden slide-in opacity-0">
                    <div class="absolute top-6 left-6">
                        <span class="text-white text-sm font-medium tracking-wide" style="writing-mode: vertical-lr; transform: rotate(180deg);">
                            Clients
                        </span>
                    </div>
                    
                    <div class="flex flex-col justify-end h-full min-h-[400px] pt-20">
                        <div class="icon-glass w-14 h-14 rounded-2xl flex items-center justify-center mb-5 group-hover:shadow-lg group-hover:shadow-purple-500/50">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-purple-300 transition-colors">
                            Gestion des Clients
                        </h3>
                        <p class="text-gray-300 text-sm mb-6 leading-relaxed">
                            Ajouter, modifier, supprimer et afficher les clients avec une interface intuitive.
                        </p>
                        <div class="flex items-center text-purple-300 opacity-70 group-hover:opacity-100 transition-opacity">
                            <span class="text-sm mr-2 font-medium">Accéder</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Comptes Card -->
                <a href="{{ route('comptes.index') }}" class="glass-card rounded-3xl p-8 block group relative overflow-hidden slide-in opacity-0">
                    <div class="absolute top-6 left-6">
                        <span class="text-white text-sm font-medium tracking-wide" style="writing-mode: vertical-lr; transform: rotate(180deg);">
                            Comptes
                        </span>
                    </div>
                    
                    <div class="flex flex-col justify-end h-full min-h-[400px] pt-20">
                        <div class="icon-glass w-14 h-14 rounded-2xl flex items-center justify-center mb-5 group-hover:shadow-lg group-hover:shadow-purple-500/50">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-purple-300 transition-colors">
                            Gestion des Comptes
                        </h3>
                        <p class="text-gray-300 text-sm mb-6 leading-relaxed">
                            Créer et gérer les comptes bancaires avec facilité et sécurité.
                        </p>
                        <div class="flex items-center text-purple-300 opacity-70 group-hover:opacity-100 transition-opacity">
                            <span class="text-sm mr-2 font-medium">Accéder</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Virements Card -->
                <a href="{{ route('virements.index') }}" class="glass-card rounded-3xl p-8 block group relative overflow-hidden slide-in opacity-0">
                    <div class="absolute top-6 left-6">
                        <span class="text-white text-sm font-medium tracking-wide" style="writing-mode: vertical-lr; transform: rotate(180deg);">
                            Virements
                        </span>
                    </div>
                    
                    <div class="flex flex-col justify-end h-full min-h-[400px] pt-20">
                        <div class="icon-glass w-14 h-14 rounded-2xl flex items-center justify-center mb-5 group-hover:shadow-lg group-hover:shadow-purple-500/50">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-purple-300 transition-colors">
                            Gestion des Virements
                        </h3>
                        <p class="text-gray-300 text-sm mb-6 leading-relaxed">
                            Effectuer des virements entre comptes de manière rapide et sécurisée.
                        </p>
                        <div class="flex items-center text-purple-300 opacity-70 group-hover:opacity-100 transition-opacity">
                            <span class="text-sm mr-2 font-medium">Accéder</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

            </div>

        </div>
    </div>

    <!-- Wave Bottom Decoration -->
    <div class="wave-bottom">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" 
                  fill="rgba(139, 0, 139, 0.1)"></path>
        </svg>
    </div>

</body>
</html>