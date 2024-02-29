@props(['active' => false])

@if($active)
<label class="block text-sm">
    <span class="text-gray-700 dark:text-gray-400">{{$dato}}</span>
    <input step="0.01" required type="number" placeholder="{{$placeholder}}" name="{{$name}}" min="{{$min}}" max="{{$max}}" @if(isset($value)) value="{{$value}}" @endif class="block w-full p-2 rounded-md mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
</label>
@else
<label class="block text-sm">
    <span class="text-gray-700 dark:text-gray-400">{{$dato}}</span>
    <input required type="number" placeholder="{{$placeholder}}" name="{{$name}}" min="{{$min}}" max="{{$max}}" @if(isset($value)) value="{{$value}}" @endif class="block w-full p-2 rounded-md mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
</label>
@endif