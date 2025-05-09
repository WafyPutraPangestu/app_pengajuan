<!-- components/nav-link.blade.php -->
@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1   text-sm font-medium leading-5 text-pink-500 focus:outline-none focus:border-pink-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1   text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

