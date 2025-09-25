@props(['href' => '#'])

<button onclick="window.location.href='{{ $href }}'"
    {{ $attributes->merge(['type' => 'submit', 'class' => 'items-center bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-900 active:bg-gray-900   transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
