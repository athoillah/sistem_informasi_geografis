@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Marker</h2>
        <form action="{{ route('markers.update', $marker->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $marker->name }}" required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" name="latitude" class="form-control" value="{{ $marker->latitude }}" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" name="longitude" class="form-control" value="{{ $marker->longitude }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $marker->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
