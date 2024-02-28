<label class="block text-sm">
    <span class="text-gray-700 dark:text-gray-400">{{$dato}}</span>
    <input type="email" required placeholder="{{$placeholder}}" name="{{$name}}" @if(isset($value)) value="{{$value}}" @endif class="block w-full p-2 rounded-md mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
</label>