@extends('layouts.app')

@section('pagetitle')
    Edit Project - {{ $project['nama'] }}
@endsection

@section('content')
    <a href="{{ URL::previous() }}" class="btn btn-outline-primary my-3">Back</a>
    <form class="col-md-6" action="{{ route('projects.update', $project['id']) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nama">Project Title</label>
            <input type="text" class="form-control" name="nama" placeholder="Project Title" value="{{ old('nama') ?: $project['nama'] }}" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tanggal_mulai">Start Date</label>
                <input type="date" class="form-control" name="tanggal_mulai" value="{{ old('tanggal_mulai') ?: $project['tanggal_mulai'] }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="tanggal_target">Finished target</label>
                <input type="date" class="form-control" name="tanggal_target" value="{{ old('tanggal_target') ?: $project['tanggal_target'] }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
