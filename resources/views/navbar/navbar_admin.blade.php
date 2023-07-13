<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <!-- My CSS -->
    <link rel="stylesheet" href="css/navbar/navbar_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="shortcut icon" href="img/logo_judul.svg">
    <title>Merek Cerdas</title>
</head>
<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <ul class="side-menu top">
            <li>
                <a href="javascript:void(0)" data-href="/beranda" id="beranda-link" onclick="goToPage(this)">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Beranda</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" data-href="/persentase" id="persentase-link">
                    <i class="bx bx-bar-chart"></i>
                    <span class="text">Data Grafik</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" data-href="/datamerek" id="datamerek-link">
                    <i class="bx bxs-data"></i>
                    <span class="text">Data Merek</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu top">
            <li>
                <a href="javascript:void(0)" data-href="/pengaturan" id="Pengaturan">
                    <i class="bx bxs-cog"></i>
                    <span class="text">Pengaturan</span>
                </a>
            </li>
            <li>
                <a href="/logout" class="logout">
                    <i class="bx bxs-log-out-circle"></i>
                    <span class="text">Keluar</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class="bx bx-menu"></i>
            <a>Kementerian Hukum dan HAM Wilayah Aceh</a>
            <form action="#">
                <div class="form-input">
                </div>
            </form>

            <a href="/notifikasi" class="notification">
                <i class="bx bxs-bell"></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </a>
        </nav>
        <!-- NAVBAR -->

        <div>
            @yield('navbar_admin')
        </div>

    </section>

    <script>
            // Mendapatkan URL halaman saat ini
    const currentUrl = window.location.pathname;

    const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

    allSideMenu.forEach(item => {
        const li = item.parentElement;
        const href = item.getAttribute('data-href');

        // Memeriksa apakah URL halaman saat ini cocok dengan tautan pada menu
        if (currentUrl === href) {
            li.classList.add('active');
        }

        item.addEventListener('click', function () {
            allSideMenu.forEach(i => {
                i.parentElement.classList.remove('active');
            })
            li.classList.add('active');

            // Mengarahkan ke tautan yang sesuai
            window.location.href = href;
        })
    });

        // TOGGLE SIDEBAR
        const menuBar = document.querySelector('#content nav .bx.bx-menu');
        const sidebar = document.getElementById('sidebar');

        menuBar.addEventListener('click', function () {
            sidebar.classList.toggle('hide');
        })
    </script>
</body>
</html>
