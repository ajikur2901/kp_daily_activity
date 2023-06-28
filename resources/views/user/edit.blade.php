@extends('layouts.app')

@section('content')
<div class="content-wrapper container">
    <div class="card">
        <div class="card-header">
            <a href="{{URL::to('users')}}" class="btn btn-danger">
                <span class="bi bi-arrow-left-circle"></span> Kembali
            </a>
        </div>
        <div class="card-body">
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
            <form method="POST" action="{{ route('users.update',['user' => $user]) }}">
                @method('PATCH')
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="name"
                        name="name" value="{{ $user->name }}" autocomplete="off">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="email"
                        name="email" value="{{ $user->email }}" autocomplete="off">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button class="btn btn-primary shadow-lg mt-5">Simpan</button>
            </form>
        </div>
    </div>

</div>
@endsection