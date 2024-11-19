@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Marker</h2>
        <form action="{{ route('markers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" name="latitude" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" name="longitude" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
