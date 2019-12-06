@extends('layouts.app')

@section('pagetitle')
    Create Project
@endsection

@section('content')
    <a href="{{ URL::previous() }}" class="btn btn-outline-primary my-3">Back</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="col-md-6" action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Project Title</label>
            <input type="text" class="form-control" name="nama" placeholder="Project Title" value="{{ old('nama') }}" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tanggal_mulai">Start Date</label>
                <input type="date" class="form-control" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="tanggal_target">Finished target</label>
                <input type="date" class="form-control" name="tanggal_target" value="{{ old('tanggal_target') }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
