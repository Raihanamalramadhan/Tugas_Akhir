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

    {{--  Popup data berhasil di tambah & tampilan data peta tidak ada di pencarian  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />

    {{--  menghubungkan CSS  --}}
    <link rel="stylesheet" href="css/tambah_data.css">

    <link rel="shortcut icon" href="img/logo_judul.svg">
    <title>Merek Cerdas</title>
</head>
<body>
{{--  Register Start  --}}
<div class="container">
    <div class="login">
        <form action="{{url('tambahData')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <a href="/">
                <i class="fas fa-home"></i> kembali
            </a>
            <h1>Pengajuan</h1>
            <hr>
            <p>Isilah data dengan benar sesuai pada sertifikat anda</p>

            <label for="nomor-pemohon">Nomor Pemohon : <a class="required">*</a></label>
            <input type="text" id="nomor_pemohon" name="nomor_pemohon" placeholder="Masukkan nomor pemohon" required>

            <label for="nama-pemilik">Nama Pemilik : <a class="required">*</a></label>
            <input type="text" id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan nama lengkap" required>

            <label for="nomor-telepon">Nomor Telepon : <a class="required">*</a></label>
            <input type="tel" id="nomor_telepon" name="nomor_telepon" pattern="[0-9]{9,12}" placeholder="Masukkan nomor telepon" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="@gmail.com">

            <label for="nama-merek">Nama Merek : <a class="required">*</a></label>
            <input type="text" id="nama_merek" name="nama_merek" placeholder="Masukkan nama merek" required>

            <label for="tahun">Tahun Penerimaan: <a class="required">*</a></label>
            <input type="number" id="tahun_penerimaan" name="tahun_penerimaan" min="2015" max="2030" step="1" value="2019" required>

            <label for="tipe">Tipe Pemohon : <a class="required">*</a></label>
            <select id="id_tipe" name="id_tipe" required>
                <option selected disabled >Pilih tipe</option>
                @foreach ($tipe as $tipe)
                <option value="{{ $tipe->id }}">{{ $tipe->nama_tipe}}</option>
                @endforeach
            </select>

            <label for="tipe">Kelas : <a class="required">*</a></label>
            <select id="id_kelas" name="id_kelas" required>
                <option selected disabled >Pilih Kelas</option>
                @foreach ($kelas as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas}}</option>
                @endforeach
            </select>

            <label for="gambar_merek">Gambar Merek: <a class="required">*</a></label>
            <input type="file" name="gambar_merek" class="form-control @error('gambar_merek') is-invalid @enderror" id="gambar_merek" accept=".jpg,.jpeg,.png,.gif">
            @error('gambar_merek')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="foto_sertifikat">Foto Sertifikat: <a class="required">*</a></label>
            <input type="file" name="foto_sertifikat" class="form-control @error('foto_sertifikat') is-invalid @enderror" id="foto_sertifikat" accept=".jpg,.jpeg,.png,.gif,.pdf">
            @error('foto_sertifikat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>
    <div class="right">
        <label for="kabupaten">Kabupaten : <a class="required">*</a></label>
        <select id="id_kabupaten" name="id_kabupaten" required>
            <option selected disabled >Pilih Kabupaten</option>
            @foreach ($kabupaten as $kabupaten)
            <option value="{{ $kabupaten->id }}">{{ $kabupaten->nama_kabupaten}}</option>
            @endforeach
        </select>

        <label for="nama-merek">Masukan Lokasi : <a class="required">* klik dipeta</a></label>

        <input id="latitudeValue" name="latitude" value="" placeholder="Nilai latitude"></input>

        <input id="longitudeValue" name="longitude" value="" class="form-control @error('longitude') is-invalid @enderror" placeholder="Nilai longitude"></input>
        @error('longitude')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        {{-- Menampilkan peta --}}
        <div id="map"></div>
        <div class="pencarian">
            {{-- Menampilkan fitur pencarian lokasi --}}
            <input type="text" id="daerah" placeholder="Masukkan nama daerah">
            <button type="button" onclick="cariDaerah()">Cari</button>
        </div>

        <button class='buttondaftar' type="submit">Daftar</button>
    </div>
</div>
</form>
</div>

    {{--  js  --}}
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
                // Munculkan notifikasi daerah tidak ditemukan dengan animasi
                Toastify({
                    text: 'Daerah tidak ditemukan.',
                    duration: 3000,
                    close: true,
                    gravity: 'top',
                    position: 'right',
                    backgroundColor: 'linear-gradient(to right, #FF9800, #FF5722)',
                    stopOnFocus: true,
                    onClick: function() {},
                }).showToast();
            }
        })
        .catch(error => {
            console.log(error);
            // Munculkan notifikasi terjadi kesalahan dengan animasi
            Toastify({
                text: 'Terjadi kesalahan saat mencari daerah.',
                duration: 3000,
                close: true,
                gravity: 'top',
                position: 'right',
                backgroundColor: 'linear-gradient(to right, #F44336, #D32F2F)',
                stopOnFocus: true,
                onClick: function() {},
            }).showToast();
        });
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>
</html>
