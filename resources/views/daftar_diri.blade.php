<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{--  menghubingkan icon cloedflore  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    {{--  Menhubungkan Leafleat  --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">


    {{--  menghubungkan CSS  --}}
    <link rel="stylesheet" href="css/daftar_diri.css">

    <link rel="shortcut icon" href="img/logo_judul.svg">
    <title>Merek Cerdas</title>
</head>
<body>
{{--  Register Start  --}}
    <div class="container">
        <div class="login">
            <form action="{{url('ajukan')}}" enctype="multipart/form-data" method="post" onsubmit="return validateForm()" >
                @csrf
                <a href="/">
                    <i class="fas fa-home">kembali</i>
                </a>
                <h1>Daftar Diri</h1>
                <hr>
                <p>Kementerian Hukum dan Ham Wilayah Aceh</p>

                <label for="nama_pemilik">Nama Pemilik Merek : <a class="required">*</a></label>
                <input type="text" id="nama_pemilik"  name="nama_pemilik" placeholder="Masukkan nama lengkap" required>

                <label for="nomor_telepon">Nomor Telepon : <a class="required">*</a></label>
                <input type="tel" id="nomor_telepon" name="nomor_telepon" pattern="[0-9]{9,12}" placeholder="Masukkan nomor telepon" required>

                <label for="nama_merek">Nama Merek : <a class="required">*</a></label>
                <input type="text" id="nama_merek" name="nama_merek" placeholder="Masukkan nama merek" required>

                <label for="gambar_merek">Masukkan Foto Merek :</label>
                <input type="file" name="gambar_merek" class="form-control @error('gambar_merek') is-invalid @enderror" id="gambar_merek"
                accept=".jpg,.jpeg,.png,.gif">

                <button href="/">Daftar</button>
            </div>
            <div class="right">
                <label for="nama-merek">Masukan Lokasi : <a class="required">* klik dipeta</a></label>

                <input id="latitudeValue" name="latitude" value="" placeholder="Nilai latitude"></input>

                <input id="longitudeValue"  name="longitude" value="" class="form-control @error('longitude') is-invalid @enderror" placeholder="Nilai longitude"></input>
                @error('longitude')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                


                {{--  Menampilkan peta  --}}

                <div id="map"></div>
                <div class="pencarian">
                    {{--  menampilkan fitur pencarian lokasi  --}}
                    <input type="text" id="daerah" placeholder="Masukkan nama daerah">
                    <button type="button" onclick="cariDaerah()">Cari</button>
                </div>

            </div>
        </form>
    </div>
<!-- Include SweetAlert script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

<!-- Display success alert if session variable exists -->
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Diajukan',
            text: '{{ session('success') }}',
            timer: 2000, // Duration of the popup display in milliseconds (ms)
            showConfirmButton: false
        });
    </script>
@endif

{{--  Register Close  --}}

    {{--  Script Peta leafleat  --}}
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @include('sweetalert::alert')

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

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
    map.on('click', function(e) {
        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker(e.latlng).addTo(map);
        var latitude = e.latlng.lat.toFixed(6);
        var longitude = e.latlng.lng.toFixed(6);
        document.getElementById('latitudeValue').value = latitude;
        document.getElementById('longitudeValue').value = longitude;
    });

    //fitur pencarian
    function cariDaerah() {
        var inputDaerah = document.getElementById('daerah').value;

        // Hapus marker sebelumnya
        if (marker) {
            map.removeLayer(marker);
        }

        // Gunakan API Nominatim untuk mencari koordinat daerah
        var url = 'https://nominatim.openstreetmap.org/search?format=json&q=' + inputDaerah;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    var lat = data[0].lat;
                    var lon = data[0].lon;

                    // Tampilkan marker di koordinat hasil pencarian
                    marker = L.marker([lat, lon]).addTo(map);
                    map.setView([lat, lon], 13);

                    document.getElementById('latitudeValue').textContent = 'Latitude: ' + lat;
                    document.getElementById('longitudeValue').textContent = 'Longitude: ' + lon;
                } else {
                    alert('Daerah tidak ditemukan.');
                }
            })
            .catch(error => {
                console.log(error);
                alert('Terjadi kesalahan saat mencari daerah.');
            });
    }
    </script>


</body>
</html>
