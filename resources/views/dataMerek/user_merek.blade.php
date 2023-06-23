<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="css/user_merek.css">

    <link rel="shortcut icon" href="img/logo_judul.svg">
    <title>Merek Cerdas</title>
</head>
<body>
		<!-- MAIN -->
		<main>
			<div class="data">
				<div class="content-data">
					<div class="head">
						<h2>Data Pemilik Merek</h2>
                        <hr>
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
                            </div>
                        </div>
					</div>
				</div>
				<div class="content-data">
                    <div class="head">
						<h2>Lokasi</h2>
                        <hr>
					</div>
                        <div class="right">
                            <span id="latitudeValue">Latitude :</span>
                            <label for="lokasi"></label>
                            <span id="longitudeValue">Longitude :</span>
                            {{--  Menampilkan peta  --}}
                            <div class="pencarian">
                                {{--  menampilkan fitur pencarian lokasi  --}}
                                <input type="text" id="daerah" placeholder="Masukkan nama daerah">
                                <button type="button" onclick="cariDaerah()">Cari</button>
                            </div>
                            <div id="map"></div>
                            <div class="inputfield">
                                <input type="submit" value="simpan" class="btn">
                                <a href="/dataMerek"><input type="submit" value="keluar" class="btn2"></a>
                            </div>
                        </div>
				</div>
			</div>
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
