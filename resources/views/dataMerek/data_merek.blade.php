@extends('navbar.navbar_umum')

@section('navbar_umum')
<head>
    {{--  Include Leaflet CSS  --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    {{--  Menhubungkan css  --}}
    <link rel="stylesheet" href="css/data_merek.css">

    {{--  menghubungkan chart.js  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{--  include icon yang akan di gunakan  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>

</head>
<body>
{{--  Heading star  --}}
<div class="heading">
    <h1>Data Merek</h1>
    <p> <a href="/"> Beranda >></a> Data </p>
</div>
{{--  Heading Close  --}}

{{--  kelas, jumlah merek & tipe star --}}
    <select id="kelas-select" class="custom-select">
        <option value="" selected disabled>Pilih kelas</option>
        @foreach($kelas as $data_kelas)
            <option value="{{$data_kelas->id}}">{{$data_kelas->nama_kelas}}</option>
        @endforeach
    </select>

    <button class="kelas" onclick="myFunction()" id="showBoundariesButton">Jumlah Merek</button>

    <button class="tipe-pemohon1">
        <input type="checkbox" id="option1" name="option1" value="1">
        <label for="option1">Merek Dagang dan Jasa</label>
    </button>
    <button class="tipe-pemohon">
        <input type="checkbox" id="option2" name="option2" value="2">
        <label for="option2">Merek Dagang</label>
    </button>
    <button class="tipe-pemohon">
        <input type="checkbox" id="option3" name="option3" value="3">
        <label for="option3">Merek Jasa</label>
    </button>
    <button class="tipe-pemohon">
        <input type="checkbox" id="option4" name="option4" value="4">
        <label for="option4">Merek Kolektif</label>
    </button>
{{--  kelas, jumlah merek & tipe close--}}

{{--  Peta dan popup Star --}}
    <div class="container">
        <div id="map"></div>
        <p>Untuk informasi mengenai merek Anda yang terdaftar di Kementerian Hukum dan Hak Asasi Manusia wilayah Aceh, pilih opsi 'Cek merek' dengan memasukkan nama sesuai sertifikat dan nomor pemohon. Fitur ini memungkinkan Anda melihat dan mengedit data alamat. Jika data Anda tidak ditemukan, tambahkan data baru dan tunggu proses perizinan dari Kemenkumham yang akan selesai dalam waktu singkat.</p>
        <a id="cekloginBtn" class="tombolcek">Cek Merek</a>
        <a href="/addData" class="tomboltambah">tambah data</a>
    </div>
    {{--  menampilkan popup login  --}}
    <div id="cekloginPopup">
        <div class="cekpopupContent">
            <form action="{{ route('cekdata') }}" method="POST" onsubmit="submitCekData()">
                @csrf
                <label>Nomor Pemohon</label><br>
                <input type="text" name="nomor-pemohon" placeholder="Masukkan nomor pemohon" required><br>
                <button type="submit" class="tombolcek">Cek data</button>
                <button type="button" id="cekcloseBtn" onclick="closeSwal()">Batal</button>
            </form>
        </div>
    </div>
{{--  Peta dan popup Close  --}}

{{--  Grafik Star --}}
    <div class="charts">
        <div class="chart">
            <h2>Jumlah merek pertahun</h2>
            <canvas id="myChart"></canvas>
        </div>
        <div class="chart" id="doughnut-chart">
            <h2>Tipe Pemohon</h2>
            <canvas id="donutChart"></canvas>
        </div>
    </div>
{{--  Grafik Close  --}}

{{--  tabel star--}}
<body1>
    <main class="table">
        <section class="table__header">
            <h1>Tabel Data Merek</h1>
            <div class="input-group">
                <input type="search" placeholder="Cari data...">
                <img src="img/cari.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th class="kolom2"> Nama Merek<span class="icon-arrow">&UpArrow;</span></th>
                        <th class="kolom2"> Nama Tipe<span class="icon-arrow">&UpArrow;</span></th>
                        <th class="kolom1"> Gambar Merek</th>
                        <th> Kelas<span class="icon-arrow">&UpArrow;</span></th>
                        <th class="kolom2">Nama Pemilik <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Kabupaten<span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    @if($user->id_status == 1)
                        <tr data-userid="{{ $user->id }}">
                            <td>{{ $user->nama_merek }}</td>
                            <td>{{ $user->nama_tipe }}</td>
                            <td style="width: 85px; height: 85px;">
                                <a href="{{ asset('merek/' . $user->gambar_merek) }}" target="_blank">
                                    <img src="{{ asset('merek/' . $user->gambar_merek) }}" alt="" class="gambar-kecil" onclick="openPopup('{{ asset('merek/' . $user->gambar_merek) }}')">
                                </a>
                            </td>
                            <td>{{ $user->nama_kelas }}</td>
                            <td>{{ $user->nama_pemilik }}</td>
                            <td>{{ $user->nama_kabupaten }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </section>



    </main>
</body1>
{{--  tabel close  --}}

{{--  Script Star  --}}
    <script>
        // Mendengarkan perubahan pada elemen select
        document.getElementById('kelas-select').addEventListener('change', function() {
            var selectedKelas = this.value; // Mendapatkan id_kelas yang dipilih

            // Loop melalui semua marker
            markers.forEach(function(marker) {
                // Periksa id_kelas marker dengan id_kelas yang dipilih
                if (marker.options.id_kelas == selectedKelas || selectedKelas === '') {
                    marker.addTo(map); // Tampilkan marker jika id_kelas sesuai atau tidak ada id_kelas yang dipilih
                } else {
                    map.removeLayer(marker); // Sembunyikan marker jika id_kelas tidak sesuai
                }
            });
        });
    </script>

    {{--  Peta stars --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
       var map = L.map('map').setView([4.6951, 96.7494], 8);

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

    tileLayers.Streets.addTo(map);

    var markers = [];
    var originalMarkers = [];

    @foreach($users as $data_pengajuan)
        @if($data_pengajuan->id_status == 1)
        var markerIcon;
        @if($data_pengajuan->id_tipe == 1)
            markerIcon = L.icon({
                iconUrl: 'icon/icon1.png',
                iconSize: [25, 35],
                iconAnchor: [12, 35],
                popupAnchor: [0, -41]
            });
        @elseif($data_pengajuan->id_tipe == 2)
            markerIcon = L.icon({
                iconUrl: 'icon/icon2.png',
                iconSize: [25, 35],
                iconAnchor: [12, 35],
                popupAnchor: [0, -35]
            });
        @elseif($data_pengajuan->id_tipe == 3)
            markerIcon = L.icon({
                iconUrl: 'icon/icon3.png',
                iconSize: [25, 35],
                iconAnchor: [12, 35],
                popupAnchor: [0, -35]
            });
        @elseif($data_pengajuan->id_tipe == 4)
            markerIcon = L.icon({
                iconUrl: 'icon/icon4.png',
                iconSize: [25, 35],
                iconAnchor: [12, 35],
                popupAnchor: [0, -35]
            });
        @endif

        var marker = L.marker([{{$data_pengajuan->latitude}}, {{$data_pengajuan->longitude}}], {
            id_kelas: {{$data_pengajuan->id_kelas}},
            icon: markerIcon
        });

        originalMarkers.push(marker);

        var popupContent = '<div class="custom-popup">';
        popupContent += '<div class="custom-popup-image-container">';
        popupContent += '<img src="{{ asset('merek/' . $data_pengajuan->gambar_merek) }}" class="custom-popup-image">';
        popupContent += '</div>';
        popupContent += '<div class="custom-popup-info">';
        popupContent += '<h6>{{$data_pengajuan->nama_merek}}</h6>';
        popupContent += '</div>';
        popupContent += '</div>';

        marker.bindPopup(popupContent, {
            minWidth: 100
        });

        markers.push(marker);
        marker.addTo(map);
        @endif
    @endforeach

    L.control.layers(tileLayers).addTo(map);

    var checkboxes = document.querySelectorAll('.tipe-pemohon input[type="checkbox"]');

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var tipeId = this.value;

            markers.forEach(function(marker) {
                var idKelas = marker.options.id_kelas;

                if (idKelas == tipeId) {
                    marker.addTo(map);
                } else {
                    map.removeLayer(marker);
                }
            });
        });
    });

        // Mendapatkan referensi ke tombol
        var showBoundariesButton = document.getElementById('showBoundariesButton');

        // Menambahkan event listener untuk menangani klik pada tombol
        showBoundariesButton.addEventListener('click', function() {
            toggleBoundaries();
        });

        var boundariesAdded = false; // Tambahkan variabel untuk melacak apakah batas sudah ditambahkan

        function toggleBoundaries() {
            if (boundariesAdded) {
                // Hapus batas kabupaten jika sudah ditambahkan sebelumnya
                map.eachLayer(function(layer) {
                    if (layer instanceof L.GeoJSON) {
                        map.removeLayer(layer);
                    }
                });

                // Tampilkan kembali marker saat batas kabupaten dihapus
                originalMarkers.forEach(function(marker) {
                    marker.addTo(map);
                });

                boundariesAdded = false; // Setel variabel boundariesAdded ke false
            } else {
                // Hapus marker saat batas kabupaten ditampilkan
                markers.forEach(function(marker) {
                    map.removeLayer(marker);
                });

                // Tambahkan batas kabupaten jika belum ditambahkan
                var activeLayer = null;
                @foreach ($kabupaten as $kab)
                    $.getJSON("{{ $kab->geojson_kab }}", function(data) {
                        var kabupatenLayer = L.geoJSON(data, {
                            style: {
                                color: 'blue',
                                weight: 1,
                                opacity: 1,
                                dashArray: '3',
                                fillOpacity: 0.1,
                            },
                            onEachFeature: function(feature, layer) {
                                layer.on('click', function(event) {
                                    if (activeLayer) {
                                        activeLayer.setStyle({ color: 'blue' });
                                    }
                                    var kabupatenProperties = feature.properties;
                                    var popupContent = '<div class="custom-popup">';
                                    popupContent += '<h3>' + kabupatenProperties.nama_kabupaten + '</h3>';
                                    popupContent += '<p>Informasi lainnya tentang kabupaten...</p>';
                                    popupContent += '</div>';
                                    layer.bindPopup(popupContent).openPopup();
                                    layer.setStyle({ color: 'red' });
                                    activeLayer = layer;
                                });
                            }
                        });
                        kabupatenLayer.addTo(map);
                    });
                @endforeach

                boundariesAdded = true; // Setel variabel boundariesAdded ke true
            }
        }
    </script>
    {{--  Peta Close  --}}

    {{--  popup cek star  --}}
    <script>
        document.getElementById("cekloginBtn").addEventListener("click", function() {
            document.getElementById("cekloginPopup").style.display = "block";
        });

        document.getElementById("cekcloseBtn").addEventListener("click", function() {
            document.getElementById("cekloginPopup").style.display = "none";
        });
    </script>
    {{--  popup cek close  --}}

    {{--  grafik line star  --}}
    <script>
        // Data untuk grafik
        var data = {
            labels: {!! json_encode($label) !!},
            datasets: [
                {
                    label: "Jumlah Merek",
                    data: {!! json_encode($value) !!},
                    borderColor: "#6C63FF",
                    backgroundColor: "rgba(108, 99, 255, 0.2)",
                    pointBackgroundColor: "#6C63FF",
                    pointBorderColor: "#fff",
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#6C63FF",
                    tension: 0.4,
                    fill: true
                }
            ]
        };

        // Pengaturan opsi
        var options = {
            responsive: true,
            title: {
                display: true,
                text: "Grafik Jumlah Merek",
                fontColor: "#6C63FF",
                fontSize: 18,
                fontFamily: "Helvetica"
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: "Tahun",
                        fontColor: "#6C63FF",
                        fontSize: 14,
                        fontFamily: "Helvetica"
                    },
                    ticks: {
                        fontColor: "#6C63FF"
                    },
                    grid: {
                        color: "rgba(108, 99, 255, 0.1)"
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: "Jumlah Merek",
                        fontColor: "#6C63FF",
                        fontSize: 14,
                        fontFamily: "Helvetica"
                    },
                    ticks: {
                        fontColor: "#6C63FF",
                        precision: 0
                    },
                    grid: {
                        color: "rgba(108, 99, 255, 0.1)"
                    }
                }
            },
            plugins: {
                legend: {
                    position: "top",
                    labels: {
                        fontColor: "#6C63FF",
                        fontSize: 12,
                        fontFamily: "Helvetica"
                    }
                }
            }
        };

        // Membuat grafik garis
        var ctx = document.getElementById("myChart").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "line",
            data: data,
            options: options
        });
    </script>
    {{--  grafik line close  --}}

    {{--  grafik donat  --}}
    <script>
        var ctx = document.getElementById('donutChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Data',
                    data: @json($values),
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF'
                    ],
                    borderColor: '#fff',
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                    labels: {
                        fontColor: '#fff',
                        fontSize: 12,
                        fontFamily: 'Helvetica'
                    }
                },
                title: {
                    display: true,
                    text: 'nama_tipe',
                    fontColor: '#fff',
                    fontSize: 18,
                    fontFamily: 'Helvetica'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
    </script>
    {{--  grafik donat close  --}}

    {{--  Tabel star  --}}
    <script>
        const search = document.querySelector('.input-group input');
        const tableRows = document.querySelectorAll('tbody tr');
        const tableHeadings = document.querySelectorAll('thead th');

        // 1. Pencarian data pada tabel HTML
        search.addEventListener('input', searchTable);

        function searchTable() {
        const searchTerm = search.value.toLowerCase();
        const matchingRows = [];

        tableRows.forEach((row, i) => {
            const tableData = row.textContent.toLowerCase();
            const searchData = searchTerm.toLowerCase();

            if (tableData.includes(searchData)) {
                row.classList.remove('hide');
                matchingRows.push(row);
            } else {
                row.classList.add('hide');
            }

            row.style.setProperty('--delay', i / 25 + 's');
        });

        matchingRows.forEach((visibleRow, i) => {
            visibleRow.style.backgroundColor = i % 2 === 0 ? 'transparent' : '#0000000b';
            document.querySelector('tbody').prepend(visibleRow);
        });

            scrollToFirstRow(matchingRows);
        }

        // 2. Pengurutan data pada tabel HTML
        tableHeadings.forEach((head, i) => {
        let sortAsc = true;

        head.onclick = () => {
            tableHeadings.forEach(head => head.classList.remove('active'));
            head.classList.add('active');

            document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
            tableRows.forEach(row => {
                row.querySelectorAll('td')[i].classList.add('active');
            });

            head.classList.toggle('asc', sortAsc);
            sortAsc = head.classList.contains('asc') ? false : true;

            sortTable(i, sortAsc);
            scrollToFirstRow(tableRows);
            };
        });

        function sortTable(column, sortAsc) {
        [...tableRows]
            .sort((a, b) => {
                const firstRow = a.querySelectorAll('td')[column].textContent.toLowerCase();
                const secondRow = b.querySelectorAll('td')[column].textContent.toLowerCase();

                return sortAsc ? (firstRow < secondRow ? 1 : -1) : firstRow < secondRow ? -1 : 1;
            })
            .map(sortedRow => document.querySelector('tbody').appendChild(sortedRow));
        }

        function scrollToFirstRow(rows) {
            const main = document.querySelector('#content main');
            const firstRow = rows.length > 0 ? rows[0] : tableRows[0];
            const firstRowTop = firstRow.offsetTop - main.offsetTop;
            main.scrollTo({ top: firstRowTop, behavior: 'smooth' });
        }
    </script>
    {{--  table close  --}}
</body>
@endsection
