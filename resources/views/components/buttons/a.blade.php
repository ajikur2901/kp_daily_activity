@php
$themes = [
'default' => 'btn-default',
'alternative' => 'btn-alternative',
'dark' => 'btn-dark',
'light' => 'btn-light',
'green' => 'btn-green',
'red' => 'btn-red',
'yellow' => 'btn-yellow',
'purple' => 'btn-purple',
];
@endphp
@props([
    'url' => '#',
'theme' => 'default',
'text'
])
<a href="{{ $url }}" class="{{$themes[$theme]}}">
    {{ $text ?? $slot }}
</a>