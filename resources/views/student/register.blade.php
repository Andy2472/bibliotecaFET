<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registro estudiantes</title>
</head>
<body class="h-full">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body >
  ```
-->
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md" action="/register" method="POST">
  <h2 class="text-2xl font-bold mb-6 text-green-700 text-center">Registro de Usuario</h2>

  <div class="mb-4">
    <label for="name" class="block text-green-700 font-semibold mb-1">Nombre</label>
    <input type="text" id="name" name="name" required
      class="w-full border border-green-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" />
  </div>

  <div class="mb-4">
    <label for="last_name" class="block text-green-700 font-semibold mb-1">Apellido</label>
    <input type="text" id="last_name" name="last_name" required
      class="w-full border border-green-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" />
  </div>

  <div class="mb-4">
    <label for="u_code" class="block text-green-700 font-semibold mb-1">Código Universitario</label>
    <input type="text" id="u_code" name="u_code" required
      class="w-full border border-green-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" />
  </div>

  <div class="mb-4">
    <label for="email" class="block text-green-700 font-semibold mb-1">Correo Electrónico</label>
    <input type="email" id="email" name="email" required
      class="w-full border border-green-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" />
  </div>

  <div class="mb-6">
    <label for="password" class="block text-green-700 font-semibold mb-1">Contraseña</label>
    <input type="password" id="password" name="password" required
      class="w-full border border-green-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" />
  </div>

  <button type="submit"
    class="w-full bg-green-700 hover:bg-green-800 text-white font-bold py-2 rounded-md transition-colors duration-300">
    Registrarse
  </button>
</form>


    <p class="mt-10 text-center text-sm/6 text-gray-500">
      Not a member?
      <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
    </p>
  </div>
</div>

</body>
</html>