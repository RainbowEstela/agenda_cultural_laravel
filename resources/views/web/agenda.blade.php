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
        <x-text.title>Agenda de eventos</x-text.title>

        @if(isset($eventos))
        <x-div.grid>
            @foreach($eventos as $evento)
            <x-div.card-evento>
                <x-slot name="imagen">
                    {{asset('storage/eventos/'. $evento->imagen)}}
                </x-slot>

                <x-slot name="fecha">
                    {{$evento->fecha}}
                </x-slot>

                <x-slot name="hora">
                    {{$evento->hora}}
                </x-slot>

                <x-slot name="nombre">
                    {{$evento->nombre}}
                </x-slot>

                <x-slot name="descripcion">
                    {{$evento->descripcion}}
                </x-slot>


                <x-text.p-card>
                    <x-slot name="dato">
                        Categoría
                    </x-slot>
                    {{$evento->categoria->nombre}}
                </x-text.p-card>

                <x-text.p-card>
                    <x-slot name="dato">
                        Aforo
                    </x-slot>
                    {{$evento->aforo}}
                </x-text.p-card>

                <x-text.p-card>
                    <x-slot name="dato">
                        Tipo
                    </x-slot>
                    {{$evento->tipo}}
                </x-text.p-card>

                <x-slot name="ruta">
                    {{route('eventos.detalle',['id' => $evento->id])}}
                </x-slot>
            </x-div.card-evento>
            @endforeach
        </x-div.grid>
        {{$eventos->links()}}
        @else
        <x-text.mensaje-error>No hay eventos a la vista</x-text.mensaje-error>
        @endif

    </x-div.principal>
</x-app-web>