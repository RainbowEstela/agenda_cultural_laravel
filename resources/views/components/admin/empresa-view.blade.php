<x-layout-admin>
    <x-table.skeleton>
        <x-slot name="titulo">
            Empresas
        </x-slot>
        <x-slot name="buttons">
            <a href="{{route('empresa.crear')}}">
                <x-button.purple>
                    Añadir
                </x-button.purple>
            </a>

        </x-slot>

        <x-slot name="head">
            <x-table.th>Nombre</x-table.th>
            <x-table.th>Dirección</x-table.th>
            <x-table.th>Teléfono</x-table.th>
            <x-table.th>Email</x-table.th>
            <x-table.th>Web</x-table.th>
            <x-table.th>Información Extra</x-table.th>
            <x-table.th>acciones</x-table.th>
        </x-slot>
        @if(isset($empresas))
        @foreach($empresas as $empresa)
        <tr>
            <x-table.td>{{$empresa->nombre}}</x-table.td>
            <x-table.td>
                {{$empresa->direccion}}
            </x-table.td>
            <x-table.td>{{$empresa->telefono}}</x-table.td>
            <x-table.td>{{$empresa->email}}</x-table.td>
            <x-table.td>
                <p>
                    <x-link.purple>
                        <x-slot name="target">
                            _blank
                        </x-slot>
                        <x-slot name="href">
                            {{$empresa->web}}
                        </x-slot>
                        Enlace
                    </x-link.purple>
                </p>
            </x-table.td>
            <x-table.td>
                <p class="max-h-28 overflow-y-scroll">{{$empresa->informacion_extra}}</p>
            </x-table.td>

            <x-table.td>
                <div class="flex items-center space-x-4 text-sm">
                    <a href="{{route('empresa.borrar',['id' => $empresa->id])}}">
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
        {{$empresas->links()}}
        @endif
    </x-table.skeleton>
</x-layout-admin>