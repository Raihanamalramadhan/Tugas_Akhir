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
    <select class="custom-select">
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
    <button class="kelas" onclick="myFunction()" id="showBoundariesButton">Jumlah Merek</button>

    <button class="tipe-pemohon1">
        <input type="checkbox" id="option1" name="option1" value="option1">
        <label for="option1">Merek Dagang dan Jasa</label>
    </button>
    <button class="tipe-pemohon">
        <input type="checkbox" id="option2" name="option2" value="option2">
        <label for="option2">Merek Dagang</label>
    </button>
    <button class="tipe-pemohon">
        <input type="checkbox" id="option3" name="option3" value="option3">
        <label for="option3">Merek Jasa</label>
    </button>
    <button class="tipe-pemohon">
        <input type="checkbox" id="option4" name="option4" value="option4">
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
            <form>
                <label>Nomor Pemohon</label><br>
                <input  type="text" id="nomor-pemohon" placeholder="Masukkan nomor pemohon"><br>
                <button type="submit"><a href="/cekdata">Cek data</a></button>
                <button button id="cekcloseBtn">Batal</button>
            </form>
        </div>
    </div>
{{--  Peta dan popup Close  --}}

{{--  Grafik Star --}}
    <div class="charts">
        <div class="chart">
            <h2>Jumlah merek pertahun</h2>
            <canvas id="myChart"></canvas>
            <label for="y-axis-description">Tahun</label>
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
                        <th> Nama Merek <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nama Tipe <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Gambar Merek</th>
                        <th> Kelas <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nama Pemilik <span class="icon-arrow">&UpArrow;</span></th>
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
    {{--  Peta stars --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

        //menampilkan popup
        var marker = L.marker([4.6951, 96.7494]).addTo(map);
        marker.bindPopup("gambar merek, nama merek").openPopup();

        // Mendapatkan referensi ke tombol
        var showBoundariesButton = document.getElementById('showBoundariesButton');

        // Menambahkan event listener untuk menangani klik pada tombol
        showBoundariesButton.addEventListener('click', function() {
            // Kode untuk menampilkan batas kabupaten akan ditambahkan di sini
        });

        // batas kabupaten
        showBoundariesButton.addEventListener('click', function() {
            // batas kabupaten
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

                                var popupContent = '<h3>' + kabupatenProperties.nama_kabupaten + '</h3>' +
                                                    '<p>Informasi lainnya tentang kabupaten...</p>';

                                layer.bindPopup(popupContent).openPopup();

                                layer.setStyle({ color: 'red' });

                                activeLayer = layer;
                            });
                        }
                    });

                    kabupatenLayer.addTo(map);
                });
            @endforeach
        });
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
                    borderColor: "rgba(75, 192, 192, 1)",
                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                    fill: true
                }
            ]
        };

        // Pengaturan opsi
        var options = {
            responsive: true,
            title: {
                display: true,
                text: "Grafik Jumlah Merek"
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: "Tahun"
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: "Jumlah Merek"
                    },
                    ticks: {
                        precision: 0
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
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'nama_tipe'
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
