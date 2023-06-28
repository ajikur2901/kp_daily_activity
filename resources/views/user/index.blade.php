@php
$breadcrumb = [
[
'nama' => 'Setting',
'url' => '#'
],
[
'nama' => 'User',
'url' => '#'
],
]
@endphp
<x-app-layout>
    <x-layouts.header>
        <x-slot:title>
            User Manajemen
        </x-slot:title>
        <x-slot:breadcrumb>
            <x-layouts.breadcrumb :items="$breadcrumb" />
        </x-slot:breadcrumb>
        <x-slot:buttons>
            <x-buttons.a :url=" route('user.create')" :text="'Tambah Data'" :theme="'default'" />
        </x-slot:buttons>
    </x-layouts.header>
    @livewireStyles
    <div class="m-6 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <livewire:user-table />
    </div>
    @livewireScripts
</x-app-layout>