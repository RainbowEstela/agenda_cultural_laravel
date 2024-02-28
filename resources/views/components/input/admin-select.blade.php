<label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
        {{$dato}}
    </span>
    <select name="{{$name}}" class="block w-full p-2 rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        {{$slot}}
    </select>
</label>