<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- Barra de navegación -->
    <nav class="bg-white/80 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-green-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <a href="{{ route('index') }}" class="flex items-center gap-3 group">
                    <img class="h-10 w-auto transition-transform group-hover:scale-110"
                        src="{{ asset('img/Logo-FET.png') }}" alt="Logo Biblioteca FET" />
                    <span
                        class="text-green-600 font-extrabold text-xl sm:text-2xl tracking-wide group-hover:text-green-800 transition-colors">Biblioteca
                        FET</span>
                </a>

                <!-- Navegación escritorio -->
                <div class="hidden sm:flex space-x-8 text-green-700 font-semibold text-lg items-center">
                    {{ $barraDeNavegacion }}
                </div>

                <!-- Botón menú móvil -->
                <div class="sm:hidden flex items-center">
                    <button id="navbar-mobile-menu-button" aria-label="Toggle menu"
                        class="inline-flex items-center justify-center p-2 rounded-md text-green-600 hover:bg-green-100 hover:text-green-800 focus:outline-none focus:ring-2 focus:ring-green-600 transition">
                        <svg class="block h-6 w-6 transition-transform transform-gpu group-hover:scale-110"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="hidden h-6 w-6 transition-transform transform-gpu group-hover:scale-110"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menú móvil -->
        <div class="sm:hidden hidden bg-white/90 backdrop-blur rounded-b-xl border-t border-green-100 shadow-inner transition-all duration-300"
            id="navbar-mobile-menu">
            <div class="px-4 pt-4 pb-6 space-y-4 text-green-700 font-semibold text-lg">
                {{ $barraDeNavegacion }}
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    {{ $slot }}

    <footer class="bg-green-600 text-white py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <h4 class="text-3xl font-extrabold tracking-tight">Biblioteca FET</h4>
                <p class="mt-2 text-green-200 max-w-xs">
                    Tu espacio de aprendizaje y exploración. Descubre, lee y crece con nosotros.
                </p>
            </div>
            <nav class="flex flex-wrap justify-center gap-6 text-green-200 font-semibold">
                {{ $barraDeNavegacionInferior }}
            </nav>
        </div>
        <div class="mt-6 text-center text-green-300 text-sm select-none">
            &copy; 2025 Biblioteca FET. Todos los derechos reservados.
        </div>
    </footer>

    <script>
        // Toggle navbar móvil
        document.addEventListener('DOMContentLoaded', () => {
            const button = document.getElementById('navbar-mobile-menu-button');
            const menu = document.getElementById('navbar-mobile-menu');
            const icons = button.querySelectorAll('svg');

            button.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                icons.forEach(icon => icon.classList.toggle('hidden'));
            });
        });
    </script>

</body>

</html>
