<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap xl:items-center">
            <img alt="detalle" class="lg:w-1/2 w-full lg:h-auto xl:max-h-96 h-64 object-cover object-center rounded" src="{{asset('storage/web/pueblo-portada.webp')}}">

            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mb-0">
                <h2 class="text-sm title-font tracking-widest text-blue-500">{{$fecha}} <span>{{$hora}}</span></h2>
                <x-text.title>{{$nombre}}</x-text.title>
                <p class="leading-relaxed mb-4 text-gray-900">{{$descripcion}}</p>


                <div class="border-b border-gray-200 mb-6">
                    {{$slot}}
                </div>

                <div class="flex">
                    @if(isset($precio))
                    <span class="title-font font-medium text-2xl text-gray-900">{{$precio}}€/persona</span>
                    @endif
                    <div class="ml-auto">
                        <a href="{{$ruta}}"><x-button.blue>{{$boton}}</x-button.blue></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>