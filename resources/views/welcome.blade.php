<x-app-web>
    @include('components.decor.title')
    <x-div.principal>
        <x-text.title>Próximos eventos</x-text.title>
        @if(isset($eventos))
        <x-div.grid>
            @foreach($eventos as $evento)
            <x-div.card-evento>
                <x-slot name="imagen">
                    {{asset('storage/web/pueblo-portada.webp')}}
                </x-slot>

                <x-slot name="fecha">
                    23-04-2023
                </x-slot>

                <x-slot name="hora">
                    12:00
                </x-slot>

                <x-slot name="nombre">
                    Fiesta del vino
                </x-slot>

                <x-slot name="descripcion">
                    Reunión anual en el bar de Paco, Vino de la comarca a 50%.
                </x-slot>


                <x-text.p-card>
                    <x-slot name="dato">
                        Categoría
                    </x-slot>
                    Comida
                </x-text.p-card>

                <x-text.p-card>
                    <x-slot name="dato">
                        Aforo
                    </x-slot>
                    40
                </x-text.p-card>

                <x-text.p-card>
                    <x-slot name="dato">
                        Tipo
                    </x-slot>
                    online
                </x-text.p-card>

                <x-slot name="ruta">
                    {{route('eventos.detalle',['id' => 1])}}
                </x-slot>
            </x-div.card-evento>
            @endforeach
        </x-div.grid>
        @else
        <x-text.mensaje-error>No hay eventos a la vista</x-text.mensaje-error>
        @endif
    </x-div.principal>
</x-app-web>