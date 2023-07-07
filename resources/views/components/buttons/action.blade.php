@props([
'url' => '#',
'theme' => 'default',
'text'
])
@php
$themes = [
'default' => 'inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700
hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700
dark:focus:ring-primary-800',
'green' => 'inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800
focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900',
'red' => 'inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800
focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900',
'purple' => 'inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800
focus:ring-4 focus:ring-purple-300 dark:focus:ring-purple-900',
];
@endphp
<a href="{{ $url }}" class="{{$themes[$theme]}}">
    {{ $text ?? $slot }}
</a>