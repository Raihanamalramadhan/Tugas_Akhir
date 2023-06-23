@extends('navbar.navbar_admin')

@section('navbar_admin')
<head>
    {{--  menghubungkan leafleat  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    {{--  Hubungkan CSS  --}}
    <link rel="stylesheet" href="css/admin/data_merek.css">

</head>
<body>
    <main>
        <div class="head-title">
            <div class="left">
                <h2>Data Merek Bersertifikat</h2>
                <hr>
            </div>
        </div>

{{--  tabel star--}}
<body1>
    <main class="table">
        <section class="table__header">
            <h1>Tabel Data Merek</h1>
            <div class="input-group">
                <input type="search" placeholder="Cari data...">
                <img src="img/cari.png" alt="">
            </div>
            <a href="/tambah">+ Tambah</a>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Nomor Pemohon <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nama Pemilik <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nomor Telepon <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nama Merek <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tahun Penerimaan <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tipe Pemohon <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Kelas <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Kabupaten <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Foto </th>
                        <th> Lokasi </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> do037773629 </td>
                        <td> Raihan Amal Ramadhan </td>
                        <td> 082236426492 </td>
                        <td> rayhan@gmail.com </td>
                        <td> kecap asin </td>
                        <td> 2020 </td>
                        <td> Merek Dagang </td>
                        <td> 17 </td>
                        <td> Banda aceh </td>
                        <td> <img src="img/team/1.jpg" alt="" class="gambar-kecil" onclick="toggleGambar(this)"></td>
                        <td><a href="#">Detail</a></td>
                    </tr>
                    <tr>
                        <td> do0893u92ru </td>
                        <td> Yovie pramudia tama </td>
                        <td> 0822388272662 </td>
                        <td> yovie@gmail.com </td>
                        <td> jelbab condel </td>
                        <td> 2019 </td>
                        <td> Merek Dagang </td>
                        <td> 29 </td>
                        <td> aceh tamian </td>
                        <td> <img src="img/team/1.jpg" alt="" class="gambar-kecil" onclick="toggleGambar(this)"></td>
                        <td><a href="#">Detail</a></td>
                    </tr>
                    <tr>
                        <td> do037773629 </td>
                        <td> Sofia Safira </td>
                        <td> 082238373636 </td>
                        <td> sofia@gmail.com </td>
                        <td> khaca rayeuk </td>
                        <td> 2022 </td>
                        <td> Merek dagang </td>
                        <td> 17 </td>
                        <td> Banda aceh </td>
                        <td> <img src="img/team/1.jpg" alt="" class="gambar-kecil" onclick="toggleGambar(this)"></td>
                        <td><a href="#">Detail</a></td>
                    </tr>
                    <tr>
                        <td> dofjfjf889 </td>
                        <td> Putri Mahela </td>
                        <td> 0829779273927 </td>
                        <td> putri@gmail.com </td>
                        <td> kebab </td>
                        <td> 2021 </td>
                        <td> Merek jasa </td>
                        <td> 42 </td>
                        <td> aceh singkil </td>
                        <td> <img src="img/team/1.jpg" alt="" class="gambar-kecil" onclick="toggleGambar(this)"></td>
                        <td><a href="#">Detail</a></td>
                    </tr>
                    <tr>
                        <td> dofjfjf889 </td>
                        <td> Putri Mahela </td>
                        <td> 0829779273927 </td>
                        <td> putri@gmail.com </td>
                        <td> kebab </td>
                        <td> 2021 </td>
                        <td> Merek jasa </td>
                        <td> 42 </td>
                        <td> aceh singkil </td>
                        <td> <img src="img/team/1.jpg" alt="" class="gambar-kecil" onclick="toggleGambar(this)"></td>
                        <td><a href="#">Detail</a></td>
                    </tr>
                    <tr>
                        <td> do0893u92ru </td>
                        <td> Yovie pramudia tama </td>
                        <td> 0822388272662 </td>
                        <td> yovie@gmail.com </td>
                        <td> jelbab condel </td>
                        <td> 2019 </td>
                        <td> Merek Dagang </td>
                        <td> 29 </td>
                        <td> aceh tamian </td>
                        <td> <img src="img/team/1.jpg" alt="" class="gambar-kecil" onclick="toggleGambar(this)"></td>
                        <td><a href="#">Detail</a></td>
                    </tr>
                    <tr>
                        <td> do037773629 </td>
                        <td> Sofia Safira </td>
                        <td> 082238373636 </td>
                        <td> sofia@gmail.com </td>
                        <td> khaca rayeuk </td>
                        <td> 2022 </td>
                        <td> Merek dagang </td>
                        <td> 17 </td>
                        <td> Banda aceh </td>
                        <td> <img src="img/team/1.jpg" alt="" class="gambar-kecil" onclick="toggleGambar(this)"></td>
                        <td><a href="#">Detail</a></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body1>
{{--  tabel close  --}}

{{--  js  --}}
    {{--  Tabel star  --}}
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
    {{--  popup gambar close  --}}
@endsection
