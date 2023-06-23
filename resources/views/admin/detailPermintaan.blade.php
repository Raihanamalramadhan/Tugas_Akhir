@extends('navbar.navbar_admin')

@section('navbar_admin')
<head>
    {{--  menghubungkan leafleat  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    {{--  Hubungkan CSS  --}}
    <link rel="stylesheet" href="css/admin/detailPermintaan.css">

</head>
<body>
    <main>
{{--  Peta star  --}}
        <div class="head-title">
            <div class="left">
                <h2>Detail Lokasi</h2>
                <hr>
            </div>
        </div>
        <div class="kotak">
            <div class="order">
                <div id="map"></div>
            </div>
        </div>
{{--  Peta Close  --}}

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
                        <img src="img/logo_judul.svg" alt="Logo">
                    </div>
                    <div class="form">
                        <div class="inputfield">
                            <label>Nomor pemohon</label>
                            <input type="text" class="input">
                        </div>

                        <div class="inputfield">
                            <label>Nama pemilik</label>
                            <input type="text" class="input">
                        </div>

                        <div class="inputfield">
                            <label>Nomor telepon</label>
                            <input type="text" class="input">
                        </div>

                        <div class="inputfield">
                            <label>Email</label>
                            <input type="text" class="input">
                        </div>

                        <div class="inputfield">
                            <label>Nama merek</label>
                            <input type="text" class="input">
                        </div>

                        <div class="inputfield">
                            <label>Tahun penerimaan</label>
                            <input type="text" class="input">
                        </div>

                        <div class="inputfield">
                            <label>Tipe pemohon</label>
                            <input type="text" class="input">
                        </div>

                        <div class="inputfield">
                            <label>kelas</label>
                            <input type="text" class="input">
                        </div>

                        <div class="inputfield">
                            <label>kabupaten</label>
                            <input type="text" class="input">
                        </div>

                        <div class="inputfield">
                            <label>Status</label>
                            <select id="status" name="status" class="input">
                                <option value="belum_bersertifikat">Belum bersertifikat</option>
                                <option value="bersertifikat">Bersertifikat</option>
                            </select>
                        </div>

                        <div class="inputfield">
                            <input type="submit" value="simpan" class="btn">
                            <a href="/beranda"><input type="submit" value="keluar" class="btn2"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--  tabel close  --}}

{{--  js  --}}

    {{--  js peta  --}}
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([4.6951, 96.7494], 8);

        // Menambahkan opsi tampilan peta
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

        // Menambahkan layer default
        tileLayers.Streets.addTo(map);

        // Menambahkan kontrol layer
        L.control.layers(tileLayers).addTo(map);

        var marker;
        map.on('click', function (e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(e.latlng).addTo(map);
            var latitude = e.latlng.lat.toFixed(6);
            var longitude = e.latlng.lng.toFixed(6);
            document.getElementById('latitudeValue').textContent = 'Latitude: ' + latitude;
            document.getElementById('longitudeValue').textContent = 'Longitude: ' + longitude;
        });
        // Tambahkan marker pada peta
        var marker = L.marker([5.3191, 95.3217]).addTo(map);
        marker.bindPopup("<b>foto merek</b><br>nama merek, nama pemilik, no telepon").openPopup();
    </script>
@endsection
