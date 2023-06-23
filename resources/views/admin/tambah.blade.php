<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="css/admin/tambah.css">

	<link rel="shortcut icon" href="img/logo_judul.svg">
    <title>Merek Cerdas</title>
</head>
<body>
		<!-- MAIN -->
		<main>
			<div class="data">
				<div class="content-data">
					<div class="head">
						<h2>Tambah Data</h2>
                        <hr>
                        <div class="wrapper">
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
                                    <input class="input" type="number" id="tahun" name="tahun" min="2015" max="2030" step="1" value="2019" >
                                </div>

                                <div class="inputfield">
                                    <label>Tipe pemohon</label>
                                    <select id="tipePemohon" name="tipePemohon" class="input">
                                        <option value="" selected disabled>Pilih tipe</option>
                                        <option value="Merek Dagang">Merek Dagang</option>
                                        <option value="Merek Jasa">Merek Jasa</option>
                                        <option value="Merek Dagang dan Jasa">Merek Dagang dan Jasa</option>
                                        <option value="Merek Kolektif">Merek Kolektif</option>
                                    </select>
                                </div>

                                <div class="inputfield">
                                    <label>kelas</label>
                                    <select id="kelas" name="kelas" class="input">
                                        <option value="" selected disabled>Pilih kelas</option>
                                        <option value="option1">kelas 1</option>
                                        <option value="option2">kelas 2</option>
                                        <option value="option3">kelas 3</option>
                                        <option value="option4">kelas 4</option>
                                        <option value="option5">kelas 5</option>
                                        <option value="option6">kelas 6</option>
                                        <option value="option7">kelas 7</option>
                                        <option value="option8">kelas 8</option>
                                        <option value="option9">kelas 9</option>
                                        <option value="option10">kelas 10</option>
                                        <option value="option11">kelas 11</option>
                                        <option value="option12">kelas 12</option>
                                        <option value="option13">kelas 13</option>
                                        <option value="option14">kelas 14</option>
                                        <option value="option15">kelas 15</option>
                                        <option value="option16">kelas 16</option>
                                        <option value="option17">kelas 17</option>
                                        <option value="option18">kelas 18</option>
                                        <option value="option19">kelas 19</option>
                                        <option value="option20">kelas 20</option>
                                        <option value="option21">kelas 21</option>
                                        <option value="option22">kelas 22</option>
                                        <option value="option23">kelas 23</option>
                                        <option value="option24">kelas 24</option>
                                        <option value="option25">kelas 25</option>
                                        <option value="option26">kelas 26</option>
                                        <option value="option27">kelas 27</option>
                                        <option value="option28">kelas 28</option>
                                        <option value="option29">kelas 29</option>
                                        <option value="option30">kelas 30</option>
                                        <option value="option31">kelas 31</option>
                                        <option value="option32">kelas 32</option>
                                        <option value="option33">kelas 33</option>
                                        <option value="option34">kelas 34</option>
                                        <option value="option35">kelas 35</option>
                                        <option value="option36">kelas 36</option>
                                        <option value="option37">kelas 37</option>
                                        <option value="option38">kelas 38</option>
                                        <option value="option39">kelas 39</option>
                                        <option value="option40">kelas 40</option>
                                        <option value="option41">kelas 41</option>
                                        <option value="option42">kelas 42</option>
                                        <option value="option43">kelas 43</option>
                                        <option value="option44">kelas 44</option>
                                        <option value="option45">kelas 45</option>
                                    </select>
                                </div>

                                <div class="inputfield">
                                    <label>kabupaten</label>
                                    <select id="kabupaten" name="kabupaten" class="input">
                                        <option value="" selected disabled>Pilih kabupaten</option>
                                        <option value="Aceh Barat">Aceh Barat</option>
                                        <option value="Aceh Barat Daya">Aceh Barat Daya</option>
                                        <option value="Aceh Besar">Aceh Besar</option>
                                        <option value="Aceh Jaya">Aceh Jaya</option>
                                        <option value="Aceh Selatan">Aceh Selatan</option>
                                        <option value="Aceh Singkil">Aceh Singkil</option>
                                        <option value="Aceh Tamiang">Aceh Tamiang</option>
                                        <option value="Aceh Tengah">Aceh Tengah</option>
                                        <option value="Aceh Tenggara">Aceh Tenggara</option>
                                        <option value="Aceh Timur">Aceh Timur</option>
                                        <option value="Aceh Utara">Aceh Utara</option>
                                        <option value="Bener Meriah">Bener Meriah</option>
                                        <option value="Bireuen">Bireuen</option>
                                        <option value="Gayo Lues">Gayo Lues</option>
                                        <option value="Banda Aceh">Kota Banda Aceh</option>
                                        <option value="Langsa">Langsa</option>
                                        <option value="Lhokseumawe">Lhokseumawe</option>
                                        <option value="Nagan Raya">Nagan Raya</option>
                                        <option value="Pidie">Pidie</option>
                                        <option value="Pidie Jaya">Pidie Jaya</option>
                                        <option value="Sabang">Sabang</option>
                                        <option value="Simeulue">Simeulue</option>
                                        <option value="Subulussalam">Subulussalam</option>
                                    </select>
                                </div>

                                <div class="inputfield">
                                    <label>Gambar merek</label>
                                    <input type="file" id="foto-merek" name="gambar" accept="image/*" class="input">
                                </div>

                            </div>
                        </div>
					</div>
				</div>
				<div class="content-data">
                    <div class="head">
						<h2>Masukan Lokasi</h2>
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
                                <input type="submit" value="Tambahkan" class="btn">
                                <a href="/datamerek"><input type="submit" value="Batal" class="btn2"></a>
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
