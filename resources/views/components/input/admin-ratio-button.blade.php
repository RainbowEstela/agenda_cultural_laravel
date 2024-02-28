@props(['active' => false])

@if($active)
<label class="inline-flex items-center text-gray-600 dark:text-gray-400">
    <input checked type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="{{$name}}" value="{{$value}}" />
    <span class="ml-2">{{$tipo}}</span>
</label>
@else
<label class="inline-flex items-center text-gray-600 dark:text-gray-400">
    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="{{$name}}" value="{{$value}}" />
    <span class="ml-2">{{$tipo}}</span>
</label>
@endif