@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Kolom untuk Peta -->
            <div class="col-9">
                <div id="map" style="width: 100%; height: 600px;"></div>
            </div>

            <!-- Kolom untuk Kontrol -->
            <div class="col-3">
                <div class="controls p-3">
                    <h4>Routing Controls</h4>
                    <button id="setStart" class="btn btn-primary mb-2 w-100">Set Titik Awal</button>
                    <button id="setEnd" class="btn btn-secondary mb-2 w-100">Set Titik Tujuan</button>
                    <button id="calculateRoute" class="btn btn-success mb-2 w-100">Hitung Rute</button>
                    <button id="clearRoute" class="btn btn-danger mb-2 w-100">Clear Route</button>
                    <p id="distance" class="mt-3">Total Distance: -</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi Peta
            const map = L.map('map').setView([-8.546512566957002, 115.30647288983053], 13);

            // Tambahkan Tile Layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Variabel untuk menyimpan titik awal, tujuan, kontrol rute, dan marker
            let startPoint = null;
            let endPoint = null;
            let routingControl = null;
            let startMarker = null;
            let endMarker = null;

            // Fungsi untuk memilih titik awal
            document.getElementById('setStart').addEventListener('click', function() {
                map.once('click', function(e) {
                    startPoint = e.latlng;
                    if (startMarker) map.removeLayer(
                    startMarker); // Hapus marker sebelumnya jika ada
                    startMarker = L.marker(startPoint, {
                        title: "Titik Awal"
                    }).addTo(map);
                    alert("Titik Awal dipilih: " + startPoint.lat + ", " + startPoint.lng);
                });
            });

            // Fungsi untuk memilih titik tujuan
            document.getElementById('setEnd').addEventListener('click', function() {
                map.once('click', function(e) {
                    endPoint = e.latlng;
                    if (endMarker) map.removeLayer(endMarker); // Hapus marker sebelumnya jika ada
                    endMarker = L.marker(endPoint, {
                        title: "Titik Tujuan"
                    }).addTo(map);
                    alert("Titik Tujuan dipilih: " + endPoint.lat + ", " + endPoint.lng);
                });
            });

            // Fungsi untuk menghitung rute
            document.getElementById('calculateRoute').addEventListener('click', function() {
                if (startPoint && endPoint) {
                    // Hapus routing sebelumnya jika ada
                    if (routingControl) {
                        map.removeControl(routingControl);
                    }

                    // Tambahkan routing baru dengan warna biru
                    routingControl = L.Routing.control({
                        waypoints: [
                            L.latLng(startPoint.lat, startPoint.lng),
                            L.latLng(endPoint.lat, endPoint.lng)
                        ],
                        routeWhileDragging: true,
                        lineOptions: {
                            styles: [{
                                color: 'blue',
                                opacity: 0.7,
                                weight: 4
                            }] // Warna dan gaya garis rute
                        }
                    }).addTo(map);

                    // Hitung jarak dan tampilkan
                    routingControl.on('routesfound', function(e) {
                        const routes = e.routes;
                        const summary = routes[0].summary;
                        const distance = (summary.totalDistance / 1000).toFixed(2); // Dalam km
                        document.getElementById('distance').innerText =
                            `Total Distance: ${distance} km`;
                    });
                } else {
                    alert("Titik Awal dan Titik Tujuan harus dipilih terlebih dahulu!");
                }
            });

            // Fungsi untuk membersihkan rute dan marker
            document.getElementById('clearRoute').addEventListener('click', function() {
                // Hapus routing control
                if (routingControl) {
                    map.removeControl(routingControl);
                    routingControl = null;
                }

                // Hapus marker titik awal
                if (startMarker) {
                    map.removeLayer(startMarker);
                    startMarker = null;
                }

                // Hapus marker titik tujuan
                if (endMarker) {
                    map.removeLayer(endMarker);
                    endMarker = null;
                }

                // Reset variabel titik awal dan tujuan
                startPoint = null;
                endPoint = null;

                // Reset jarak
                document.getElementById('distance').innerText = "Total Distance: -";
            });
        });
    </script>
@endsection
