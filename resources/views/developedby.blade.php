<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sobre mí - Desarrollador</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #d9f99d 0%, #86efac 100%);
            color: #1f2937;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .fade-in.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="flex flex-col min-h-screen text-center">

    <!-- Encabezado -->
    <header class="py-8 fade-in">
        <h1 class="text-4xl font-extrabold text-green-900 drop-shadow-lg">¡Hola! Soy el Desarrollador</h1>
        <p class="mt-2 text-green-700 text-lg font-medium">Estudiante de 10° semestre de Ingeniería de Software</p>
    </header>

    <!-- Contenido principal -->
    <main class="flex-grow fade-in max-w-3xl mx-auto px-4">
        <div class="bg-white bg-opacity-80 backdrop-blur-md rounded-3xl shadow-2xl p-8 text-green-800">
            <p class="mb-4 text-green-700 leading-relaxed">
                YILMAR ANDRES RODRIGUEZ LASSO
            </p>
        </div>

        <!-- Sección de contacto o redes -->
        <div class="mt-8 text-green-900">
            <h3 class="text-xl font-bold mb-2">¡Conecta conmigo!</h3>
            <div class="flex justify-center gap-4">
                <a href="https://www.linkedin.com/in/yilmar-andrés-rodríguez-lasso-6075b5346"
                    class="inline-block rounded-md bg-green-600 px-6 py-3 text-base font-semibold text-white shadow hover:bg-green-700 transition duration-300">LinkedIn</a>

                <a href="mailto:ingenieroyilmarrodriguez@gmail.com"
                    class="inline-block rounded-md bg-green-600 px-6 py-3 text-base font-semibold text-white shadow hover:bg-green-700 transition duration-300">
                    Enviar correo
                </a>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-green-600 text-white py-4 mt-8 fade-in">
        <p>&copy; 2025 Yilmar Andres Rodriguez Lasso.</p>
    </footer>

    <script>
        window.addEventListener('load', () => {
            document.querySelectorAll('.fade-in').forEach(el => el.classList.add('show'));
        });
    </script>
</body>

</html>
