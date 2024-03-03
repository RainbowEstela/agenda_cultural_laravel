<x-layout-admin>
    <x-table.skeleton>
        <x-slot name="titulo">
            Usuarios
        </x-slot>

        <x-slot name="head">
            <x-table.th>Rol</x-table.th>
            <x-table.th>DNI</x-table.th>
            <x-table.th>Nombre</x-table.th>
            <x-table.th>Apellidos</x-table.th>
            <x-table.th>Edad</x-table.th><!-- NULLABLE -->
            <x-table.th>Email</x-table.th>
            <x-table.th>Direccion</x-table.th>
            <x-table.th>Ciudad</x-table.th>
            <x-table.th>Telefono</x-table.th>
            <x-table.th>Empresa</x-table.th><!-- NULLABLE -->
            <x-table.th>Puesto</x-table.th><!-- NULLABLE -->
            <x-table.th>Acciones</x-table.th>

        </x-slot>
        @if(isset($usuarios))
        @foreach($usuarios as $usuario)
        <tr>
            <x-table.td>{{$usuario->rol}}</x-table.td>
            <x-table.td>{{$usuario->dni}}</x-table.td>
            <x-table.td>{{$usuario->name}}</x-table.td>
            <x-table.td>{{$usuario->apellidos}}</x-table.td>
            <x-table.td>{{$usuario->edad}}</x-table.td>
            <x-table.td>{{$usuario->email}}</x-table.td>
            <x-table.td>{{$usuario->direccion}}</x-table.td>
            <x-table.td>{{$usuario->ciudad}}</x-table.td>
            <x-table.td>{{$usuario->telefono}}</x-table.td>
            <x-table.td>
                @if( isset( $usuario->empresa->nombre))
                {{$usuario->empresa->nombre}}
                @endif
            </x-table.td>
            <x-table.td>{{$usuario->puesto}}</x-table.td>
            <x-table.td>
                <div class="flex items-center space-x-4 text-sm">
                    <a href="{{route('usuario.borrar',['id' => $usuario->id])}}">
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
        {{$usuarios->links()}}
        @endif
    </x-table.skeleton>
</x-layout-admin>