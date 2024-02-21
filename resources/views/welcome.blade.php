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

                <x-slot name="categoria">
                    Comida
                </x-slot>

                <x-slot name="aforo">
                    40
                </x-slot>

                <x-slot name="asistencia">
                    online
                </x-slot>

                <x-slot name="id">
                    1
                </x-slot>
            </x-div.card-evento>
            @endforeach
        </x-div.grid>
        @else
        <x-text.mensaje-error>No hay eventos a la vista</x-text.mensaje-error>
        @endif
    </x-div.principal>
</x-app-web>