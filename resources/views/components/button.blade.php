@props(['type' => 'button', 'color' => 'primary'])

@php
    $classes = match($color) {
        'primary' => 'bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500',
        'secondary' => 'bg-gray-600 hover:bg-gray-700 focus:ring-gray-500',
        'success' => 'bg-green-600 hover:bg-green-700 focus:ring-green-500',
        'danger' => 'bg-red-600 hover:bg-red-700 focus:ring-red-500',
        'warning' => 'bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500',
        default => 'bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500'
    };
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 ' . $classes]) }}>
    {{ $slot }}
</button>
