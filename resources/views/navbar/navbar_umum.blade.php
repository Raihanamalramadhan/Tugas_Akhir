<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Icon untuk Footer   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{--  fonts  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    {{--  father Icos  --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{--  Hubungkan css  --}}
    <link rel="stylesheet" href="css/navbar/navbar_umum.css">

    <link rel="shortcut icon" href="img/logo_judul.svg">
    <title>Merek Cerdas</title>
</head>
{{--  Navbar Start  --}}
<nav class="navbar">
    <a href="#" class="navbar-logo">
        <img src="img/logo_judul.svg">
        Merek<span>Cerdas</span>.
    </a>

        <div class="navbar-nav">
            <a class="nav-link" href="/">Beranda</a>
            <a class="nav-link" href="/dataMerek">Data Merek</a>
            <a class="nav-link" href="/kelasMerek">Kelas Merek</a>
            <a class="nav-link" href="/tentang">Tentang</a>
        </div>

        <div class="navbar-extra">
            <a class="nav-link" href="/login_admin"><i data-feather="log-in"></i>Masuk</a>
        </div>
    </nav>
{{--  Navbar Close  --}}

{{--  isi masing2 halaman di sini  --}}
    <div>
        @yield('navbar_umum')
    </div>
{{--  close  --}}

{{--  footer star  --}}
    <footer class="footer">
        <div class="footer-left">
            <div>
                <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9680390042868!2d95.3406603097771!3d5.571743633469482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30403704ddfb0df7%3A0xa9f7fa0bc57437cb!2sKantor%20Wilayah%20Kementerian%20Hukum%20dan%20HAM%20RI%20Aceh!5e0!3m2!1sid!2sid!4v1684046766432!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <p class="footer-copyright">Create by <a href="https://aceh.kemenkumham.go.id/">Kemenkumham Wilayah Aceh</a>. | &copy; 2023.</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Indonesia</span> Aceh, Banda Aceh</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>+62 822 2642 6492</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="#">kemenkumhan@gmail.com</a></p>
            </div>
        </div>

        <div class="footer-right">
            <p class="footer-about">
                <span>Tentang</span>
                Website ini dibuat dengan tujuan membantu masyarakat mendapatkan informasi tentang berbagai merek yang tersedia di Provinsi Aceh. Selain itu, website ini juga dapat membantu masyarakat yang belum memiliki sertifikat merek DJKI.
            </p>
            <div class="footer-media">
                <a href="https://www.youtube.com/channel/UCmJMRZ62mvUVc9bqEYScDyA"><i class="fa fa-youtube"></i></a>
                <a href="https://www.facebook.com/KemenkumhamRIofficial/"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/Kemenkumham_RI"><i class="fa fa-twitter"></i></a>
                <a href="https://www.instagram.com/kemenkumhamri/"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
    </footer>
{{--  footer close  --}}



{{--  java script  --}}
    {{--  Father Icons  --}}
    <script>
        feather.replace()
    </script>
</body>
</html>
