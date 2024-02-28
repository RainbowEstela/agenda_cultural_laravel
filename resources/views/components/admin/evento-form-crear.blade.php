<x-layout-admin>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Añadir evento
        </h2>

        <!-- EL USUARIO Y EL ESTADO SE HACEN EN EL CONTROLADOR USUARIO AUTH Y ESTADO ACTIVO POR DEFECTO -->
        <form action="" method="get" enctype="multipart/form-data">
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
                        Concierto de Rock y Metal
                    </x-slot>
                </x-input.admin-text>

                <!-- Fecha -->
                <x-div.margin-top>
                    <x-input.admin-date>
                        <x-slot name="dato">
                            Fecha
                        </x-slot>
                        <x-slot name="name">
                            fecha
                        </x-slot>
                        <x-slot name="placeholder">
                            Concierto de Rock y Metal
                        </x-slot>
                    </x-input.admin-date>
                </x-div.margin-top>

                <!-- Hora -->
                <x-div.margin-top>
                    <x-input.admin-hora>
                        <x-slot name="dato">
                            Hora
                        </x-slot>
                        <x-slot name="hora">
                            hora
                        </x-slot>
                        <x-slot name="minuto">
                            minutos
                        </x-slot>
                    </x-input.admin-hora>
                </x-div.margin-top>

                <!-- Descripción -->
                <x-input.admin-textarea>
                    <x-slot name="dato">
                        Descripción
                    </x-slot>
                    <x-slot name="name">
                        descripcion
                    </x-slot>
                    <x-slot name="placeholder">
                        Apuntate al evento musical de este verano, con las bandas más conocidas en el mundo de la música.
                    </x-slot>
                </x-input.admin-textarea>

                <!-- Ciudad -->
                <x-div.margin-top>
                    <x-input.admin-text>
                        <x-slot name="dato">
                            Ciudad
                        </x-slot>
                        <x-slot name="name">
                            ciudad
                        </x-slot>
                        <x-slot name="placeholder">
                            Málaga
                        </x-slot>
                    </x-input.admin-text>
                </x-div.margin-top>

                <!-- Dirección -->
                <x-div.margin-top>
                    <x-input.admin-text>
                        <x-slot name="dato">
                            Dirección
                        </x-slot>
                        <x-slot name="name">
                            direccion
                        </x-slot>
                        <x-slot name="placeholder">
                            Playa el Solecito
                        </x-slot>
                    </x-input.admin-text>
                </x-div.margin-top>

                <!-- Aforo Máximo -->
                <x-div.margin-top>
                    <x-input.admin-number>
                        <x-slot name="dato">
                            Aforo Máximo
                        </x-slot>
                        <x-slot name="name">
                            aforoMax
                        </x-slot>
                        <x-slot name="placeholder">
                            1000
                        </x-slot>
                        <x-slot name="min">
                            1
                        </x-slot>
                        <x-slot name="max">
                            1000000
                        </x-slot>
                    </x-input.admin-number>
                </x-div.margin-top>

                <!-- Presencialidad -->
                <x-input.admin-ratio-holder>
                    <x-slot name="dato">
                        Presencialidad
                    </x-slot>
                    <x-input.admin-ratio-button :active="true">
                        <x-slot name="tipo">
                            Presencial
                        </x-slot>
                        <x-slot name="name">
                            tipo
                        </x-slot>
                        <x-slot name="value">
                            presencial
                        </x-slot>
                    </x-input.admin-ratio-button>
                    <x-input.admin-ratio-button>
                        <x-slot name="tipo">
                            Online
                        </x-slot>
                        <x-slot name="name">
                            tipo
                        </x-slot>
                        <x-slot name="value">
                            online
                        </x-slot>
                    </x-input.admin-ratio-button>
                </x-input.admin-ratio-holder>

                <!-- Entradas por persona -->
                <x-div.margin-top>
                    <x-input.admin-number>
                        <x-slot name="dato">
                            Entradas por persona
                        </x-slot>
                        <x-slot name="name">
                            entradasPersona
                        </x-slot>
                        <x-slot name="placeholder">
                            10
                        </x-slot>
                        <x-slot name="min">
                            1
                        </x-slot>
                        <x-slot name="max">
                            10
                        </x-slot>
                    </x-input.admin-number>
                </x-div.margin-top>

                <!-- Categoría -->
                <x-input.admin-select>
                    <x-slot name="dato">
                        Categoría
                    </x-slot>
                    <x-slot name="name">
                        categoria
                    </x-slot>

                    <option value="">-- Categoría --</option>
                    <option value="comida">Comida</option>
                </x-input.admin-select>

                <!-- Imagen -->
                <x-div.margin-top>
                    <x-input.admin-imagen>
                        <x-slot name="dato">
                            Imagen
                        </x-slot>
                        <x-slot name="name">
                            imagen
                        </x-slot>
                    </x-input.admin-imagen>
                </x-div.margin-top>

                <x-div.margin-top>
                    <x-button.purple-submit>
                        Enviar
                    </x-button.purple-submit>
                </x-div.margin-top>
        </form>
    </div>
</x-layout-admin>