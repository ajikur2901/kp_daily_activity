@php
$breadcrumb = [
[
'nama' => 'User',
'url' => '#'
],
[
'nama' => 'Create User',
'url' => '#'
],
]
@endphp
<x-app-layout>
    <x-layouts.header>
        <x-slot:title>
            Create User
        </x-slot:title>
        <x-slot:breadcrumb>
            <x-layouts.breadcrumb :items="$breadcrumb" />
        </x-slot:breadcrumb>
        <x-slot:buttons>
            <x-buttons.a :url=" route('user.index')" :text="'Kembali'" :theme="'red'" />
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
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="mb-3">
                    @php
                    if($errors->has('name')){
                    $themeName = "error";
                    }else{
                    $themeName = "default";
                    }
                    @endphp
                    <x-forms.input-label for="name" :theme="$themeName" :Value="'Nama'" />
                    <x-forms.text-input type="text" placeholder="name" name="name" value="{{ old('name') }}" autocomplete="off"
                        :theme="$themeName" />

                    @error('name')
                    <x-forms.input-error messages="{{ $message }}" />
                    @enderror
                </div>
                <div class="mb-3">
                    @php
                    if($errors->has('email')){
                    $themeEmail = "error";
                    }else{
                    $themeEmail = "default";
                    }
                    @endphp
                    <x-forms.input-label for="email" :theme="$themeEmail" :Value="'Email'" />
                    <x-forms.text-input type="email" placeholder="email" name="email" value="{{ old('email') }}" autocomplete="off"
                        :theme="$themeEmail" />

                    @error('email')
                    <x-forms.input-error messages="{{ $message }}" />
                    @enderror
                </div>
                <div class="mb-3">
                    @php
                    if($errors->has('password')){
                    $themePassword = "error";
                    }else{
                    $themePassword = "default";
                    }
                    @endphp
                    <x-forms.input-label for="password" :theme="$themePassword" :Value="'Password'" />
                    <x-forms.text-input type="password" placeholder="password" name="password" value="{{ old('password') }}" autocomplete="off"
                        :theme="$themePassword" />

                    @error('password')
                    <x-forms.input-error messages="{{ $message }}" />
                    @enderror
                </div>
                <div class="mb-3">
                    @php
                    if($errors->has('password')){
                    $themePassword = "error";
                    }else{
                    $themePassword = "default";
                    }
                    @endphp
                    <x-forms.input-label for="password" :theme="$themePassword" :Value="'Confirm Password'" />
                    <x-forms.text-input type="password" placeholder="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                        autocomplete="off" :theme="$themePassword" />

                    @error('password')
                    <x-forms.input-error messages="{{ $message }}" />
                    @enderror
                </div>
                <div class="mb-3">
                    @php
                    if($errors->has('level')){
                    $themeLevel = "error";
                    }else{
                    $themeLevel = "default";
                    }
                    @endphp
                    <x-forms.input-label for="level" :theme="$themeLevel" :Value="'Role'" />
                    <x-forms.select name="level" :theme="$themeLevel" :placeholder="'Pilih Role'">
                        @foreach ($roles as $role)
                            <option value="{{$role}}">{{$role}}</option>
                        @endforeach
                    </x-forms.select>
                    @error('level')
                    <x-forms.input-error messages="{{ $message }}" />
                    @enderror
                </div>
                <x-buttons.button type="submit" :text="'Simpan'" />
            </form>
        </div>
    </div>
</x-app-layout>