@extends('navbar.navbar_umum')

@section('navbar_umum')
<head>
    {{--  fonts  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    {{--  father Icos  --}}
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="css/tentang.css">

    <title>WEB GIS | {{ $title }}</title>
</head>
<body>
    <div class="heading">
        <h1>Tentang Kami</h1>
        <p> <a href="/"> Beranda >></a> Tentang </p>
    </div>

{{--  tentang kami start  --}}
    <section class="tentang">
        <h2><span>Kementerian Hukum dan HAM R.I</span> Wilayah Aceh</h2>

        <div class="row">
            <div class="about-img">
                <img src="img/kemenkumham.jpg" alt="Tentang Kami">
            </div>
            <div class="content">
                <p>Kemenkumham beberapa kali mengalami pergantian nama yakni: "Departemen Kehakiman" (1945-1999), "Departemen Hukum dan Perundang-undangan" (1999-2001), "Departemen Kehakiman dan Hak Asasi Manusia" (2001-2004), "Departemen Hukum dan Hak Asasi Manusia" (2004-2009), dan "Kementerian Hukum dan Hak Asasi Manusia" (2009-sekarang).</p>
                <p>Kementerian Hukum dan Hak Asasi Manusia pertama kali dibentuk pada tanggal 19 Agustus 1945 dengan nama Departemen Kehakiman. Menteri Kehakiman yang pertama menjabat adalah Soepomo. Kementerian Hukum dan Hak Asasi Manusia pada zaman pemerintahan Belanda disebut Departemen Van Justitie yaitu berdasarkan peraturan Herdeland Yudie Staatblad No.576.</p>
                <p>Nama Departemen Kehakiman telah beberapa kali berubah nama karena disesuaikan dengan fungsi dari Departemen tersebut yaitu dari Departemen Kehakiman menjadi Departemen Hukum dan dan Perundang-undangan dan sekarang menjadi Kementerian Hukum Dan Hak Asasi Manusia.</p>
                <p>Kementerian Hukum dan HAM memiliki perwakilan Kantor wilayah (kanwil) Kementerian Hukum dan Hak Asasi Manusia merupakan instansi vertikal Kementerian Hukum dan ... <a href="https://aceh.kemenkumham.go.id/profil/sekilas-kantor-wilayah#:~:text=Pada%20Provinsi%20Aceh%2C%20Kantor%20Wilayah%20Kementerian%20Hukum%20dan,Aceh.%20Kantor%20Wilayah%20Kemenkumham%20Aceh%20dibentuk%20tahun%201982.">Klik disini!</a></p>
            </div>
        </div>
    </section>
{{--  tentang kami close  --}}


{{--  Myteam start  --}}
<section class="team">
    <h2><span>Team </span> Projeck</h2>
    <p>Website ini dibuat untuk menyelesaikan tugas akhir mahasiswa</p>
    <div class="row">
        <div class="team-card">
            <img class="team-card-img" src="img/team/1.jpg" alt="team">
            <h3 class="team-card-tittle">- Raihan Amal Ramadhan -</h3>
            <p class="team-card-price">Mahasiswa Informatika 2019</p>
        </div>
        <div class="team-card">
            <img class="team-card-img" src="img/team/2.png" alt="team">
            <h3 class="team-card-tittle">- Muslim Amiren, S,Si., M.Info Tech -</h3>
            <p class="team-card-price">Pembimbing I</p>
        </div>
        <div class="team-card">
            <img class="team-card-img" src="img/team/2.png" alt="team">
            <h3 class="team-card-tittle">- Muhammad Rusdi, S.P., M.Si., Ph.D -</h3>
            <p class="team-card-price">Pembimbing II</p>
        </div>
        <div class="team-card">
            <img class="team-card-img" src="img/team/3.png" alt="team">
            <h3 class="team-card-tittle">- Kemenkumham -</h3>
            <p class="team-card-price">Wilayah Aceh</p>
        </div>
    </div>
</section>
{{--  Myteam close  --}}

{{--  Father Icons  --}}
<script>
    feather.replace()
</script>

</body>
</section>

@endsection



