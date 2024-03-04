<x-layout-admin>
    <x-table.skeleton>
        <x-slot name="titulo">
            Eventos
        </x-slot>
        <x-slot name="buttons">
            <a href="{{route('evento.crear')}}">
                <x-button.purple>
                    Añadir
                </x-button.purple>
            </a>

        </x-slot>

        <x-slot name="head">
            <x-table.th>Nombre</x-table.th>
            <x-table.th>Fecha y hora</x-table.th>
            <x-table.th>Descripción</x-table.th>
            <x-table.th>Ciudad</x-table.th>
            <x-table.th>Direccion</x-table.th>
            <x-table.th>Estado</x-table.th>
            <x-table.th>Inscripciones</x-table.th>
            <x-table.th>Aforo</x-table.th>
            <x-table.th>Tipo</x-table.th>
            <x-table.th>Entradas por persona</x-table.th>
            <x-table.th>Categoría</x-table.th>
            <x-table.th>Imagen</x-table.th>
            <x-table.th>Creador</x-table.th>
            <x-table.th>Acciones</x-table.th>
        </x-slot>
        @if(isset($eventos))
        @foreach($eventos as $evento)
        <tr>
            <x-table.td>{{$evento->nombre}}</x-table.td>
            <x-table.td>
                <p>{{$evento->fecha}}</p>
                <p>{{$evento->hora}}</p>
            </x-table.td>
            <x-table.td>
                <p class="max-h-28 overflow-y-scroll">{{$evento->descripcion}}</p>
            </x-table.td>
            <x-table.td>{{$evento->ciudad}}</x-table.td>
            <x-table.td>{{$evento->direccion}}</x-table.td>
            <x-table.td>
                @if($evento->estado == 'creado')
                <x-text.positive>Creado</x-text.positive>
                @elseif($evento->estado == 'cancelado')
                <x-text.negative>Cancelado</x-text.negative>
                @elseif($evento->estado == 'terminado')
                <x-text.expired>Terminado</x-text.expired>
                @else
                error cargando estado
                @endif
            </x-table.td>
            <x-table.td>
                <p>
                    <x-link.purple>
                        <x-slot name="target">
                            _self
                        </x-slot>
                        <x-slot name="href">
                            {{route('incripcion.view',['id' => $evento->id])}}
                        </x-slot>
                        Ver
                    </x-link.purple>
                </p>
            </x-table.td>
            <x-table.td>{{$evento->aforo}}</x-table.td>
            <x-table.td>{{$evento->tipo}}</x-table.td>
            <x-table.td>{{$evento->entradas_persona}}</x-table.td>
            <x-table.td>
                @if(isset($evento->categoria->nombre))
                {{$evento->categoria->nombre}}
                @endif
            </x-table.td>
            <x-table.td>
                <p>
                    <x-link.purple>
                        <x-slot name="target">
                            _blank
                        </x-slot>
                        <x-slot name="href">
                            {{asset('storage/eventos/' . $evento->imagen)}}
                        </x-slot>
                        Ver
                    </x-link.purple>
                </p>
            </x-table.td>
            <x-table.td>
                @if(isset($evento->user->email))
                {{$evento->user->email}}
                @endif
            </x-table.td>
            <x-table.td>
                <div class="flex items-center space-x-4 text-sm">
                    <a href="{{route('evento.editar',['id' => $evento->id])}}">
                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                        </button>
                    </a>

                    <a href="{{route('evento.borrar',['id' => $evento->id])}}">
                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </a>

                </div>
            </x-table.td>
        </tr>
        @endforeach
        {{$eventos->links()}}
        @endif
    </x-table.skeleton>
</x-layout-admin>