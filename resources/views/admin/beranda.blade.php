@extends('navbar.navbar_admin')

@section('navbar_admin')
<head>
    {{--  menghubungkan leafleat  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    {{--  Hubungkan CSS  --}}
    <link rel="stylesheet" href="css/admin/beranda.css">


</head>
<body>
    <main>
        <div class="head-title">
            <div class="left">
                <h2>Merek Belum Bersertifikat</h2>
                <hr>
            </div>
        </div>
{{--  Petas star  --}}
        <div class="kotak">
            <div class="order">
                <div id="map"></div>
            </div>
        </div>
{{--  Peta Close  --}}

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
                        <th> Nama Pemilik <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nomor Telepon <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nama Merek <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Foto </th>
                        <th> Informasi </th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($pengajuan as $data_pengajuan)
                    <tr>
                        <td>{{ $data_pengajuan->nama_pemilik }}</td>
                        <td>{{ $data_pengajuan->nomor_telepon }}</td>
                        <td>{{ $data_pengajuan->nama_merek }}</td>
                        <td style="width: 100px; height: 100px;">
                            <img src="{{ asset('merek_gambar/' . $data_pengajuan->gambar_merek) }}" alt="" onclick="toggleGambar(this)" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                        </td>

                        <td><a href="/detailPermintaan">detail</a></td>
                        <td>
                            <form action="{{ route('beranda.delete', ['id' => $data_pengajuan->id]) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="confirmDelete(event)" class="delete-button" style="border: none;">
                                    <i class="fas fa-trash fa-lg" style="color: red;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            </table>
        </section>
    </main>
</body1>
{{--  tabel close  --}}


{{--  js  --}}

    {{--  js peta  --}}

    
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
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

        // Add tile layer to the map
        tileLayers.Streets.addTo(map);

        // Array to store markers
        var markers = [];

        // Loop through the data and add markers to the map
        @foreach($pengajuan as $data_pengajuan)
            var marker = L.marker([{{$data_pengajuan->latitude}}, {{$data_pengajuan->longitude}}]).addTo(map);
            var popupContent = '<div class="popup-content">';
            popupContent += '<div class="popup-info">';
            popupContent += '<h6>Nama Pemilik: {{$data_pengajuan->nama_pemilik}}</h6>';
            popupContent += '<h6>Nama Merek: {{$data_pengajuan->nama_merek}}</h6>';
            popupContent += '<img src="{{ asset('merek_gambar/' . $data_pengajuan->gambar_merek) }}" class="popup-image">';
            marker.bindPopup(popupContent);
            markers.push(marker);
        @endforeach

        // batas kabupaten
        @foreach ($kabupaten as $kab)
            $.getJSON("{{ $kab->geojson_kab }}", function(data) {
                var kabupatenLayer = L.geoJSON(data, {
                    style: {
                        color: 'blue', // set warna garis pinggir menjadi hitam
                        weight: 1,
                        opacity: 1,
                        dashArray: '3',
                        fillOpacity: 0.1,
                    },
                });
                kabupatenLayer.addTo(map);
            });
        @endforeach       



    // {{--  render untuk peta  --}}
    window.addEventListener('load', () => {
        map.invalidateSize();
        setTimeout(() => {
            window.dispatchEvent(new Event('resize'));
        }, 100);
    });

        // Menambahkan layer default
        tileLayers.Streets.addTo(map);

        // Menambahkan kontrol layer
        L.control.layers(tileLayers).addTo(map);


    </script>

    <!-- {{--  Tabel star  --}} -->
    <script>
        const search = document.querySelector('.input-group input'),
        table_rows = document.querySelectorAll('tbody tr'),
        table_headings = document.querySelectorAll('thead th');

        // 1. Searching for specific data of HTML table
        search.addEventListener('input', searchTable);

        function searchTable() {
            table_rows.forEach((row, i) => {
                let table_data = row.textContent.toLowerCase(),
                    search_data = search.value.toLowerCase();

                row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
                row.style.setProperty('--delay', i / 25 + 's');
            })

            document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
                visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
            });
        }

        // 2. Sorting | Ordering data of HTML table

        table_headings.forEach((head, i) => {
            let sort_asc = true;
            head.onclick = () => {
                table_headings.forEach(head => head.classList.remove('active'));
                head.classList.add('active');

                document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
                table_rows.forEach(row => {
                    row.querySelectorAll('td')[i].classList.add('active');
                })

                head.classList.toggle('asc', sort_asc);
                sort_asc = head.classList.contains('asc') ? false : true;

                sortTable(i, sort_asc);
            }
        })


        function sortTable(column, sort_asc) {
            [...table_rows].sort((a, b) => {
                let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
                    second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

                return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
            })
                .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
        }
    </script>
    {{--  table close  --}}

    {{--  popup gambar  start--}}
    <script>
        function toggleGambar(gambar) {
        gambar.classList.toggle("gambar-besar");
        }
    </script>
    {{--  popup close  --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Dihapus',
            text: '{{ session('success') }}',
            timer: 1500, // Durasi tampilan pop-up dalam milidetik (ms)
            showConfirmButton: false
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: '{{ session('error') }}',
            timer: 3000, // Durasi tampilan pop-up dalam milidetik (ms)
            showConfirmButton: false
        });
    </script>
@endif

<script>
    function confirmDelete(event) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>



@endsection
