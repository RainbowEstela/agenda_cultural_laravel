<x-app-web>
    <x-div.principal>
        <form action="">
            @csrf
            <x-div.grid-uno>
                <x-input.select-blue>
                    <x-slot name="nombre">categoria</x-slot>
                    <x-slot name="id">categoria</x-slot>

                    <option value="" selected>Categoría</option>
                    <option value="cine">Cine</option>
                    <option value="musica">Música</option>
                    <option value="teatro">Teatro</option>
                    <option value="magia">Magia</option>
                    <option value="festival">Festival</option>
                    <option value="gaming">Gaming</option>
                    <option value="gastronomia">Gastronomía</option>
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