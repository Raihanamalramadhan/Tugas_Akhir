@extends('navbar.navbar_admin')

@section('navbar_admin')
<head>
    {{--  menghubungkan leafleat  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    {{--  Hubungkan CSS  --}}
    <link rel="stylesheet" href="css/admin/pengaturan.css">

    <title>WEB GIS | {{ $title }}</title>

</head>
<body>
    <div class="container">
        <div class="login">
            <form action="">
                <h1>Pengaturan</h1>
                <hr>
                <p>Kementerian Hukum dan Ham Wilayah Aceh</p>
                <label for="">Email : </label>
                <span1>Kemenkumham@gmail.com</span1>
                <label for="">Password</label>
                <span1>Kemenkumham123456</span1>
                <span id="cekloginBtn" class="button-link">Ganti Password</span>
            </form>
        {{--  menampilkan popup login  --}}
        <div id="cekloginPopup">
            <div class="cekpopupContent">
                <form>
                    <label>Sandi</label><br>
                    <input  type="text" id="nama-pemilik-merek" placeholder="Masukkan sandi"><br>
                    <label>Konfimasi Sandi</label><br>
                    <input  type="text" id="nomor-pemohon" placeholder="Masukkan sandi ulang"><br>
                    <button type="submit">Ubah</button>
                    <button button id="cekcloseBtn">Batal</button>
                </form>
            </div>
        </div>
        {{--  Peta dan popup Close  --}}
        </div>
        <div class="right">
            <img src="img/gambar_login.png" alt="">
        </div>
    </div>
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
</body>
@endsection
