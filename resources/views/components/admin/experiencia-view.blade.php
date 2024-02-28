<x-layout-admin>
    <x-table.skeleton>
        <x-slot name="titulo">
            Experiencias
        </x-slot>
        <x-slot name="buttons">
            <a href="{{route('experiencia.crear')}}">
                <x-button.purple>
                    Añadir
                </x-button.purple>
            </a>

        </x-slot>

        <x-slot name="head">
            <x-table.th>Nombre</x-table.th>
            <x-table.th>Fecha</x-table.th>
            <x-table.th>Fecha texto</x-table.th>
            <x-table.th>Descripción corta</x-table.th>
            <x-table.th>Descripción larga</x-table.th>
            <x-table.th>Precio</x-table.th>
            <x-table.th>Link</x-table.th>
            <x-table.th>Empresa</x-table.th>
            <x-table.th>Acciones</x-table.th>
        </x-slot>
        <tr>
            <x-table.td>Fiesta del vino</x-table.td>
            <x-table.td>
                <p>23-06-2023</p>
            </x-table.td>
            <x-table.td>Una semana</x-table.td>
            <x-table.td>
                <p class="max-h-28 overflow-y-scroll">Ah beber vino al bar de pepe con un 50% para celebrar que acabamos el año</p>
            </x-table.td>
            <x-table.td>
                <p class="max-h-28 overflow-y-scroll">Ah beber vino al bar de pepe con un 50% para celebrar que acabamos el año</p>
            </x-table.td>
            <x-table.td>40€/persona</x-table.td>
            <x-table.td>
                <p><x-link.purple>Enlace</x-link.purple></p>
            </x-table.td>
            <x-table.td>
                <div class="flex items-center text-sm">
                    <p><x-link.purple>Empresa</x-link.purple></p>
                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                    </button>
                </div>

            </x-table.td>

            <x-table.td>
                <div class="flex items-center space-x-4 text-sm">
                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </x-table.td>
        </tr>

    </x-table.skeleton>
</x-layout-admin>