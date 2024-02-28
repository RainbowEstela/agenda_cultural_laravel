<div class="container grid px-6 mx-auto">
    <!-- With actions -->
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{$titulo}}
    </h2>
    @if(isset($buttons))
    <div class="flex gap-4 py-4">
        {{$buttons}}
    </div>
    @endif
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