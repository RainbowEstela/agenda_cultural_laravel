<div class="container grid px-6 mx-auto">
    <!-- With actions -->
    <h3 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        {{$titulo}}
    </h3>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        {{$head}}
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{$slot}}
                </tbody>
            </table>
        </div>
    </div>
</div>