@php
$breadcrumb = [
[
'nama' => 'Timeline',
'url' => '#'
],
]
@endphp
<x-app-layout>
    <x-layouts.header>
        <x-slot:title>
            Timeline
        </x-slot:title>
        <x-slot:breadcrumb>
            <x-layouts.breadcrumb :items="$breadcrumb" />
        </x-slot:breadcrumb>
    </x-layouts.header>
    @livewireStyles
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
            <form method="POST" action="{{ route('timeline.project') }}">
                @csrf
                <div class="mb-3">
                    @php
                    if($errors->has('project')){
                    $themeLevel = "error";
                    }else{
                    $themeLevel = "default";
                    }
                    @endphp
                    <x-forms.input-label for="project" :theme="$themeLevel" :Value="'Project'" />
                    <x-forms.select name="project" :theme="$themeLevel" :placeholder="'Pilih Project'">
                        @foreach ($projects as $project)
                        <option value="{{$project->id}}">{{$project->nama}}</option>
                        @endforeach
                    </x-forms.select>
                    @error('project')
                    <x-forms.input-error messages="{{ $message }}" />
                    @enderror
                </div>
                <x-buttons.button type="submit" :text="'Show'" />
            </form>
        </div>
    </div>
    @livewireScripts
</x-app-layout>