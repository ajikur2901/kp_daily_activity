@php
$breadcrumb = [
[
'nama' => 'Project',
'url' => '#'
],
]
@endphp
<x-app-layout>
    <x-layouts.header>
        <x-slot:title>
            Project Manajemen
        </x-slot:title>
        <x-slot:breadcrumb>
            <x-layouts.breadcrumb :items="$breadcrumb" />
        </x-slot:breadcrumb>
        <x-slot:buttons>
            <x-buttons.a :url=" route('project.create')" :text="'Tambah Data'" :theme="'default'" />
        </x-slot:buttons>
    </x-layouts.header>
    @livewireStyles
    <div class="m-6 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <livewire:project-table />
    </div>
    @livewireScripts
</x-app-layout>