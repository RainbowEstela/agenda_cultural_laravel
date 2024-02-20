<x-app-web>
    @include('components.decor.title')
    <div class="my-4 md:my-8 px-4">
        <h2 class="text-3xl font-semibold text-indigo-700 underline decoration-2">Próximos eventos</h2>
        <div class="grid  grid-cols-1 justify-items-center sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">


            <div class="bg-gray-100 p-6 rounded-lg">
                <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{asset('storage/web/pueblo-portada.webp')}}" alt="content">
                <h3 class="tracking-widest text-blue-500 text-xs font-medium title-font">23-04-2023 <span>12:00</span></h3>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Fiesta del vino</h2>
                <p class="leading-relaxed text-base">Reunión anual en el bar de Paco, Vino de la comarca a 50%.</p>
                <p class="leading-relaxed text-base font-semibold">Categoría: <span class="text-blue-500 font-normal">Comida</span></p>
                <p class="leading-relaxed text-base font-semibold">aforo: <span class="text-blue-500 font-normal">40</span></p>
                <p class="leading-relaxed text-base font-semibold">tipo: <span class="text-blue-500 font-normal">online</span></p>
                <div class="mt-4 flex justify-center">
                    <a href="{{ route('home') }}"><button type="button" class="inline-flex items-center text-blue-700 font-medium hover:text-white border-2 border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg py-1 px-3 text-center me-2">Detalles</button></a>
                </div>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg">
                <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{asset('storage/web/horizontal.webp')}}" alt="content">
                <h3 class="tracking-widest text-blue-500 text-xs font-medium title-font">SUBTITLE</h3>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Chichen Itza</h2>
                <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg">
                <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://dummyimage.com/720x400" alt="content">
                <h3 class="tracking-widest text-blue-500 text-xs font-medium title-font">SUBTITLE</h3>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Chichen Itza</h2>
                <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg">
                <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://dummyimage.com/720x400" alt="content">
                <h3 class="tracking-widest text-blue-500 text-xs font-medium title-font">SUBTITLE</h3>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Chichen Itza</h2>
                <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
            </div>

        </div>
    </div>
</x-app-web>