<label class="block text-sm">
    <span class="text-gray-700 dark:text-gray-400">{{$dato}}</span>
    <div class="flex items-center">
        <input required type="number" placeholder="17" name="{{$hora}}" min="0" max="24" @if(isset($valuehora)) value="{{$valuehora}}" @endif class="block w-full p-2 rounded-md mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
        <span class="text-gray-700 dark:text-gray-400 px-4 text-lg font-semibold">:</span>
        <input required type="number" placeholder="30" name="{{$minuto}}" min="0" max="59" @if(isset($valueminuto)) value="{{$valueminuto}}" @endif class="block w-full p-2 rounded-md mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
    </div>
</label>