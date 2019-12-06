@extends('layouts.app')

@section('pagetitle')
    Project - {{ $project['nama'] }}
@endsection
{{-- {{ dd($tasks) }} --}}
@section('content')
    <a href="{{ URL::previous() }}" class="btn btn-outline-primary my-3">Back</a>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary my-3">Create New Task</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Project Name</th>
                <th scope="col">Details</th>
                <th scope="col">Start Date</th>
                <th scope="col">Finished Target</th>
                <th scope="col">Finished Date</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $task['nama'] }}</td>
                <td>{{ $task['keterangan'] }}</td>
                <td>{{ $task['tanggal_mulai'] }}</td>
                <td>{{ $task['tanggal_target'] }}</td>
                @if(is_null($task['tanggal_selesai']))
                <td>-</td>
                @else
                <td>{{ $task['tanggal_selesai'] }}</td>
                @endif
                <td>{{ $task['done'] }}</td>
                <td>
                    <a href="{{ route('tasks.show', $task['id']) }}" class="btn btn-outline-primary">Show</a>
                    <a href="{{ route('tasks.edit', $task['id']) }}" class="btn btn-outline-secondary">Edit</a>
                    <form action="{{ route('tasks.destroy', $task['id']) }}" method="POST">
                        <input type="submit" value="Delete" class="btn btn-outline-secondary">
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
