@extends('layouts.app')

@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Tambah Aktifitas
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
                <a href="{{URL::to('activity')}}" class="btn btn-danger">
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
                <form method="POST" action="{{ route('activity.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="kode" class="form-label">Title</label>
                        <input type="text" class="form-control  @error('title') is-invalid @enderror"
                            placeholder="title" name="title" value="{{ old('title') }}" autocomplete="off">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Project</label>
                        <select name="project_id" id="project_id"
                            class="form-select  @error('project_id') is-invalid @enderror" data-placeholder="Project">
                            @foreach ($projects as $project)
                            <option value="{{$project->id}}">{{$project->nama}}</option>
                            @endforeach
                        </select>
                        @error('project_id')
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

@section('content-script')
<script>
    $(document).ready(function(){
            $('#project_id').select2()
        })
</script>
@endsection