<x-layout-admin>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Añadir categoría
        </h2>

        <!-- EL USUARIO Y EL ESTADO SE HACEN EN EL CONTROLADOR USUARIO AUTH Y ESTADO ACTIVO POR DEFECTO -->
        <form action="{{route('categoria.guardar')}}" method="post">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <!-- Nombre -->
                <x-input.admin-text>
                    <x-slot name="dato">
                        Nombre
                    </x-slot>
                    <x-slot name="name">
                        nombre
                    </x-slot>
                    <x-slot name="placeholder">
                        Gaming
                    </x-slot>
                </x-input.admin-text>

                <x-div.margin-top>
                    <x-button.purple-submit>
                        Enviar
                    </x-button.purple-submit>
                </x-div.margin-top>
        </form>
    </div>
</x-layout-admin>