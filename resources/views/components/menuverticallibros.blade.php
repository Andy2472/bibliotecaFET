<div class="flex min-h-screen bg-gradient-to-br from-green-50 via-white to-green-100">

  <!-- Sidebar para escritorio -->
  <aside class="hidden md:flex flex-col w-64 bg-white/90 backdrop-blur border-r border-green-200 shadow-xl rounded-tr-2xl rounded-br-2xl overflow-hidden">
    <div class="p-6 flex flex-col h-full">
      <h2 class="text-2xl font-extrabold text-green-600 mb-8 border-b border-green-300 pb-3 select-none tracking-wide">Categorías</h2>
      <nav class="flex-1 space-y-3 text-green-800 font-semibold text-base">
        {{ $categoriasDisponibles }}
      </nav>
    </div>
  </aside>

  <!-- Contenido principal -->
  <main class="flex-1 p-6 md:p-10">
    <!-- Botón menú vertical móvil -->
    <div class="md:hidden mb-6 px-2 flex justify-between items-center">
      <button id="sidebar-toggle-button"
        class="inline-flex items-center gap-2 px-3 py-2 bg-green-600 text-white font-semibold rounded shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        Categorías
      </button>
    </div>

    <!-- Encabezado en escritorio -->
    {{-- <h1 class="hidden md:block text-3xl font-extrabold text-green-600 mb-6 select-none tracking-wide">Listado de Libros</h1> --}}

    <div class="space-y-4">
      {{ $slot }}
    </div>
  </main>

  <!-- Sidebar vertical móvil (overlay) -->
  <aside id="sidebar-mobile-menu"
    class="fixed inset-0 bg-white/95 backdrop-blur-sm z-50 transform -translate-x-full transition-transform duration-300 shadow-2xl rounded-tr-3xl rounded-br-3xl md:hidden">
    <div class="flex flex-col h-full p-6">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-extrabold text-green-700 tracking-wide select-none">Categorías</h2>
        <button id="sidebar-close-button"
          class="text-green-700 hover:text-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 rounded transition"
          aria-label="Cerrar menú de categorías">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <nav class="flex-1 overflow-y-auto space-y-4 text-green-800 font-semibold text-base">
        {{ $categoriasDisponibles }}
      </nav>
    </div>
  </aside>

</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('sidebar-toggle-button');
    const sidebarMenu = document.getElementById('sidebar-mobile-menu');
    const closeButton = document.getElementById('sidebar-close-button');

    toggleButton.addEventListener('click', () => {
      sidebarMenu.classList.remove('-translate-x-full');
      sidebarMenu.classList.add('translate-x-0');
    });

    closeButton.addEventListener('click', () => {
      sidebarMenu.classList.remove('translate-x-0');
      sidebarMenu.classList.add('-translate-x-full');
    });
  });
</script>
