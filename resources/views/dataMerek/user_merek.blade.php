<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="{{ asset('css/user_merek.css') }}">

    <link rel="shortcut icon" href="{{ asset('img/logo_judul.svg') }}">
    <title>Merek Cerdas</title>
</head>
<body>
		<!-- MAIN -->
		<main>
            <form method="POST" action="{{ route('username.edit', $data->id) }}">
                @csrf
                @method('PUT')
			<div class="data">
				<div class="content-data">
					<div class="head">
						<h2>Data Pemilik Merek</h2>
                        <hr>
                        <div class="wrapper">
                            <div class="logo">
                                <img src="{{ asset('merek/' . $data->gambar_merek) }}" alt="Logo">
                            </div>
                                <div class="form">
                                    <div class="inputfield">
                                        <label>Nomor pemohon</label>
                                        <span class="input">{{ $data->nomor_pemohon }}</span>
                                        {{--  <input type="text" class="input" name="nomor_pemohon" value="{{ $data->nomor_pemohon }}" required>  --}}
                                    </div>

                                    <div class="inputfield">
                                        <label>Nama pemilik</label>
                                        <input type="text" class="input" name="nama_pemilik" value="{{ $data->nama_pemilik }}">
                                    </div>

                                    <div class="inputfield">
                                        <label>Nomor telepon</label>
                                        <input type="text" class="input" name="nomor_telepon" value="{{ $data->nomor_telepon }}">
                                    </div>

                                    <div class="inputfield">
                                        <label>Email</label>
                                        <input type="text" class="input" name="email" value="{{ $data->email }}">
                                    </div>

                                    <div class="inputfield">
                                        <label>Nama merek</label>
                                        <span class="input">{{ $data->nama_merek }}</span>
                                        {{--  <input type="text" class="input" value="{{ $data->nama_merek }}">  --}}
                                    </div>

                                    <div class="inputfield">
                                        <label>Tahun penerimaan</label>
                                        <span class="input">{{ $data->tahun_penerimaan }}</span>
                                        {{--  <input type="text" class="input" value="{{ $data->tahun_penerimaan }}">  --}}
                                    </div>

                                    <div class="inputfield">
                                        <label>Tipe pemohon</label>
                                        <span class="input">{{ $data->id_tipe }}</span>
                                        {{--  <input type="text" class="input" value="{{ $data->id_tipe }}">  --}}
                                    </div>

                                    <div class="inputfield">
                                        <label>kelas</label>
                                        <span class="input">{{ $data->id_kelas }}</span>
                                        {{--  <input type="text" class="input" value="{{ $data->id_kelas }}">  --}}
                                    </div>

                                    <div class="inputfield">
                                        <label>kabupaten</label>
                                        <span class="input">{{ $data->id_kabupaten }}</span>
                                        {{--  <input type="text" class="input" value="{{ $data->id_kabupaten }}">  --}}
                                    </div>
                                </form>
                                </div>
                        </div>
					</div>
				</div>
				<div class="content-data">
                    <div class="head">
						<h2>Lokasi</h2>
                        <hr>
                        <div class="right">
                            <div class="inputfield">
                                <label>Latitude</label>
                                <input class="input" type="text" id="latitude" name="latitude" value="{{ $data->latitude }}" required>
                            </div>
                            <div class="inputfield">
                                <label>Longitude</label>
                                <input class="input" type="text" id="longitude" name="longitude" value="{{ $data->longitude }}" required>
                            </div>
                                {{--  <input class="nilai" id="latitudeValue" name="latitude" value="" placeholder="Nilai latitude"></input>
                                <input class="nilai" id="longitudeValue" name="longitude" value="" class="form-control @error('longitude') is-invalid @enderror" placeholder="Nilai longitude"></input>
                                @error('longitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror  --}}

                                <div id="map"></div>
                                {{--  Menampilkan peta  --}}
                                <div class="pencarian">
                                    {{--  menampilkan fitur pencarian lokasi  --}}
                                    <input type="text" id="daerah" placeholder="Masukkan nama daerah">
                                    <button type="button" onclick="cariDaerah()">Cari</button>
                                </div>
                                <div class="inputfield">
                                    <button class='btn' type="submit" onclick="simpanData()">Simpan</button>
                                    <a href="/datamerek" class="btn2">Batal</a>
                                </div>
                            </div>
				</div>
			</div>
        </form>
		</main>
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
        var latitudeInput = document.getElementById('latitude');
        var longitudeInput = document.getElementById('longitude');

        // Mendapatkan nilai latitude dan longitude dari input
        var latitude = parseFloat(latitudeInput.value);
        var longitude = parseFloat(longitudeInput.value);

        // Menampilkan marker berdasarkan latitude dan longitude
        if (!isNaN(latitude) && !isNaN(longitude)) {
            marker = L.marker([latitude, longitude]).addTo(map);
            map.setView([latitude, longitude], 13);
}
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
