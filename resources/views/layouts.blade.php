<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        body {
            background-image: url("@yield('background', asset('images/back.jpg'))");
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Banque Laravel</a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('clients.index') }}">Clients</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('comptes.index') }}">Comptes</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('virements.index') }}">Virements</a></li>
            <li class="nav-item ms-2">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Déconnexion</button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-3">

    {{-- Messages succès --}}
    @if (session('success'))
        <div class="alert alert-success glass-effect text-white border-0">{{ session('success') }}</div>
    @endif

    {{-- Messages erreur --}}
    @if ($errors->any())
        <div class="alert alert-danger glass-effect text-white border-0">
            <ul class="m-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>