@props(['active'])

@php
$classes = ($active ?? false)
? 'mr-5 border-b-2 border-blue-600 text-blue-600 hover:text-blue-900 hover:border-blue-900'
: 'mr-5 hover:text-gray-900';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>