<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
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

<body>
    {{--  Navbar Start  --}}
    <nav class="navbar">
        <a href="#" class="navbar-logo">Kemenkumham<span>Aceh</span>.</a>

        <div class="navbar-nav">
            <a class="nav-link {{ ($title === "Beranda") ? 'active' : '' }}" href="/">Beranda</a>
            <a class="nav-link {{ ($title === "Sebaran") ? 'active' : '' }}"" href="/dataMerek">Data Merek</a>
            <a class="nav-link {{ ($title === "Kelas Merek") ? 'active' : '' }}"" href="/kelasMerek">Kelas Merek</a>
            <a class="nav-link {{ ($title === "tentang") ? 'active' : '' }}"" href="/tentang">Tentang</a>
        </div>

        <div class="navbar-extra">
            <a class="nav-link {{ ($title === 'Login_admin') ? 'active' : '' }}" href="/login_admin"><i data-feather="log-in"></i>Log In</a>
        </div>
    </nav>
    {{--  Navbar Close  --}}

    <div>
        @yield('navbar_login')
    </div>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap');
</style>

</head>
<body>
    {{--  Father Icons  --}}
    <script>
        feather.replace()
    </script>

    {{--  My java script  --}}
    <script src="js/script.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
