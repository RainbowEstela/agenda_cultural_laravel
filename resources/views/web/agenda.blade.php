<x-app-web>
    <x-div.principal>
        <form action="">
            @csrf
            <div class="grid grid-cols-1 w-max gap-5 my-8 mx-auto">
                <select name="categoria" id="categoria" class="bg-gray-50 border-2 border-blue-600 text-blue-700 font-medium rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                    <option value="" selected>Categoría</option>
                    <option value="cine">Cine</option>
                    <option value="musica">Música</option>
                    <option value="teatro">Teatro</option>
                    <option value="magia">Magia</option>
                    <option value="festival">Festival</option>
                    <option value="gaming">Gaming</option>
                    <option value="gastronomia">Gastronomía</option>
                </select>
                <div class="w-fit">
                    <button type="submit" name="fecha" value="mes" class="inline-flex items-center text-blue-700 font-medium hover:text-white border-2 border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg py-1 px-3 text-center me-2">Este mes</button>
                    <button type="submit" name="fecha" value="semana" class="inline-flex items-center text-blue-700 font-medium hover:text-white border-2 border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg py-1 px-3 text-center me-2">Esta semana</button>
                    <button type="submit" name="fecha" value="todos" class="inline-flex items-center text-blue-700 font-medium hover:text-white border-2 border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg py-1 px-3 text-center">Todos</button>
                </div>

            </div>
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