<x-app-web>
    @include('components.decor.title')
    <x-div.principal>
        <x-text.title>Próximos eventos</x-text.title>
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
                    @if(isset($evento->categoria->nombre))
                    {{$evento->categoria->nombre}}
                    @endif
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
        @else
        <x-text.mensaje-error>No hay eventos a la vista</x-text.mensaje-error>
        @endif
    </x-div.principal>
</x-app-web>