@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100'
: 'inline-flex items-center w-full text-sm font-semibold text-gray-500 dark:text-gray-400 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100';

$span = ($active ?? false)
? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg'
: 'hidden';
@endphp

<li class="relative px-6 py-3">
    <span {{ $attributes->merge(['class' => $span]) }}></span>
    <a {{ $attributes->merge(['class' => $classes]) }} href="index.html">
        @if(isset($svg))
        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            {{$svg}}
        </svg>
        <span class="ml-4">{{$slot}}</span>
        @else
        <span>{{$slot}}</span>
        @endif
    </a>
</li>