@php
$hasContentStyle = isset($contentStyle);
$hasContentScriptHead = isset($contentScriptHead);
$hasContentScript = isset($contentScript);
@endphp


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{--
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    @if ($hasContentStyle)
    {{$contentStyle}}
    @endif
    @if ($hasContentScriptHead)
    {{$contentScriptHead}}
    @endif

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/flowbit/flowbit.js'])
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="bg-gray-50 dark:bg-gray-800">
    @include('layouts.navigation')

    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        @include('layouts.sidebar')
        <!-- Page Content -->
        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main>
                {{ $slot }}
            </main>
            @include('layouts.footer')
        </div>
    </div>

    @if ($hasContentScript)
    {{$contentScript}}
    @endif
</body>

</html>