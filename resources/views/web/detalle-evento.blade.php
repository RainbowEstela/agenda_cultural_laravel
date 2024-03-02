<x-app-web>
    <x-div.hero>
        <x-slot name="imagen">
            {{asset('storage/eventos/' . $evento->imagen)}}
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

        <x-text.detail-border>
            <x-slot name="dato">
                Ciudad
            </x-slot>
            <x-slot name="valor">
                {{$evento->ciudad}}
            </x-slot>
        </x-text.detail-border>
        <x-text.detail-border>
            <x-slot name="dato">
                Direccion
            </x-slot>
            <x-slot name="valor">
                {{$evento->direccion}}
            </x-slot>
        </x-text.detail-border>
        <x-text.detail-border>
            <x-slot name="dato">
                Aforo
            </x-slot>
            <x-slot name="valor">
                {{$evento->aforo}}
            </x-slot>
        </x-text.detail-border>
        <x-text.detail-border>
            <x-slot name="dato">
                Tipo
            </x-slot>
            <x-slot name="valor">
                {{$evento->tipo}}
            </x-slot>
        </x-text.detail-border>
        <x-text.detail-border>
            <x-slot name="dato">
                Categoria
            </x-slot>
            <x-slot name="valor">
                {{$evento->categoria->nombre}}
            </x-slot>
        </x-text.detail-border>

        <x-slot name="boton">
            @if(Auth::user())
            @if(Auth::user()->rol == 'Asistente')
            @if(!$inscripto)
            <form action="{{route('eventos.incribirse')}}" method="post">
                @csrf
                <x-div.grid-uno>

                    <input type="hidden" name="evento" value="{{$evento->id}}">

                    <x-input.admin-number>
                        <x-slot name="dato">
                            Numero de entradas
                        </x-slot>
                        <x-slot name="name">
                            entradas
                        </x-slot>
                        <x-slot name="placeholder">
                            1
                        </x-slot>
                        <x-slot name="min">
                            1
                        </x-slot>
                        <x-slot name="max">
                            {{$evento->entradas_persona}}
                        </x-slot>
                    </x-input.admin-number>

                    <x-button.blue-submit>
                        Inscribirse
                    </x-button.blue-submit>
                </x-div.grid-uno>
            </form>
            @else
            <x-button.disabled>Inscrito/a</x-button.disabled>
            @endif

            @else
            <x-button.disabled>Solo Asistentes</x-button.disabled>
            @endif

            @else
            <x-button.disabled>Necesita cuenta</x-button.disabled>
            @endif
        </x-slot>
    </x-div.hero>
</x-app-web>