<x-layout-admin>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Añadir Empresa
        </h2>

        <!-- EL USUARIO Y EL ESTADO SE HACEN EN EL CONTROLADOR USUARIO AUTH Y ESTADO ACTIVO POR DEFECTO -->
        <form action="{{route('empresa.guardar')}}" method="post">
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
                        Hermanos Rodriguez SL
                    </x-slot>
                </x-input.admin-text>

                <!-- dirección -->
                <x-div.margin-top>
                    <x-input.admin-text>
                        <x-slot name="dato">
                            Dirección
                        </x-slot>
                        <x-slot name="name">
                            direccion
                        </x-slot>
                        <x-slot name="placeholder">
                            Madrid - calle grande nº30 planta 4
                        </x-slot>
                    </x-input.admin-text>
                </x-div.margin-top>

                <!-- Teléfono -->
                <x-div.margin-top>
                    <x-input.admin-text>
                        <x-slot name="dato">
                            Teléfono
                        </x-slot>
                        <x-slot name="name">
                            telefono
                        </x-slot>
                        <x-slot name="placeholder">
                            000000000
                        </x-slot>
                    </x-input.admin-text>
                </x-div.margin-top>

                <!-- Email -->
                <x-div.margin-top>
                    <x-input.admin-email>
                        <x-slot name="dato">
                            Email
                        </x-slot>
                        <x-slot name="name">
                            email
                        </x-slot>
                        <x-slot name="placeholder">
                            empresa@gmail.com
                        </x-slot>
                    </x-input.admin-email>
                </x-div.margin-top>

                <!-- Web -->
                <x-div.margin-top>
                    <x-input.admin-text>
                        <x-slot name="dato">
                            Web
                        </x-slot>
                        <x-slot name="name">
                            web
                        </x-slot>
                        <x-slot name="placeholder">
                            https://su-dominio.com
                        </x-slot>
                    </x-input.admin-text>
                </x-div.margin-top>

                <!-- Información extra -->
                <x-input.admin-textarea>
                    <x-slot name="dato">
                        Información Extra
                    </x-slot>
                    <x-slot name="name">
                        informacionExtra
                    </x-slot>
                    <x-slot name="placeholder">
                        Somos una empresa que nos dedicamos a ...
                    </x-slot>
                </x-input.admin-textarea>

                <x-div.margin-top>
                    <x-button.purple-submit>
                        Enviar
                    </x-button.purple-submit>
                </x-div.margin-top>


        </form>
    </div>
</x-layout-admin>