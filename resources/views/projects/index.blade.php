@extends('layouts.app')

@section('pagetitle')
    Projects
@endsection

@section('content')
    <a href="{{ route('projects.create') }}" class="btn btn-primary my-3">Create New Project</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Project Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">Finished Target</th>
                <th scope="col">Finished Date</th>
                <th scope="col" colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $project['nama'] }}</td>
                <td>{{ $project['tanggal_mulai'] }}</td>
                <td>{{ $project['tanggal_target'] }}</td>
                @if(is_null($project['tanggal_selesai']))
                <td>-</td>
                @else
                <td>{{ $project['tanggal_selesai'] }}</td>
                @endif
                <td>
                    <a href="{{ route('projects.show', $project['id']) }}" class="btn btn-outline-primary">Show</a>
                    <a href="{{ route('projects.edit', $project['id']) }}" class="btn btn-outline-secondary">Edit</a>
                    <form action="{{ route('projects.destroy', $project['id']) }}" method="POST">
                        <input type="submit" value="Delete" class="btn btn-outline-secondary">
                        @method('delete')
                        @csrf
                    </form>
                    {{-- <a href="{{ route('projects.destroy', $project['id']) }}" class="btn btn-outline-secondary">Destroy</a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
