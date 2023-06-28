@props([
    'disabled' => false,
    'theme' => 'default'
    ])
@php
    $themes = [
    'default' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
    w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
    dark:focus:border-blue-500',
    'success' => 'bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg
    focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400',
    'danger' => 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500
    focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400'
];
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $themes[$theme]]) !!}>