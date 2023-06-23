@extends('navbar.navbar_admin')

@section('navbar_admin')
<head>
    {{--  Hubungkan CSS  --}}
    <link rel="stylesheet" href="css/admin/persentase.css">

    {{--  menghubungkan chart.js  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>WEB GIS | {{ $title }}</title>
</head>
<body>
    <div class="charts">
        <div class="chart">
            <h2>Jumlah merek pertahun</h2>
            <canvas id="myChart"></canvas>
            <label for="y-axis-description">Tahun</label>
        </div>
        <div class="chart" id="doughnut-chart">
            <h2>Jumlah Tipe Pemohon</h2>
            <canvas id="donutChart"></canvas>
        </div>
    </div>
    <div class="charts1">
        <div class="chart">
            <h2>Jumlah merek kelas</h2>
            <canvas id="bar1"></canvas>
        </div>
    </div>
{{--  Grafik Close  --}}

{{--  grafik line star  --}}
<script>
    // Data untuk grafik
    var data = {
        labels: ["2019", "2020", "2021", "2022", "2023", "2024", "2025", "2026", "2027", "2028", "2029", "2030"],
        datasets: [
            {
            label: "jumlah merek",
            data: getChartData(),
            borderColor: "rgba(75, 192, 192, 1)",
            backgroundColor: "rgba(75, 192, 192, 0.2)",
            fill: true
            }
        ]
    };

    // Pengaturan opsi
    var options = {
        responsive: true,
        title: {
            display: true,
            text: "Grafik Penjualan"
        },
        scales: {
            x: {
            display: true
            },
            y: {
            display: true
            }
        }
    };

    // Membuat grafik garis
    var ctx = document.getElementById("myChart").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "line",
        data: data,
        options: options
    });

    // Fungsi untuk mendapatkan data dinamis untuk sumbu Y
    function getChartData() {
        // Contoh data dinamis
        var dynamicData = [400, 100, 800, 400, 500, 1000, 1200, 1400];

        // Kode untuk menghasilkan data dinamis di sini, misalnya:
        // var dynamicData = [nilai1, nilai2, nilai3, ...];

        return dynamicData;
    }
    </script>
    {{--  grafik line close  --}}

    {{--  grafik donat  --}}
    <script>
        // Data untuk grafik donat
        var data = {
        labels: ['Merek Dagang', 'Merek Jasa', 'Merek Kolektif', 'Merek Dagang dan Jasa'],
        datasets: [{
            data: [12, 19, 3, 5],
            backgroundColor: ['#8B0000', '#00008B', '#808000', '#006400']
        }]
        };

        // Opsi konfigurasi untuk grafik donat
        var options = {
        responsive: true
        };

        // Membuat grafik donat
        var ctx = document.getElementById('donutChart').getContext('2d');
        var donutChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    </script>
    {{--  grafik donat close  --}}

    {{--  grafik bar star --}}
        <script>
            var ctx = document.getElementById('bar1').getContext('2d');
            var bar1 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['kelas 1', 'kelas 2', 'kelas 3', 'kelas 4', 'kelas 5', 'kelas 6', 'kelas 7', 'kelas 8', 'kelas 9', 'kelas 10', 'kelas 11', 'kelas 12', 'kelas 13', 'kelas 14', 'kelas 15', 'kelas 16', 'kelas 17', 'kelas 18', 'kelas 19', 'kelas 20', 'kelas 21', 'kelas 22', 'kelas 23', 'kelas 24', 'kelas 25', 'kelas 26', 'kelas 27', 'kelas 28', 'kelas 29', 'kelas 30', 'kelas 31', 'kelas 32', 'kelas 33', 'kelas 34', 'kelas 35', 'kelas 36', 'kelas 37', 'kelas 38', 'kelas 39', 'kelas 40', 'kelas 41', 'kelas 42', 'kelas 43', 'kelas 44', 'kelas 45'],
                datasets: [{
                label: 'Data',
                data: [12, 19, 3, 5, 2],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            }
            });
        </script>
    {{--  grafik bar close  --}}
</body>
@endsection
