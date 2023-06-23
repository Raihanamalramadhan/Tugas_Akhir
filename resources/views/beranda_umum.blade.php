@extends('navbar.navbar_umum')

@section('navbar_umum')
<head>
    {{--  fonts  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    {{-- Icon untuk Footer   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{--  Hubungkan CSS  --}}
    <link rel="stylesheet" href="css/beranda_umum.css">


</head>
<body>

{{--  Backround Utama start  --}}
    <section class="hero">
        <main class="content">
            <h1>Merek Anda Belum Bersertifikat &#63
            <span> akan kami bantu.</span></h1>
            <p>Kementerian Hukum dan HAM wilayah Aceh akan membantu anda dalam proses pendaftaran merek. Namun, anda terlebih dahulu harus mengisi data di bawah ini. </p>
        <a href="/daftardiri" class="cta">Daftar Diri</a>
    </section>
{{--  Backround Utama close  --}}

{{--  informasi merek star  --}}
    <div class="container">
        <h1 class="title">
            Merek
        </h1>
        <main class="accordion">
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/qP9NsOCe6TU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="content-accordion">
                <div class="question-answer">
                    <div class="question">
                        <h3 class="title-question">
                            Apa yang dimaksud Merek &#63
                        </h3>
                        <button class="question-btn">
                            <span class="up-icon">
                                <i class="fas fa-chevron-up"></i>
                            </span>
                            <span class="down-icon">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </button>
                    </div>
                    <div class="answer">
                        <p>Merek adalah tanda yang dapat ditampilkan secara grafis berupa gambar, logo, nama, kata, huruf, angka, susunan warna, dalam bentuk 2 (dua) dimensi dan/atau 3 (tiga) dimensi, suara, hologram, atau kombinasi dari 2 (dua) atau lebih unsur tersebut untuk membedakan barang dan/atau jasa yang diproduksi oleh orang atau badan hukum dalam kegiatan perdagangan barang dan/atau jasa.</p>
                    </div>
                </div>
                <div class="question-answer">
                    <div class="question">
                        <h3 class="title-question">
                            Apakah fungsi pemakaian Merek itu &#63
                        </h3>
                        <button class="question-btn">
                            <span class="up-icon">
                                <i class="fas fa-chevron-up"></i>
                            </span>
                            <span class="down-icon">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </button>
                    </div>
                    <div class="answer">
                        <p>Pemakaian Merek berfungsi sebagai:
                            <ol>
                                <li>Tanda pengenal untuk membedakan hasil produksi yang dihasilkan seseorang atau beberapa orang secara bersama-sama atau badan hukum dengan produksi orang lain atau badan hukum lainnya;</li>
                                <li>promosi, sehingga mempromosikan hasil produksinya cukup dengan menyebut Mereknya;</li>
                                <li>Jaminan atas mutu barangnya;</li>
                                <li>Penunjuk asal barang/jasa dihasilkan.</li>
                            </ol>
                        </p>
                    </div>
                </div>
                <div class="question-answer">
                    <div class="question">
                        <h3 class="title-question">
                            Apakah fungsi pendaftaran Merek itu &#63
                        </h3>
                        <button class="question-btn">
                            <span class="up-icon">
                                <i class="fas fa-arrow-up"></i>
                            </span>
                            <span class="down-icon">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </button>
                    </div>
                    <div class="answer">
                        <p>Pendaftaran Merek berfungsi sebagai:
                            <ol>
                                <li>Alat bukti bagi pemilik yang berhak atas Merek yang didaftarkan;</li>
                                <li>Dasar penolakan terhadap Merek yang sama keseluruhan atau sama pada pokoknya yang dimohonkan pendaftaran oleh orang lain untuk barang/jasa sejenisnya;</li>
                                <li>Dasar untuk mencegah orang lain memakai Merek yang sama keseluruhan atau  sama  pada pokoknya  dalam  peredaran  untuk barang/jasa sejenisnya.</li>
                            </ol>
                        </p>
                    </div>
                </div>
                <div class="question-answer">
                    <div class="question">
                        <h3 class="title-question">
                            Merek bagaimanakah yang tidak dapat didaftarkan &#63
                        </h3>
                        <button class="question-btn">
                            <span class="up-icon">
                                <i class="fas fa-chevron-up"></i>
                            </span>
                            <span class="down-icon">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </button>
                    </div>
                    <div class="answer">
                            <ol>
                                <li>bertentangan dengan ideologi negara, peraturan perundang-undangan, moralitas, agama, kesusilaan, atau ketertiban umum;</li>
                                <li>sama dengan, berkaitan dengan, atau hanya menyebut barang dan/atau jasa yang dimohonkan pendaftarannya;</li>
                                <li>memuat unsur yang dapat menyesatkan masyarakat tentang asal, kualitas, jenis, ukuran, macam, tujuan penggunaan barang dan/atau jasa yang dimohonkan pendaftarannya atau merupakan nama varietas tanaman yang dilindungi untuk barang dan/atau jasa yang sejenis;</li>
                                <li>memuat keterangan yang tidak sesuai dengan kualitas, manfaat, atau khasiat dari barang dan/atau jasa yang diproduksi;</li>
                                <li>tidak memiliki daya pembeda; dan/atau</li>
                                <li>merupakan nama umum dan/atau lambang milik umum.</li>
                            </ol>
                    </div>
                </div>
                <div class="question-answer">
                    <div class="question">
                        <h3 class="title-question">
                            Apakah yang menyebabkan permohonan pendaftaran Merek ditolak &#63
                        </h3>
                        <button class="question-btn">
                            <span class="up-icon">
                                <i class="fas fa-chevron-up"></i>
                            </span>
                            <span class="down-icon">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </button>
                    </div>
                    <div class="answer">
                        <p>Permohonan pendaftaran Merek ditolak apabila Merek tersebut:
                            <ol>
                                <li>mempunyai persamaan pada pokoknya atau keseluruhannya dengan Merek milik pihak lain yang sudah terdaftar lebih dahulu untuk barang dan/atau jasa yang sejenis;</li>
                                <li>mempunyai persamaan pada pokoknya atau keseluruhannya dengan Merek yang sudah terkenal milik pihak lain untuk barang dan/atau jasa sejenis;</li>
                                <li>mempunyai persamaan pada pokoknya atau keseluruhannya dengan Merek yang sudah terkenal milik pihak lain untuk barang dan/atau jasa tidak sejenis sepanjang memenuhi persyaratan tertentu yang ditetapkan lebih lanjut dengan peraturan pemerintah;</li>
                                <li>mempunyai persamaan pada pokoknya atau keseluruhannya dengan indikasi-geografis yang sudah dikenal;</li>
                                <li>merupakan atau menyerupai nama orang terkenal, foto, atau nama badan hukum yang dimiliki orang lain, kecuali atas persetujuan tertulis dari yang berhak;</li>
                                <li>merupakan tiruan atau menyerupai nama atau singkatan nama, bendera, lambang atau simbol atau emblem negara atau lembaga nasional maupun internasional, kecuali atas persetujuan tertulis dari pihak yang berwenang;</li>
                                <li>merupakan tiruan atau menyerupai tanda atau cap atau stempel resmi yang digunakan oleh Negara atau lembaga pemerintah, kecuali atas persetujuan tertulis dari pihak yang berwenang.</li>
                            </ol>
                        </p>
                    </div>
                </div>
                <div class="question-answer">
                    <div class="question">
                        <h3 class="title-question">
                            Berapa lama perlindungan hukum Merek terdaftar &#63
                        </h3>
                        <button class="question-btn">
                            <span class="up-icon">
                                <i class="fas fa-chevron-up"></i>
                            </span>
                            <span class="down-icon">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </button>
                    </div>
                    <div class="answer">
                        <p>Merek terdaftar mendapatkan perlindungan hukum untuk jangka waktu 10 tahun sejak tanggal penerimaan permohonan pendaftaran Merek yang bersangkutan dan jangka waktu perlindungan itu dapat diperpanjang.</p>
                    </div>
                </div>

            </div>
        </main>
    </div>
{{--  informasi merek close  --}}



{{--  java script  --}}
    {{--  js header  --}}
    <script>
        const accordionHeaders = document.querySelectorAll('.accordion-header');

        accordionHeaders.forEach(header => {
            header.addEventListener('click', () => {
            const accordionItem = header.parentNode;
            accordionItem.classList.toggle('active');
            });
        });
    </script>

    {{--  js pertanyaan  --}}
    <script>
        const questions = document.querySelectorAll('.question-answer');

        questions.forEach(function(question) {
            const btn = question.querySelector('.question-btn');
            btn.addEventListener("click", function() {
                questions.forEach(function(item) {
                    if (item !== question) {
                        item.classList.remove("show-text");
                    }
                })
                question.classList.toggle("show-text");
            })
        })
    </script>

    {{--  js icon  --}}
    <script>
        feather.replace()
    </script>
</body>
@endsection



