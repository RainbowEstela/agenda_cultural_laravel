<header class="text-gray-600 body-font bg-blue-100">
    <div class=" container mx-auto flex p-5 flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-0">
            <img src="http://localhost/storage/web/agenda-icon.png" alt="" class="w-10 h-10">
            <span class="ml-3 text-xl">A.C. Estela</span>
        </a>



        <div class="justify-between items-center grow hidden md:flex">
            <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 border-b-2 border-blue-600 text-blue-600 hover:text-gray-900">Inicio</a>
                <a class="mr-5 hover:text-gray-900">Agenda</a>
                <a class="mr-5 hover:text-gray-900">Explora</a>
                <a class="mr-5 hover:text-gray-900">Experiencias</a>
            </nav>
            @auth
            <div class="flex gap-2">
                <p>Welcome: </p>
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="flex items-center">
                            <div>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
            <button type="button" class="inline-flex items-center text-base font-medium hover:text-white border-2 border-gray-600 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg py-1 px-3 text-center me-2">login</button>
            <button type="button" class="inline-flex items-center text-base font-medium hover:text-white border-2 border-gray-600 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg py-1 px-3 text-center me-2">register</button>
            @endauth

        </div>

        <div class="flex md:hidden justify-end items-center grow">
            @auth
            <div class="flex gap-2 pe-4">
                <p>Welcome: </p>
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="flex items-center">
                            <div>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
            <button type="button" class="inline-flex items-center text-base font-medium hover:text-white border-2 border-gray-600 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg py-1 px-3 text-center me-2">login</button>
            <button type="button" class="inline-flex items-center text-base font-medium hover:text-white border-2 border-gray-600 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg py-1 px-3 text-center me-2">register</button>
            @endauth


            <x-dropdown>
                <x-slot name="trigger">
                    <button class="flex items-center">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        Inicio
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('profile.edit')">
                        Agenda
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('profile.edit')">
                        Explora
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('profile.edit')">
                        Experiencias
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>

        </div>

    </div>
</header>