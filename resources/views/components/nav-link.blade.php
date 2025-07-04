@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 text-sm font-medium leading-5 text-white border-b-2 border-white focus:outline-none focus:border-purple-200 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-3 py-2 text-sm font-medium leading-5 text-white hover:text-purple-200 border-b-2 border-transparent hover:border-purple-200 focus:outline-none focus:text-purple-200 focus:border-purple-200 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
