<div class="bg-gray-100 p-6 rounded-lg">
    <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{$imagen}}" alt="content">
    <h3 class="tracking-widest text-blue-500 text-xs font-medium title-font">{{$fecha}} <span>{{$hora}}</span></h3>
    <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{$nombre}}</h2>
    <p class="leading-relaxed text-base">{{$descripcion}}</p>
    <p class="leading-relaxed text-base font-semibold">Categoría: <span class="text-blue-500 font-normal">{{$categoria}}</span></p>
    <p class="leading-relaxed text-base font-semibold">aforo: <span class="text-blue-500 font-normal">{{$aforo}}</span></p>
    <p class="leading-relaxed text-base font-semibold">tipo: <span class="text-blue-500 font-normal">{{$asistencia}}</span></p>
    <div class="mt-4 flex justify-center">
        <a href="{{ route('eventos.detalle',['id' => $id]) }}"><button type="button" class="inline-flex items-center text-blue-700 font-medium hover:text-white border-2 border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg py-1 px-3 text-center me-2">Detalles</button></a>
    </div>
</div>