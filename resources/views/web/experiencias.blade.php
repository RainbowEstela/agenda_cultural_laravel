<x-app-web>
    <x-div.principal>
        <form action="">
            @csrf
            <x-div.grid-uno>
                <x-input.select-blue>
                    <x-slot name="nombre">categoria</x-slot>
                    <x-slot name="id">categoria</x-slot>

                    <option value="" selected>Categoría</option>
                    @if(isset($categorias))
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                    @endif
                </x-input.select-blue>
                <div class="w-fit">
                    <x-button.blue-submit>
                        <x-slot name="name">fecha</x-slot>
                        <x-slot name="value">mes</x-slot>
                        Este mes
                    </x-button.blue-submit>
                    <x-button.blue-submit>
                        <x-slot name="name">fecha</x-slot>
                        <x-slot name="value">semana</x-slot>
                        Esta semana
                    </x-button.blue-submit>
                    <x-button.blue-submit>
                        <x-slot name="name">fecha</x-slot>
                        <x-slot name="value">todos</x-slot>
                        Todos
                    </x-button.blue-submit>
                </div>
            </x-div.grid-uno>
        </form>
        <x-text.title>Lista de experiencias</x-text.title>

        @if(isset($experiencias))
        <x-div.grid>
            @foreach($experiencias as $experiencia)
            <x-div.card-evento>
                <x-slot name="imagen">
                    {{asset('storage/experiencias/' . $experiencia->imagen)}}
                </x-slot>

                <x-slot name="fecha">
                    {{$experiencia->fecha}}
                </x-slot>

                <x-slot name="hora">
                    {{$experiencia->fecha_string}}
                </x-slot>

                <x-slot name="nombre">
                    {{$experiencia->nombre}}
                </x-slot>

                <x-slot name="descripcion">
                    {{$experiencia->descripcion_corta}}
                </x-slot>


                <x-text.p-card>
                    <x-slot name="dato">
                        Precio por persona
                    </x-slot>
                    {{$experiencia->precio}}€
                </x-text.p-card>

                <x-slot name="ruta">
                    {{route('experiencias.detalle',['id' => $experiencia->id])}}
                </x-slot>
            </x-div.card-evento>
            @endforeach
        </x-div.grid>
        {{$experiencias->links()}}
        @else
        <x-text.mensaje-error>No hay experiencias a la vista</x-text.mensaje-error>
        @endif

    </x-div.principal>

</x-app-web>