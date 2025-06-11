<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Biblioteca FET</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    html {
        scroll-behavior: smooth;
    }
    body {
        margin: 0;
        overflow-x: hidden; /* Corrige el espacio lateral */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #d9f99d 0%, #86efac 100%);
    }
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(2deg); }
    }
    .animate-float { animation: float 4s ease-in-out infinite; }
    .fade-in { opacity: 0; transform: translateY(30px); transition: opacity 1s ease-out, transform 1s ease-out; }
    .fade-in.show { opacity: 1; transform: translateY(0); }
    .swiper-button-next, .swiper-button-prev { color: #166534; }
    .swiper-pagination-bullet { background-color: #166534; }

    /* Asegura que el Swiper no desborde en pantallas pequeñas */
    .swiper-container, .swiper-slide {
        width: 100% !important;
        box-sizing: border-box;
    }
</style>
</head>

<body class="text-green-900">

<!-- Sección principal con logo -->
<div class="relative fade-in" id="hero">
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-green-300/20 to-green-200/5 animate-pulse -z-10"></div>

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:py-24 lg:px-8 overflow-hidden">
        <div class="relative bg-white bg-opacity-80 backdrop-blur-md rounded-3xl shadow-2xl p-6 sm:p-8 md:p-10 flex flex-col lg:flex-row items-center gap-10 lg:gap-x-20">
            <div class="max-w-md w-full text-center lg:text-left flex-1">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-green-700 drop-shadow-md">
                    ¡Potencia tu conocimiento!
                </h1>
                <p class="mt-4 text-base sm:text-lg md:text-xl text-green-600 font-medium">
                    Explora miles de libros y haz crecer tu biblioteca personal de manera fácil y rápida.
                </p>
                <div class="mt-6 sm:mt-8">
                    <a href="{{ route('student.libros') }}"
                        class="inline-block rounded-md bg-green-600 px-5 py-3 sm:px-6 sm:py-3 text-sm sm:text-base font-semibold text-white shadow hover:bg-green-700 transition duration-300">
                        Comenzar
                    </a>
                </div>
            </div>
            <div class="mt-8 lg:mt-0 flex justify-center items-center flex-1 w-full max-w-xs sm:max-w-sm md:max-w-md">
                <div class="relative w-48 h-48 sm:w-60 sm:h-60 md:w-72 md:h-72 rounded-full overflow-hidden">
                    <img src="{{ asset('img/Logo-FET.png') }}" alt="Logo FET" class="w-full h-full object-contain animate-float" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Carrusel estilo stack -->
<section class="py-20 fade-in" id="carrusel">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-4xl font-extrabold text-center text-green-900 mb-4">Exposiciones Destacadas</h2>
        <p class="text-center text-green-700 mb-10">Visita contenidos comentados y seleccionados por expertos</p>

        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide bg-white rounded-2xl shadow-lg border border-green-200 p-4 flex flex-col items-center text-center">
                    <img src="{{ asset('img/chica_con_libro.svg') }}" alt="Exposición 1" class="h-48 object-contain mb-4" />
                    <h3 class="text-2xl font-semibold text-green-800 mb-2">Memorias de los oficios en San Cristóbal</h3>
                    <p class="text-green-700 text-sm mb-4">Explora la memoria de los oficios tradicionales de San Cristóbal en esta exposición única.</p>
                    <span class="text-xs font-medium bg-pink-200 text-pink-800 px-2 py-1 rounded-full">Historia</span>
                </div>
                <div class="swiper-slide bg-white rounded-2xl shadow-lg border border-green-200 p-4 flex flex-col items-center text-center">
                    <img src="{{ asset('img/big_book.svg') }}" alt="Exposición 2" class="h-48 object-contain mb-4" />
                    <h3 class="text-2xl font-semibold text-green-800 mb-2">Tiempo fuera: literatura y deporte en Colombia</h3>
                    <p class="text-green-700 text-sm mb-4">El fútbol, el ciclismo y el running como parte de la memoria y la cultura Colombiana.</p>
                    <span class="text-xs font-medium bg-blue-200 text-blue-800 px-2 py-1 rounded-full">Deporte</span>
                </div>
                <div class="swiper-slide bg-white rounded-2xl shadow-lg border border-green-200 p-4 flex flex-col items-center text-center">
                    <img src="{{ asset('img/sit.svg') }}" alt="Exposición 3" class="h-48 object-contain mb-4" />
                    <h3 class="text-2xl font-semibold text-green-800 mb-2">Ingenierías</h3>
                    <p class="text-green-700 text-sm mb-4">Descubre las maravillas del mundo de los ingenieros</p>
                    <span class="text-xs font-medium bg-purple-200 text-purple-800 px-2 py-1 rounded-full">Ingeniería</span>
                </div>
            </div>
            <div class="flex justify-center items-center gap-4 mt-6">
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-green-600 text-white py-10">
    <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-6">
        <div>
            <h4 class="text-3xl font-extrabold tracking-tight">Biblioteca FET</h4>
            <p class="mt-2 text-green-200 max-w-xs">
                Tu espacio de aprendizaje y exploración. Descubre, lee y crece con nosotros.
            </p>
        </div>
        <nav class="flex flex-wrap justify-center gap-6 text-green-200 font-semibold">
            <a href="https://www.fet.edu.co/" target="_blank" class="hover:underline">Sobre nosotros</a>
            <a href="https://www.fet.edu.co/" target="_blank" class="hover:underline">Noticias</a>
            <a href="https://www.fet.edu.co/" target="_blank" class="hover:underline">FET</a>
        </nav>
    </div>
    <div class="mt-6 text-center text-green-300 text-sm select-none">
        Desarrollado por Yilmar Andres Rodriguez Lasso - &copy;  Derechos reservados para la FET.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    window.addEventListener('load', () => {
        document.querySelectorAll('.fade-in').forEach(el => el.classList.add('show'));
    });

    const swiper = new Swiper('.swiper-container', {
        effect: 'cards',
        grabCursor: true,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });
</script>
</body>
</html>
