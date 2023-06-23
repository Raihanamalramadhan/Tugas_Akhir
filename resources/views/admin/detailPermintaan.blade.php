@extends('navbar.navbar_admin')

@section('navbar_admin')
<head>
    {{--  menghubungkan leafleat  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    {{--  <!-- Leaflet library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>  --}}

    <!-- CSS for Leaflet Routing Machine -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css">
    <!-- JS for Leaflet Routing Machine -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>


    {{--  Hubungkan CSS  --}}
    <link rel="stylesheet" href="{{ asset('css/navbar/navbar_admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/detailPengajuan.css') }}">

    <link rel="shortcut icon" href="{{ asset('img/logo_judul.svg') }}">
    <title>Merek Cerdas</title>
</head>
<body>
    <main>
        {{--  tabel star  --}}
        <div class="head-title">
            <div class="left">
                <h2>Detail informasi</h2>
                <hr>
            </div>
        </div>
        <div class="kotak2">
            <div class="head">
                <div class="wrapper">
                    <div class="logo">
                        <img src="{{ asset('merek_gambar/' . $data->gambar_merek) }}" alt="Logo" >
                    </div>
                    <div class="form">
                        <div class="inputfield">
                            <label>Nama pemilik</label>
                            <input type="text" class="input" value="{{ $data->nama_pemilik }}" readonly>
                        </div>

                        <div class="inputfield">
                            <label>Nomor telepon</label>
                            <input type="text" class="input" value="{{ $data->nomor_telepon }}" readonly>
                        </div>

                        <div class="inputfield">
                            <label>Nama merek</label>
                            <input type="text" class="input" value="{{ $data->nama_merek }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--  tabel close  --}}


{{--  Peta star  --}}
        <div class="head-title">
            <div class="left">
                <h2>Detail Lokasi</h2>
                <hr>
            </div>
        </div>
        <div class="kotak">
            <div class="order">
                <div id="map" style="height: 500px;
                width: auto;"></div>
            </div>
        </div>
{{--  Peta Close  --}}
    </main>

{{--  js  --}}

    {{--  js peta  --}}
        {{--  script rute  --}}
            <script>
                // Set initial map location and marker
                var curLocation = [{{ $data->latitude }}, {{ $data->longitude }}];
                var map = L.map('map').setView(curLocation, 12);

                var tileLayers = {
                    Streets: L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
                        maxZoom: 20,
                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                    }),
                    Hybrid: L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', {
                        maxZoom: 20,
                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                    })
                };

                // Add tile layers to the map
                tileLayers.Streets.addTo(map);
                tileLayers.Hybrid.addTo(map);

                // Create the base layers object
                var baseLayers = {
                    "Streets": tileLayers.Streets,
                    "Hybrid": tileLayers.Hybrid
                };

                // Create the layer control and add it to the map
                L.control.layers(baseLayers).addTo(map);

                var marker = new L.marker(curLocation, {
                    draggable: false,
                }).addTo(map);

                // Get user's location
                navigator.geolocation.watchPosition(function(position) {
                    var userLocation = [position.coords.latitude, position.coords.longitude];

                    // Remove previous user marker if exists
                    if (typeof userMarker !== 'undefined') {
                        map.removeLayer(userMarker);
                    }

                    // Create user marker and add it to the map
                    var userMarker = new L.marker(userLocation, {
                        draggable: false,
                    }).addTo(map);

                    // Create a routing control and add it to the map
                    L.Routing.control({
                        waypoints: [
                            L.latLng(userLocation[0], userLocation[1]),
                            L.latLng(curLocation[0], curLocation[1])
                        ],
                        routeWhileDragging: true
                    }).addTo(map);
                });
            </script>
</body>
@endsection
