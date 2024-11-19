@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Map with Markers</h2>
        <div id="map" style="height: 500px;"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mengatur tampilan awal peta pada lokasi tertentu
            const map = L.map('map').setView([-8.546512566957002, 115.30647288983053], 13);

            // Menambahkan tile layer OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);


            // Definisikan ikon kustom
            const customIcon = L.icon({
                iconUrl: '{{ asset('images/pin_icon.png') }}', // path ke ikon kustom
                iconSize: [32, 32], // ukuran ikon
                iconAnchor: [16, 32], // titik anchor ikon
                popupAnchor: [0, -32] // posisi popup relatif ke ikon
            });

            // Tambahkan marker dengan ikon kustom
            @foreach ($markers as $marker)
                L.marker([{{ $marker->latitude }}, {{ $marker->longitude }}], {
                        icon: customIcon
                    })
                    .addTo(map)
                    .bindPopup("<b>{{ $marker->name }}</b><br>{{ $marker->description }}");
            @endforeach
        });
    </script>
@endsection
