<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div class="container flex items-center justify-between md:justify-end h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
        <div class="flex md:hidden justify-end items-center">
            <x-dropdown :align='"left"' :contentClasses="'py-1 bg-white dark:bg-gray-800'">
                <x-slot name="trigger">
                    <button class="p-1 mr-5 -ml-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <aside>
                        <div class="py-4 text-gray-500 dark:text-gray-400">
                            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                                Windmill
                            </a>
                            <ul class="mt-6">
                                <x-navs.dropdown-link-admin :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    <x-slot name="svg">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4H1m3 4H1m3 4H1m3 4H1m6.071.286a3.429 3.429 0 1 1 6.858 0M4 1h12a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm9 6.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                    </x-slot>
                                    {{ __('Eventos') }}
                                </x-navs.dropdown-link-admin>
                            </ul>
                            <ul>
                                <x-navs.dropdown-link-admin :active="request()->routeIs('/')">
                                    <x-slot name="svg">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.9 15.1 15 9m-5-.6h0m3.1 7.2h0M14 4a2.8 2.8 0 0 0 2.3.9 2.8 2.8 0 0 1 2.9 3 2.8 2.8 0 0 0 .9 2.1 2.8 2.8 0 0 1 0 4.2 2.8 2.8 0 0 0-.9 2.2 2.8 2.8 0 0 1-3 2.9 2.8 2.8 0 0 0-2.1.9 2.8 2.8 0 0 1-4.2 0 2.8 2.8 0 0 0-2.2-.9 2.8 2.8 0 0 1-2.9-3 2.8 2.8 0 0 0-.9-2.1 2.8 2.8 0 0 1 0-4.2 2.8 2.8 0 0 0 .9-2.2 2.8 2.8 0 0 1 3-2.9A2.8 2.8 0 0 0 9.9 4a2.8 2.8 0 0 1 4.2 0Z" />
                                    </x-slot>
                                    {{ __('Experiencias') }}
                                </x-navs.dropdown-link-admin>

                                <x-navs.dropdown-link-admin :active="request()->routeIs('/')">
                                    <x-slot name="svg">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12c.3 0 .5 0 .8-.2.2 0 .4-.3.6-.5l.4-.7.2-.9c0 .6.2 1.2.6 1.6.4.4.9.7 1.4.7.5 0 1-.3 1.4-.7.4-.4.6-1 .6-1.6 0 .6.2 1.2.6 1.6.4.4.9.7 1.4.7.5 0 1-.3 1.4-.7.4-.4.6-1 .6-1.6a2.5 2.5 0 0 0 .6 1.6l.6.5a1.8 1.8 0 0 0 1.6 0l.6-.5.4-.7.2-.9c0-1-1.1-3.8-1.6-5a1 1 0 0 0-1-.7h-11a1 1 0 0 0-.9.6A29 29 0 0 0 4 9.7c0 .6.2 1.2.6 1.6.4.4.9.7 1.4.7Zm0 0c.3 0 .7 0 1-.3l.7-.7h.6c.2.3.5.6.8.7a1.8 1.8 0 0 0 1.8 0c.3-.1.6-.4.8-.7h.6c.2.3.5.6.8.7a1.8 1.8 0 0 0 1.8 0c.3-.1.6-.4.8-.7h.6c.2.3.5.6.8.7.2.2.6.3.9.3.4 0 .7-.1 1-.4M6 12a2 2 0 0 1-1.2-.5m.2.5v7c0 .6.4 1 1 1h2v-5h3v5h7c.6 0 1-.4 1-1v-7m-5 3v2h2v-2h-2Z" />
                                    </x-slot>
                                    {{ __('Empresas') }}
                                </x-navs.dropdown-link-admin>
                                <x-navs.dropdown-link-admin :active="request()->routeIs('/')">
                                    <x-slot name="svg">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.6 8.4h0m-4.7 11.3-6.6-6.6a1 1 0 0 1 0-1.4l7.3-7.4a1 1 0 0 1 .7-.3H18a2 2 0 0 1 2 2v5.5a1 1 0 0 1-.3.7l-7.5 7.5a1 1 0 0 1-1.3 0Z" />
                                    </x-slot>
                                    {{ __('Categorías') }}
                                </x-navs.dropdown-link-admin>

                                <x-navs.dropdown-link-admin :active="request()->routeIs('/')">
                                    <x-slot name="svg">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.3-.6-1-1-1.6-1H7.6c-.7 0-1.3.4-1.6 1M4 5h16c.6 0 1 .4 1 1v12c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                                    </x-slot>
                                    {{ __('Usuarios') }}
                                </x-navs.dropdown-link-admin>
                            </ul>
                        </div>
                    </aside>
                </x-slot>
            </x-dropdown>
        </div>
        <!-- Search input -->
        <div class="flex justify-center flex-1 lg:mr-32 hidden">
            <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                <div class="absolute inset-y-0 flex items-center pl-2">
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search for projects" aria-label="Search" />
            </div>
        </div>
        <ul class="flex items-center flex-shrink-0 space-x-6">
            <!-- Theme toggler -->
            <li class="flex">
                <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
                    <template x-if="!dark">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </template>
                    <template x-if="dark">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                        </svg>
                    </template>
                </button>
            </li>
            <!-- Profile menu -->
            <li class="relative">
                <x-dropdown :contentClasses="'py-1 bg-white dark:bg-gray-800'">
                    <x-slot name="trigger">
                        <button class="flex items-center">

                            <div>
                                {{ Auth::user()->name }}
                            </div>
                            <div class="pt-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>

                            <img class="object-cover w-8 h-8 rounded-full ms-1" src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82" alt="" aria-hidden="true" />

                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <ul>
                                <x-navs.dropdown-link-admin :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <x-slot name="svg">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                    </x-slot>
                                    {{ __('Log Out') }}
                                </x-navs.dropdown-link-admin>
                            </ul>

                        </form>
                    </x-slot>
                </x-dropdown>
            </li>
        </ul>
    </div>
</header>