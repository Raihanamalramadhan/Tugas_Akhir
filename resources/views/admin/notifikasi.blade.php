@extends('navbar.navbar_admin')

@section('navbar_admin')
<head>
    {{--  menghubungkan leafleat  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    {{--  Hubungkan CSS  --}}
    <link rel="stylesheet" href="css/admin/notifikasi.css">

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
                            <li>Halaman ini terdapat data merek yang tidak terdata di kemenkumhamham dan website ini</li>
                            <li>Admin dapat melakukan aksi tolak dan terima pada data tersebut</li>
                            <li>jika dilakukan aksi terima data akan masuk ke dalam kumpulan data utama. namun, jika dilakukan aksi tolak, maka data tersebut otamis hilang atau terhapus</li>
                            <li>sebelum melakukan aksi terima, mungkin anda bisa mengchek terlebih duluhu bukti merek berupa gambar sertifikatnya. dengan cara klik saja pada foto sertifikat</li>
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
                                <th> Bukti Sertifikat</th>
                                <th> Aksi</th>
                                <th> Lokasi</th>
                                <th> Gambar Merek</th>
                                <th> Nomor Pemohon <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Nama Pemilik <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Nomor Telepon <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Nama Merek <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Tahun Penerimaan <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Tipe Pemohon <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Kelas <span class="icon-arrow">&UpArrow;</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="td1"style="width: 85px; height: 85px;"> <img src="img/team/1.jpg" alt="" class="gambar-kecil" onclick="toggleGambar(this)"></td>
                                <td> <button>Terima</button> <button>Tolak</button></td>
                                <td> <a href="#">Detail</a></td>
                                <td style="width: 85px; height: 85px;"> <img src="img/team/1.jpg" alt="" class="gambar-kecil" onclick="toggleGambar(this)"></td>
                                <td> 8936426928292 </td>
                                <td> Raihan Amal Ramadhan</td>
                                <td> 9828469366</td>
                                <td> rayhan@gmail.com</td>
                                <td> Katsuju</td>
                                <td> 2021</td>
                                <td> Merek Dagang</td>
                                <td> kelas 2</td>
                            </tr>
                            <tr>
                                <td> <img src="img/team/1.jpg" alt="" class="gambar-kecil" onclick="toggleGambar(this)"></td>
                                <td> <button>Edit</button> <button>Hapus</button></td>
                                <td> <a href="#">Detail</a></td>
                                <td> <img src="img/team/1.jpg" alt="" class="gambar-kecil" onclick="toggleGambar(this)"></td>
                                <td> 8936426928292 </td>
                                <td> Raihan Amal Ramadhan</td>
                                <td> 9828469366</td>
                                <td> rayhan@gmail.com</td>
                                <td> Katsuju</td>
                                <td> 2021</td>
                                <td> Merek Dagang</td>
                                <td> kelas 2</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

            </main>
        </body1>
        {{--  tabel close  --}}
    </main>

{{--  js  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
    function togglePopup() {
        var popup = document.getElementById("infoPopup");
        if (popup.style.display === "none") {
        popup.style.display = "block";
        } else {
        popup.style.display = "none";
        }
    }
    </script>

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

        {{--  informasi tentang website  --}}
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
</body>
@endsection
