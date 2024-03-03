<x-layout-admin>
    <x-table.skeleton>
        <x-slot name="titulo">
            Inscripciones
        </x-slot>

        <x-slot name="head">
            <x-table.th>Evento</x-table.th>
            <x-table.th>Asistente</x-table.th>
            <x-table.th>Estado</x-table.th>
            <x-table.th>Entradas</x-table.th>
            <x-table.th>Acciones</x-table.th>
        </x-slot>
        @if(isset($inscriptions))
        @foreach($inscriptions as $inscription)
        <tr>
            <x-table.td>{{$inscription->evento->nombre}}</x-table.td>
            <x-table.td>{{$inscription->user->email}}</x-table.td>
            <x-table.td>
                @if($inscription->estado == 'confirmada')
                <x-text.positive>{{$inscription->estado}}</x-text.positive>
                @elseif($inscription->estado == 'recibida')
                <x-text.alert>{{$inscription->estado}}</x-text.alert>
                @elseif($inscription->estado == 'cancelada')
                <x-text.negative>{{$inscription->estado}}</x-text.negative>
                @else
                Error carcando resultado
                @endif
            </x-table.td>
            <x-table.td>{{$inscription->numero_entradas}}</x-table.td>
            <x-table.td>
                <div class="flex items-center space-x-4 text-sm">
                    @if($inscription->estado != 'cancelada')
                    <a href="{{route('incripcion.cancelar',['id' => $inscription->id])}}">
                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </a>
                    @endif
                </div>
            </x-table.td>
        </tr>
        @endforeach
        {{$inscriptions->links()}}
        @endif

    </x-table.skeleton>
</x-layout-admin>