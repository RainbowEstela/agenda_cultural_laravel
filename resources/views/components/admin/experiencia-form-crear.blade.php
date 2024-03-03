<x-layout-admin>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Añadir experiencia
        </h2>

        <form action="{{route('experiencia.guardar')}}" method="post" enctype="multipart/form-data">
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

                <!-- fecha string -->
                <x-div.margin-top>
                    <x-input.admin-text>
                        <x-slot name="dato">
                            Periodo de tiempo
                        </x-slot>
                        <x-slot name="name">
                            fechaString
                        </x-slot>
                        <x-slot name="placeholder">
                            4 semanas
                        </x-slot>
                    </x-input.admin-text>
                </x-div.margin-top>


                <!-- Descripción corta-->
                <x-input.admin-textarea>
                    <x-slot name="dato">
                        Descripción corta
                    </x-slot>
                    <x-slot name="name">
                        descripcionCorta
                    </x-slot>
                    <x-slot name="placeholder">
                        Apuntate al evento musical de este verano, con las bandas más conocidas en el mundo de la música.
                    </x-slot>
                </x-input.admin-textarea>

                <!-- Descripción Larga-->
                <x-input.admin-textarea>
                    <x-slot name="dato">
                        Descripción larga
                    </x-slot>
                    <x-slot name="name">
                        descripcionLarga
                    </x-slot>
                    <x-slot name="placeholder">
                        El mayor espectaculo de música de toda España esta a punto de comenzar ...
                    </x-slot>
                </x-input.admin-textarea>


                <!-- Precio por persona -->
                <x-div.margin-top>
                    <x-input.admin-number :active="true">
                        <x-slot name="dato">
                            Precio por persona
                        </x-slot>
                        <x-slot name="name">
                            precio
                        </x-slot>
                        <x-slot name="placeholder">
                            10
                        </x-slot>
                        <x-slot name="min">
                            1
                        </x-slot>
                        <x-slot name="max">
                            1000000
                        </x-slot>
                    </x-input.admin-number>
                </x-div.margin-top>

                <!-- Link -->
                <x-div.margin-top>
                    <x-input.admin-text>
                        <x-slot name="dato">
                            Link
                        </x-slot>
                        <x-slot name="name">
                            link
                        </x-slot>
                        <x-slot name="placeholder">
                            https://su-dominio.com/experiencia
                        </x-slot>
                    </x-input.admin-text>
                </x-div.margin-top>

                <!-- Empresa -->
                <x-input.admin-select>
                    <x-slot name="dato">
                        Empresa
                    </x-slot>
                    <x-slot name="name">
                        empresa
                    </x-slot>

                    @if(isset($empresas))
                    @foreach($empresas as $empresa)
                    <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                    @endforeach
                    @endif
                </x-input.admin-select>

                <!-- categoria -->
                <x-input.admin-select>
                    <x-slot name="dato">
                        Categoría
                    </x-slot>
                    <x-slot name="name">
                        categoria
                    </x-slot>
                    @if(isset($categorias))
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                    @endif
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