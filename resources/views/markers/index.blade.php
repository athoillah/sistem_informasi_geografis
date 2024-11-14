@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Map with Markers</h2>
        <div id="map" style="height: 500px;"></div> terte
    </div>

    <script>
        var map = L.map('map').setView([0, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        @foreach ($markers as $marker)
            L.marker([{{ $marker->latitude }}, {{ $marker->longitude }}])
                .addTo(map)
                .bindPopup("<b>{{ $marker->name }}</b><br>{{ $marker->description }}");
        @endforeach
    </script>
@endsection
