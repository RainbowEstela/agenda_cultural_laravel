<x-layout-admin>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Añadir evento
        </h2>

        <form action="" method="post">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <x-input.admin-text>
                    <x-slot name="dato">
                        Nombre
                    </x-slot>
                    <x-slot name="name">
                        nombre
                    </x-slot>
                    <x-slot name="placeholder">
                        Concierto de Rock y Metal
                    </x-slot>
                </x-input.admin-text>

                <x-div.margin-top>
                    <x-input.admin-date>
                        <x-slot name="dato">
                            Fecha
                        </x-slot>
                        <x-slot name="name">
                            fecha
                        </x-slot>
                        <x-slot name="placeholder">
                            Concierto de Rock y Metal
                        </x-slot>
                    </x-input.admin-date>
                </x-div.margin-top>

                <x-div.margin-top>
                    <x-input.admin-hora>
                        <x-slot name="dato">
                            Hora
                        </x-slot>
                        <x-slot name="hora">
                            hora
                        </x-slot>
                        <x-slot name="minuto">
                            minutos
                        </x-slot>
                    </x-input.admin-hora>
                </x-div.margin-top>

                <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Account Type
                    </span>
                    <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="accountType" value="personal" />
                            <span class="ml-2">Personal</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="accountType" value="busines" />
                            <span class="ml-2">Business</span>
                        </label>
                    </div>
                </div>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Requested Limit
                    </span>
                    <select class="block w-full p-2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option>$1,000</option>
                        <option>$5,000</option>
                        <option>$10,000</option>
                        <option>$25,000</option>
                    </select>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Multiselect
                    </span>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" multiple>
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                        <option>Option 4</option>
                        <option>Option 5</option>
                    </select>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Message</span>
                    <textarea class="block w-full p-2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some long form content."></textarea>
                </label>

                <div class="flex mt-6 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            I agree to the
                            <span class="underline">privacy policy</span>
                        </span>
                    </label>
                </div>
            </div>
        </form>
    </div>
</x-layout-admin>