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
'disabled' => false,
'theme' => 'default',
'text' => 'button'
])
<button {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $themes[$theme]]) !!}>
    {{ $text }}
</button>