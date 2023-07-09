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
                        <th> Lokasi </th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($pengajuan as $data_pengajuan)
                    <tr>
                        <td class="td1">{{ $data_pengajuan->nama_pemilik }}</td>
                        <td class="td1">{{ $data_pengajuan->nomor_telepon }}</td>
                        <td class="td1">{{ $data_pengajuan->nama_merek }}</td>
                        {{--  <td style="width: 85px; height: 85px;">
                            <img src="{{ asset('merek_gambar/' . $data_pengajuan->gambar_merek) }}" alt="" class="gambar-kecil" onclick="openPopup('{{ asset('merek_gambar/' . $data_pengajuan->gambar_merek) }}')">
                        </td>  --}}
                        <td style="width: 85px; height: 85px;">
                            <a href="{{ asset('merek_gambar/' . $data_pengajuan->gambar_merek) }}" target="_blank">
                                <img src="{{ asset('merek_gambar/' . $data_pengajuan->gambar_merek) }}" alt="" class="gambar-kecil" onclick="openPopup('{{ asset('merek_gambar/' . $data_pengajuan->gambar_merek) }}')">
                            </a>
                        </td>
                        <td class="td1"><a href="{{ route('detailPermintaan', ['id' => $data_pengajuan->id]) }}">detail</a></td>
                        <td>
                            <form action="{{ route('beranda.delete', ['id' => $data_pengajuan->id]) }}" method="POST" class="delete-form">
                                @csrf
                                @method('delete')
                                <button type="button" onclick="confirmDelete(event)" class="delete-button" style="border: none; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-trash fa-lg" style="background-color: white; color: red; margin: auto;">  Hapus</i>
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
        var popupContent = '<div class="custom-popup">';
        popupContent += '<div class="custom-popup-info">';
        popupContent += '<h6>Nama Pemilik: {{$data_pengajuan->nama_pemilik}}</h6>';
        popupContent += '<h6>Nama Merek: {{$data_pengajuan->nama_merek}}</h6>';
        popupContent += '</div>';
        popupContent += '<img src="{{ asset('merek_gambar/' . $data_pengajuan->gambar_merek) }}" class="custom-popup-image">';
        popupContent += '</div>';
        marker.bindPopup(popupContent);
        markers.push(marker);
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

        {{--  tabel menampilkan popup hapus --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmDelete(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menghapus data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        title: 'swal-title'
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Ambil formulir terdekat dengan tombol hapus yang diklik
                        const form = event.target.closest('.delete-form');
                        if (form) {
                            form.submit();
                        }
                    }
                });
            }
        </script>
        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Dihapus',
                text: '{{ session('success') }}',
                timer: 1500, // Durasi tampilan pop-up dalam milidetik (ms)
                showConfirmButton: false,
                customClass: {
                    title: 'swal-title'
                },
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
        {{--  popup menmapilkan hapus  --}}

    {{--  popup gambar  start--}}
    <script>
        function openPopup(imageUrl) {
            var popup = document.getElementById("popup");
            var popupImage = document.getElementById("popupImage");

            popup.style.display = "block";
            popupImage.src = imageUrl;
        }

        function closePopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "none";
        }
    </script>
    {{--  popup close  --}}

@endsection
