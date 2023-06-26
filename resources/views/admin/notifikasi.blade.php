@extends('navbar.navbar_admin')

@section('navbar_admin')
<head>
    {{--  Hubungkan CSS  --}}
    <link rel="stylesheet" href="css/admin/notifikasi.css">

    {{--  icon  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <main>
        <div class="head-title">
            <div class="left">
                <h2>Notifikasi</h2>
                <hr>
            </div>
        </div>

{{--  tabel star--}}
<body1>
    <main class="table">
        <section class="table__header">
            <i id="info-icon" class="fas fa-exclamation-circle info-icon" onclick="toggleInfo()"></i>

                    <div id="popup-overlay" class="overlay"></div>
                    <div id="popup" class="popup">
                        <h2>Peraturan</h2>
                        <p>Halaman notifikasi</p>
                        <ul>
                            <li>1. Halaman ini terdapat data merek yang tidak terdata di kemenkumhamham dan website ini</li>
                            <li>2. Admin dapat melakukan aksi tolak dan terima pada data tersebut</li>
                            <li>3. jika dilakukan aksi terima data akan masuk ke dalam kumpulan data utama. namun, jika dilakukan aksi tolak, maka data tersebut otamis hilang atau terhapus</li>
                            <li>4. sebelum melakukan aksi terima, mungkin anda bisa mengchek terlebih duluhu bukti merek berupa gambar sertifikatnya. dengan cara klik saja pada foto sertifikat</li>
                        </ul>
                        <button onclick="closePopup()">Tutup</button>
                    </div>

            <div class="input-group">
                <input type="search" placeholder="Cari data...">
                <img src="img/cari.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th class="kolom1"> Bukti Sertifikat</th>
                        <th class="kolom1"> Aksi</th>
                        <th> Lokasi</th>
                        <th class="kolom1"> Gambar Merek</th>
                        <th class="kolom2"> Nomor Pemohon <span class="icon-arrow">&UpArrow;</span></th>
                        <th class="kolom2"> Nama Pemilik <span class="icon-arrow">&UpArrow;</span></th>
                        <th class="kolom2"> Nomor Telepon <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th class="kolom2"> Nama Merek <span class="icon-arrow">&UpArrow;</span></th>
                        <th class="kolom2"> Tahun Penerimaan <span class="icon-arrow">&UpArrow;</span></th>
                        <th class="kolom2"> Tipe Pemohon <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Kelas <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td style="width: 85px; height: 85px;">
                            <img src="{{ asset('storage/gambar/' . $user->foto_sertifikat) }}" alt="" class="gambar-kecil" onclick="toggleGambar(this)">
                        </td>
                        <td class="button-container">
                            <button type="submit" class="accept-button">Terima</button>
                            <form action="{{ route('notifikasi.delete', $user->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="reject-button" onclick="confirmDelete(event)">Tolak</button>
                            </form>
                        </td>
                        <td> <a href="#">Detail</a></td>
                        <td style="width: 85px; height: 85px;">
                            <img src="{{ asset('storage/gambar/' . $user->gambar_merek) }}" alt="" class="gambar-kecil" onclick="toggleGambar(this)">
                        </td>
                        <td> {{ $user->nomor_pemohon }} </td>
                        <td>{{ $user->nama_pemilik }}</td>
                        <td>{{ $user->nomor_telepon }}</td>
                        <td>{{ $user->email }}</td>
                        <td> {{ $user->nama_merek }}</td>
                        <td>{{ $user->tahun_penerimaan }}</td>
                        <td>{{ $user->id_tipe }}</td>
                        <td>{{ $user->id_kelas }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</body1>
{{--  tabel close  --}}

{{--  js  --}}
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

    {{--  popup gambar  start--}}
    <script>
        function toggleGambar(gambar) {
        gambar.classList.toggle("gambar-besar");
        }
    </script>
    {{--  popup gambar close  --}}

    {{--  tabel menampilkan popup hapus --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menolak data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, tolak!',
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
            title: 'Data Berhasil Ditolak',
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

    {{--  informasi tentang website star --}}
    <script>
        function toggleInfo() {
            var popup = document.getElementById("popup");
            var overlay = document.getElementById("popup-overlay");
            if (popup.style.display === "none") {
            popup.style.display = "block";
            overlay.style.display = "block";
            } else {
            popup.style.display = "none";
            overlay.style.display = "none";
            }
        }

        function closePopup() {
            var popup = document.getElementById("popup");
            var overlay = document.getElementById("popup-overlay");
            popup.style.display = "none";
            overlay.style.display = "none";
        }
    </script>
    {{--  informasi tentang close  --}}

@endsection
