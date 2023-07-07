
@php
$breadcrumb = [
[
'nama' => 'Project',
'url' => '#'
],
[
'nama' => 'Edit Project',
'url' => '#'
],
]
@endphp
<x-app-layout>
    <x-layouts.header>
        <x-slot:title>
            Edit Project
        </x-slot:title>
        <x-slot:breadcrumb>
            <x-layouts.breadcrumb :items="$breadcrumb" />
        </x-slot:breadcrumb>
        <x-slot:buttons>
            <x-buttons.a :url=" route('project.index')" :text="'Kembali'" :theme="'red'" />
        </x-slot:buttons>
    </x-layouts.header>
    <div class=" p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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
        <form method="POST" action="{{ route('project.update',['project' => $project]) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                @php
                if($errors->has('kode')){
                $themeKode = "error";
                }else{
                $themeKode = "default";
                }
                @endphp
                <x-forms.input-label for="kode" :theme="$themeKode" :value="'Kode'" />
                <x-forms.text-input type="text" placeholder="kode" name="kode" value="{{ $project->kode }}"
                    autocomplete="off" :theme="$themeKode" />
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
                <x-forms.input-label for="nama" :theme="$themeNama" :Value="'Nama'" />
                <x-forms.text-input type="text" placeholder="nama" name="nama" value="{{ $project->nama }}"
                    autocomplete="off" :theme="$themeNama" />

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
                <x-forms.input-label for="client" :theme="$themeClient" :value="'Client'" />
                <x-forms.text-input placeholder="client" name="client" value="{{ $project->client }}" autocomplete="off"
                    :theme="$themeClient" />
                @error('client')
                <x-forms.input-error messages="{{ $message }}" />
                @enderror
            </div>

            <x-buttons.button type="submit" :text="'Simpan'" />
        </form>
    </div>
</x-app-layout>