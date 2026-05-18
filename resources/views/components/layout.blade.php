<!DOCTYPE html>
<html lang="pt-BR" data-theme="lofi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - GMTask' : 'GMTask' }}</title>
    <link rel="preconnect" href="<https://fonts.bunny.net>">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
<!-- Navigation Bar -->
<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Left side - Logo/Brand  -->
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center">
                    <span class="text-2xl font-bold text-blue-600">GMTask</span>
                </a>
            </div>

            <!-- Right side - Auth buttons -->
            <div class="flex items-center space-x-4">
                @auth
                    <span class="text-gray-700">{{ auth()->user()->name }} </span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-gray-700 hover:text-gray-900 transition hover:cursor-pointer">
                            Log Out
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-gray-900 transition font-medium">
                        Entrar
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                        Cadastre-se
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="py-8">
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center py-6 mt-12">
    <p>&copy; 2026 GMTask. Todos os direitos reservados.</p>
</footer>
</body>
</html>
