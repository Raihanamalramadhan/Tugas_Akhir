<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Menhubungkan Leafleat --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    {{-- Popup data berhasil ditambah & tampilan data peta tidak ada di pencarian --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />

    <link rel="stylesheet" href="css/admin/tambah.css">
    <link rel="stylesheet" href="{{ asset('css/admin/tambah.css') }}">

    <link rel="shortcut icon" href="img/logo_judul.svg">
    <title>Merek Cerdas</title>
</head>
<body>
		<!-- MAIN -->
		<main>
            <form action="/{{ $editdata->id }}" method="POST">
                @method('put')
                @csrf
                <div class="data">
                    <div class="content-data">
                        <div class="head">
                            <h2>Tambah Data</h2>
                            <hr>
                            <div class="wrapper">
                                <div class="form">
                                {{--  <input type="hidden" name="geojson_kec" class="form-control" id="geojson_kec" value="">
                                <div class="inputfield">
                                    <label for="nomor-pemohon">Nomor Pemohon : <a class="required">*</a></label>
                                    <input type="text" id="nomor_pemohon" name="nomor_pemohon" placeholder="Masukkan nomor pemohon" required>
                                </div>  --}}
                                <div class="inputfield">
                                    <label>Nomor pemohon</label>
                                    <input class="input" type="text" id="nomor_pemohon" name="nomor_pemohon" value="{{  $editdata->nomor_pemohon }}" required>
                                </div>

                                <div class="inputfield">
                                    <label>Nama pemilik</label>
                                    <input class="input" type="text" id="nama_pemilik" name="nama_pemilik" value="{{  $editdata->nama_pemilik }}" required>
                                </div>

                                <div class="inputfield">
                                    <label>Nomor Telepon</label>
                                    <input class="input" type="tel" id="nomor_telepon" name="nomor_telepon" pattern="[0-9]{9,12}" value="{{  $editdata->nomor_telepon }}" required>
                                </div>

                                <div class="inputfield">
                                    <label>Email</label>
                                    <input class="input" type="email" id="email" name="email" value="{{  $editdata->email }}">
                                </div>

                                <div class="inputfield">
                                    <label>Nama Merek</label>
                                    <input class="input" type="text" id="nama_merek" name="nama_merek" value="{{  $editdata->nama_merek }}" required>
                                </div>

                                <div class="inputfield">
                                    <label>Tahun Penerimaan</label>
                                    <input class="input" type="number" id="tahun_penerimaan" name="tahun_penerimaan" min="2015" max="2030" step="1" value="{{  $editdata->tahun_penerimaan }}" required>
                                </div>

                                <div class="inputfield">
                                    <label for="id_tipe">Tipe pemohon</label>
                                    <select class="input" id="id_tipe" name="id_tipe" required>
                                        @foreach ($selectededit as $item)
                                            @if ($item->id_tipe == $editdata->id_tipe)
                                                <option value="{{ $item->id_tipe }}">{{ $item->nama_tipe}}</option>
                                            @endif
                                        @endforeach
                                        @foreach ($tipe as $tipe)
                                            <option value="{{ $tipe->id }}">{{ $tipe->nama_tipe}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="inputfield">
                                    <label>kelas</label>
                                    <select class="input" id="id_kelas" name="id_kelas" required>
                                        @foreach ($selectededit as $item)
                                            @if ($item->id_kelas == $editdata->id_kelas)
                                                <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas}}</option>
                                            @endif
                                        @endforeach
                                        @foreach ($kelas as $kelas)
                                            <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="inputfield">
                                    <label>kabupaten</label>
                                    <select class="input" id="id_kabupaten" name="id_kabupaten" required>
                                        @foreach ($selectededit as $item)
                                            @if ($item->id_kabupaten == $editdata->id_kabupaten)
                                                <option value="{{ $item->id_tipe }}">{{ $item->nama_kabupaten}}</option>
                                            @endif
                                        @endforeach
                                        @foreach ($kabupaten as $kabupaten)
                                            <option value="{{ $kabupaten->id }}">{{ $kabupaten->nama_kabupaten}}</option>
                                        @endforeach
                                    </select>
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
                        <div class="inputfield">
                            <label>Latitude</label>
                            <input class="input" type="text" id="latitude" name="latitude" value="{{ $editdata->latitude }}" required>
                        </div>
                        <div class="inputfield">
                            <label>Longitude</label>
                            <input class="input" type="text" id="longitude" name="longitude" value="{{ $editdata->longitude }}" required>
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

			</div>
        </form>
		</main>

        <!-- Include SweetAlert script -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

        <!-- Display success alert if session variable exists -->
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil ditambahkan!',
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        var curLocation = [{{ $editdata->latitude }}, {{ $editdata->longitude }}];
        var map = L.map('map').setView(curLocation, 8);

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

        var marker = L.marker(curLocation, {
            draggable: true,
        }).addTo(map);

        // Menambahkan layer default
        tileLayers.Streets.addTo(map);

        // Menambahkan kontrol layer
        L.control.layers(tileLayers).addTo(map);

        // Fungsi untuk memperbarui nilai input latitude dan longitude
        function updateLatLng(latlng) {
            var latitude = latlng.lat.toFixed(6);
            var longitude = latlng.lng.toFixed(6);
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);

            // Simpan perubahan ke database menggunakan AJAX
            $.ajax({
                url: '/update-location', // Ganti dengan URL yang sesuai untuk menyimpan perubahan
                method: 'POST',
                data: {
                    latitude: latitude,
                    longitude: longitude,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log('Data berhasil disimpan ke database.');
                },
                error: function(xhr, status, error) {
                    console.log('Terjadi kesalahan saat menyimpan data ke database.');
                }
            });
        }

        // Mendengarkan peristiwa dragend pada marker
        marker.on('dragend', function(e) {
            updateLatLng(marker.getLatLng());
        });

        // Mendengarkan peristiwa klik pada peta
        map.on('click', function(e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(e.latlng, {
                draggable: true,
            }).addTo(map);
            updateLatLng(marker.getLatLng());
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
