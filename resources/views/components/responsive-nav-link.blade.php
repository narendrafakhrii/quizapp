@props(['active' => false])

@php
    $classes = $active
        ? 'inline-flex items-center px-3 py-2 rounded-md bg-white text-black text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out'
        : 'inline-flex items-center px-3 py-2 rounded-md text-gray-500 hover:bg-gray-100 hover:text-black text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
