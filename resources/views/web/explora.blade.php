<x-app-web>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="flex w-full mb-20 flex-wrap text-center">
                <div class="lg:pl-6 lg:w-2/3 mx-auto ">
                    <x-text.title>Explore las maravillas naturales de nuestra zona</x-text.title>

                </div>
                <p class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-gray-900">Nuesta localidad está rodeada de paisajes naturales extraordinarios. No pierda la oportunidad de sentir la naturaleza como nunca antes.</p>
            </div>
            <div class="flex flex-wrap md:-m-2 -m-1">
                <div class="flex flex-wrap w-1/2">
                    <div class="md:p-2 p-1 w-1/2">
                        <img alt="gallery" class="w-full object-cover h-full object-center block" src="{{asset('storage/web/pl3.jpg')}}">
                    </div>
                    <div class="md:p-2 p-1 w-1/2">
                        <img alt="gallery" class="w-full object-cover h-full object-center block" src="{{asset('storage/web/pl2.jpg')}}">
                    </div>
                    <div class="md:p-2 p-1 w-full">
                        <img alt="gallery" class="w-full h-full object-cover object-center block" src="{{asset('storage/web/pl1.webp')}}">
                    </div>
                </div>
                <div class="flex flex-wrap w-1/2">
                    <div class="md:p-2 p-1 w-full">
                        <img alt="gallery" class="w-full h-full object-cover object-center block" src="{{asset('storage/web/col2.jpg')}}">
                    </div>
                    <div class="md:p-2 p-1 w-1/2">
                        <img alt="gallery" class="w-full object-cover h-full object-center block" src="{{asset('storage/web/col1.jpg')}}">
                    </div>
                    <div class="md:p-2 p-1 w-1/2">
                        <img alt="gallery" class="w-full object-cover h-full object-center block" src="{{asset('storage/web/col3.jpg')}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-web>