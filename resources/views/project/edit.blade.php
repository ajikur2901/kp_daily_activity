@extends('layouts.app')

@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Project
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <a href="{{URL::to('projects')}}" class="btn btn-danger">
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
                <form method="POST" action="{{ route('projects.update',['project' => $project]) }}">
                    @method('PATCH')
                    @csrf

                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control  @error('kode') is-invalid @enderror" placeholder="kode"
                            name="kode" value="{{ $project->kode }}" autocomplete="off">
                        @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control  @error('nama') is-invalid @enderror" placeholder="nama"
                            name="nama" value="{{ $project->nama }}" autocomplete="off">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="client" class="form-label">Client</label>
                        <input type="text" class="form-control  @error('client') is-invalid @enderror"
                            placeholder="client" name="client" value="{{ $project->client }}" autocomplete="off">
                        @error('client')
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
</div>
@endsection