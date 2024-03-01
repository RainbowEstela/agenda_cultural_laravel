<div class="bg-gray-100 p-6 rounded-lg flex flex-col ">
    <div>
        <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{$imagen}}" alt="content">
        <h3 class="tracking-widest text-blue-500 text-xs font-medium title-font">{{$fecha}} <span>{{$hora}}</span></h3>
        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{$nombre}}</h2>
        <p class="leading-relaxed text-base">{{$descripcion}}</p>
        {{$slot}}
    </div>
    <div class="mt-4 flex items-end justify-center grow">
        <a href="{{$ruta}}"><x-button.blue>Detalles</x-button.blue></a>
    </div>
</div>