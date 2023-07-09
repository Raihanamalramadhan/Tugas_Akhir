@extends('navbar.navbar_admin')

@section('navbar_admin')
<head>
    {{--  Hubungkan CSS  --}}
    <link rel="stylesheet" href="css/admin/persentase.css">

    {{--  menghubungkan chart.js  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <div class="charts">
        <div class="chart">
            <h2>Jumlah merek pertahun</h2>
            <canvas id="myChart"></canvas>
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
            labels: {!! json_encode($label) !!},
            datasets: [
                {
                    label: "Jumlah Merek",
                    data: {!! json_encode($value) !!},
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
                text: "Grafik Jumlah Merek"
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: "Tahun"
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: "Jumlah Merek"
                    },
                    ticks: {
                        precision: 0
                    }
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
    </script>
    {{--  grafik line close  --}}

    {{--  grafik donat  --}}
    <script>
        var ctx = document.getElementById('donutChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Data',
                    data: @json($values),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'nama_tipe'
                }
            }
        });
    </script>
    {{--  grafik donat close  --}}

    {{--  grafik bar star --}}
    <script>
        var ctx = document.getElementById('bar1').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($lebel) !!},
                datasets: [{
                    label: 'Data Kelas',
                    data: {!! json_encode($valu) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        ticks: {
                            stepSize: 1,
                            callback: function(value, index, values) {
                                return value.toFixed(0);
                            }
                        },
                        title: {
                            display: true,
                            text: 'Jumlah merek' // Teks untuk sumbu Y
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Kelas' // Teks untuk sumbu X
                        }
                    }
                }
            }
        });
    </script>


    {{--  grafik bar close  --}}
</body>
@endsection
