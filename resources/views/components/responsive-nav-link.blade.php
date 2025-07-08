@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-white text-start text-base font-medium text-white bg-purple-700/50 focus:outline-none focus:text-purple-200 focus:bg-purple-700/70 focus:border-purple-200 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-white hover:text-purple-200 hover:bg-purple-700/30 hover:border-purple-200 focus:outline-none focus:text-purple-200 focus:bg-purple-700/30 focus:border-purple-200 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
