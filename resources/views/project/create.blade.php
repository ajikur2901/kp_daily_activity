@php
$breadcrumb = [
[
'nama' => 'Project',
'url' => '#'
],
[
'nama' => 'Create Project',
'url' => '#'
],
]
@endphp
<x-app-layout>
    <x-layouts.header>
        <x-slot:title>
            Create Project
        </x-slot:title>
        <x-slot:breadcrumb>
            <x-layouts.breadcrumb :items="$breadcrumb" />
        </x-slot:breadcrumb>
        <x-slot:buttons>
            <x-buttons.a :url=" route('project.index')" :text="'Kembali'" :theme="'red'" />
        </x-slot:buttons>
    </x-layouts.header>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-5">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg max-w-xl">
        @if ($message = Session::get('error'))
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <form method="POST" action="{{ route('project.store') }}">
            @csrf

            <div class="mb-3">
                @php
                if($errors->has('kode')){
                    $themeKode = "error";
                }else{
                    $themeKode = "default";
                }
                @endphp
                <x-forms.input-label for="kode" :theme="$themeKode" :value="'Kode'"/>
                <x-forms.text-input type="text" placeholder="kode" name="kode" value="{{ old('kode') }}" autocomplete="off" :theme="$themeKode"/>
                @error('kode')
                <x-forms.input-error messages="{{ $message }}" />
                @enderror
            </div>
            <div class="mb-3">
                @php
                if($errors->has('nama')){
                    $themeNama = "error";
                }else{
                    $themeNama = "default";
                }
                @endphp
                <x-forms.input-label for="nama" :theme="$themeNama" :Value="'Nama'"/>
                <x-forms.text-input type="text" placeholder="nama" name="nama" value="{{ old('nama') }}" autocomplete="off" :theme="$themeNama"/>
                
                @error('nama')
                <x-forms.input-error messages="{{ $message }}" />
                @enderror
            </div>
            <div class="mb-3">
                @php
                    if($errors->has('client')){
                        $themeClient = "error";
                    }else{
                        $themeClient = "default";
                    }
                @endphp
                <x-forms.input-label for="client" :theme="$themeClient" :value="'Client'"/>
                <x-forms.text-input placeholder="client" name="client" value="{{ old('client') }}" autocomplete="off" :theme="$themeClient"/>
                @error('client')
                <x-forms.input-error messages="{{ $message }}" />
                @enderror
            </div>

            <x-buttons.button type="submit" :text="'Simpan'"/>
        </form>
    </div>
</div>
</x-app-layout>