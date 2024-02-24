<x-app-web>
    <x-div.principal>
        <x-text.title>Lista de experiencias</x-text.title>

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
                    4 días
                </x-slot>

                <x-slot name="nombre">
                    spa dulces sueños
                </x-slot>

                <x-slot name="descripcion">
                    Relajese en nuestro spa 5 estrellas con todas las comodidades con maravillosas vistas al mar
                </x-slot>


                <x-text.p-card>
                    <x-slot name="dato">
                        Precio por persona
                    </x-slot>
                    40€
                </x-text.p-card>

                <x-slot name="ruta">
                    {{route('experiencias.detalle',['id' => 1])}}
                </x-slot>
            </x-div.card-evento>
            @endforeach
        </x-div.grid>
        @else
        <x-text.mensaje-error>No hay experiencias a la vista</x-text.mensaje-error>
        @endif
    </x-div.principal>

</x-app-web>