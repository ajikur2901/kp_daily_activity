@props(['messages'])

@if ($messages)
<ul {{ $attributes->merge(['class' => 'font-bold mt-2 text-sm text-red-600 dark:text-red-500']) }}>
    @foreach ((array) $messages as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
@endif