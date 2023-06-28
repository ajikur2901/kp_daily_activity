@props(['value'])
@php
    $themes = [
        'default' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white',
        'success' => 'block mb-2 text-sm font-medium text-green-700 dark:text-green-500',
        'error' => 'block mb-2 text-sm font-medium text-red-700 dark:text-red-500'
    ]
@endphp
<label {{ $attributes->merge(['class' => $themes['default']]) }}>
    {{ $value ?? $slot }}
</label>
