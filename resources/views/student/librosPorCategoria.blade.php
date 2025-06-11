<x-main-layout>

    <x-slot name="title">Libro por categorías</x-slot>

    <x-slot name="barraDeNavegacion">
        <a href="{{ route('index') }}"
            class="text-green-700 hover:bg-green-600 hover:text-white block rounded-md px-3 py-2 text-base font-medium transition focus:outline-none focus:ring-2 focus:ring-green-500">
            Inicio
        </a>
        <a href="{{ route('student.libros') }}"
            class="text-green-700 hover:bg-green-600 hover:text-white block rounded-md px-3 py-2 text-base font-medium transition focus:outline-none focus:ring-2 focus:ring-green-500">
            Libros
        </a>
        <a href="https://site2.q10.com/login?ReturnUrl=%2F&aplentId=d3ab5690-e6a0-40d0-88bd-3838fbcccd7e"
            class="text-green-700 hover:bg-green-600 hover:text-white block rounded-md px-3 py-2 text-base font-medium transition focus:outline-none focus:ring-2 focus:ring-green-500">
            Q 10
        </a>
        <a href="https://www.fet.edu.co/" aria-current="page"
            class="bg-green-600 text-white block rounded-md px-3 py-2 text-base font-medium shadow-sm transition focus:outline-none focus:ring-2 focus:ring-green-500">
            FET
        </a>
    </x-slot>

    <x-menuverticallibros>
        <x-slot name="categoriasDisponibles">
            @foreach ($categorias as $categoriabarra)
                <a href="{{ route('student.categorias', ['categoria' => $categoriabarra->id]) }}"
                    class="flex items-center px-4 py-2 text-gray-800 rounded-md hover:bg-green-50 hover:text-green-700 font-medium transition focus:outline-none focus:ring-2 focus:ring-green-400">
                    📚
                    <span class="ml-3 truncate">{{ $categoriabarra->name }}</span>
                </a>
            @endforeach
        </x-slot>
        <style>
            @keyframes fadeInUpSlow {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .fade-in-slow {
                animation: fadeInUpSlow .8s ease-out forwards;
            }
        </style>

        <div class="bg-white rounded-lg shadow-md">
            <div class="max-w-7xl mx-auto px-6 py-16 sm:px-8 sm:py-24 lg:px-10">
                <h2
                    class="text-2xl md:text-3xl font-bold text-green-600 mb-8 select-none tracking-tight leading-snug fade-in-slow">
                    Libros de {{ $categoriaEspecifica->name }}
                </h2>
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-10">
                    @forelse ($libros as $libro)
                        <div
                            class="group relative rounded-md border border-gray-200 bg-white shadow-sm hover:shadow-lg transition-shadow duration-300 cursor-pointer overflow-hidden">
                            <div class="aspect-square w-full overflow-hidden rounded-t-md bg-gray-100">
                                <img src="{{ asset('storage/' . $libro->cover_image) }}"
                                    alt="Portada del libro {{ $libro->name }}"
                                    class="w-full h-full object-contain object-center transition-transform duration-300 group-hover:scale-105" />
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 truncate" title="{{ $libro->name }}">
                                    {{ $libro->name }}
                                </h3>
                                <p class="mt-1 text-sm text-gray-600 font-medium">
                                    Cantidad: <span class="text-green-700">{{ $libro->cantidad }}</span>
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 text-lg col-span-full">No hay registros aún</p>
                    @endforelse
                </div>

                <div class="mt-12">
                    {{ $libros->links() }}
                </div>
            </div>
        </div>
    </x-menuverticallibros>

    <x-slot name="barraDeNavegacionInferior">Libro por categorías</x-slot>

</x-main-layout>
