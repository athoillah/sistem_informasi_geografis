@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Markers List</h2>
        <a href="{{ route('markers.create') }}" class="btn btn-primary mb-3">Add New Marker</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($markers as $marker)
                    <tr>
                        <td>{{ $marker->name }}</td>
                        <td>{{ $marker->latitude }}</td>
                        <td>{{ $marker->longitude }}</td>
                        <td>{{ $marker->description }}</td>
                        <td>
                            <a href="{{ route('markers.edit', $marker->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('markers.destroy', $marker->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
