@php
$breadcrumb = [
[
'nama' => 'Activity',
'url' => '#'
],
[
'nama' => 'Edit Activity',
'url' => '#'
],
]
@endphp
<x-app-layout>
    <x-layouts.header>
        <x-slot:title>
            Edit Activity
        </x-slot:title>
        <x-slot:breadcrumb>
            <x-layouts.breadcrumb :items="$breadcrumb" />
        </x-slot:breadcrumb>
        <x-slot:buttons>
            <x-buttons.a :url=" route('activity.index')" :text="'Kembali'" :theme="'red'" />
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
        <form method="POST" action="{{ route('activity.update',$activity) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                @php
                if($errors->has('title')){
                $themeTitle = "error";
                }else{
                $themeTitle = "default";
                }
                @endphp
                <x-forms.input-label for="title" :theme="$themeTitle" :value="'Judul'" />
                <x-forms.text-input type="text" placeholder="title" name="title" value="{{ $activity->title }}"
                    autocomplete="off" :theme="$themeTitle" />
                @error('title')
                <x-forms.input-error messages="{{ $message }}" />
                @enderror
            </div>
            <div class="mb-3">
                @php
                if($errors->has('project_id')){
                $themeProjectId = "error";
                }else{
                $themeProjectId = "default";
                }
                $projectId = $activity->project_id;
                @endphp
                <x-forms.input-label for="project_id" :theme="$themeProjectId" :Value="'Project'" />
                <x-forms.select name="project_id" :theme="$themeProjectId" 
                    :items="$projects" :value="'$id'" :text="'nama'" :placeholder="'Pilih Project'" :selected="$projectId"/>
                @error('project_id')
                <x-forms.input-error messages="{{ $message }}"/>
                @enderror
            </div>

            <x-buttons.button type="submit" :text="'Simpan'" />
        </form>
    </div>
</x-app-layout>