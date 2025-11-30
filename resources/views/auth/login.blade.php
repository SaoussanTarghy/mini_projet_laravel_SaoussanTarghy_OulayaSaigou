<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body class="flex justify-center items-center min-h-screen">
    <style>
        body {
            background-image: url("{{ asset('images/back.jpg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
    </style>

    <div class="w-full max-w-md glass-card rounded-2xl p-8 slide-in">

        <h2 class="text-3xl font-bold text-center text-white mb-6">Connexion</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 glass-effect text-red-200 border border-red-400/30 rounded-lg">
                <ul class="list-disc ml-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-white">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full px-4 py-2 glass-effect text-white placeholder-gray-300 border border-white/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1 text-white">Mot de passe</label>
                <input type="password" name="password"
                       class="w-full px-4 py-2 glass-effect text-white placeholder-gray-300 border border-white/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                       required>
            </div>

            <button type="submit"
                    class="w-full btn-modern font-semibold py-2 rounded-lg transition mt-4">
                Se connecter
            </button>
        </form>

    </div>

</body>
</html>
