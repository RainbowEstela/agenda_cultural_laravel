<x-app-web>
    <x-div.hero>
        <x-slot name="fecha">
            24-06-2023
        </x-slot>
        <x-slot name="hora">
            16:00
        </x-slot>
        <x-slot name="nombre">
            Fiesta del vino
        </x-slot>
        <x-slot name="descripcion">
            A beber vino en el bar de Paco a 50%.
        </x-slot>

        <x-text.detail-border>
            <x-slot name="dato">
                Ciudad
            </x-slot>
            <x-slot name="valor">
                Malaga
            </x-slot>
        </x-text.detail-border>
        <x-text.detail-border>
            <x-slot name="dato">
                Direccion
            </x-slot>
            <x-slot name="valor">
                calle los Santos nº4
            </x-slot>
        </x-text.detail-border>
        <x-text.detail-border>
            <x-slot name="dato">
                Aforo
            </x-slot>
            <x-slot name="valor">
                40
            </x-slot>
        </x-text.detail-border>
        <x-text.detail-border>
            <x-slot name="dato">
                Tipo
            </x-slot>
            <x-slot name="valor">
                Presencial
            </x-slot>
        </x-text.detail-border>
        <x-text.detail-border>
            <x-slot name="dato">
                Categoria
            </x-slot>
            <x-slot name="valor">
                Comida
            </x-slot>
        </x-text.detail-border>

        <x-slot name="ruta">
            /
        </x-slot>
        <x-slot name="boton">
            Inscribirse
        </x-slot>
    </x-div.hero>
</x-app-web>