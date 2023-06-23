@extends('navbar.navbar_umum')

@section('navbar_umum')
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/kelas_merek.css">

        <title>WEB GIS | {{ $title }}</title>
</head>
<body>
    <div class="heading">
        <h1>Kelas Merek</h1>
        <p> <a href="/"> Beranda >></a> Kelas </p>
    </div>
    <div class="container">
        <div class="accordion-container">
            <div class="accordion active">
                <div class="accordion-heading">
                    <h3>Kelas 01</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Bahan kimia yang digunakan dalam industri, ilmu pengetahuan dan fotografi, maupun dalam pertanian hortikultura dan kehutanan: damar buatan yang belum diproses, plastik yang belum diproses; pupuk, komposisi pemadam kebakaran: sediaan-sediaan mengeraskan dan memateri: zat kimia untuk mengawetkan bahan makanan: zat penyamakan; bahan perekat yang digunakan dalam industri.
                </p>
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 02</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Cat, pernis, lak; bahan pencegah karatan dan kelapukan kayu; bahan warna; bahan penyering; damar yang belum dioleh; logam dalam bentuk daun atau bubuk untuk keperluan melukis, dekorasi, mencetak untuk para airtis.
                </p>
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 03</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Sediaan-sediaan untuk memutihkan dan mencuci; sediaan-sediaan untuk membersihkan, mengkilatkan, membuang lemak; sabun, wangi-wangian, minyak sari, kosmetik, minyak rambut; bahan-bahan pemeliharaan gigi.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 04</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Minyak dan lemak untuk industri; bahan pelumur; zat untuk mengisap, membasahi dan mengikat debu, bahan bakar (termasik minyak sari untuk motor) dan bahan penerangan; lilin, sumbu.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 05</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Sediaan farmasi dan kedokteran hewan, ilmu kebersihan untuk keperluan medis; zat makanan pantangan untuk diadaptasi untuk penggunaan medis dan kedokteran hewan, makanan bayi; suplemen pantangan untuk manusia dan hewan; plester, bahan pembalut; bahan untuk menambal gigi; pembuat gigi buatan; pembasi kuman; sediaan untuk membasmi binatang perusak; bahan pembasmi jamur; bahan pembasmi rumput liar.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 06</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    logam biasa dan campurannya; logam bahan bangunan; bangunan diangkut dari logam; bahan dari logam untuk rel kereta api; kabel non-listrik dan kabel dari logam biasa; barang besi, benda-benda kecil dari hardware logam; pipa dan tabung dari logam; brankas; barang dari logam biasa tidak termasuk dalam kelas-kelas lain; bijih.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 07</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Mesin dan mesin perkakas; motor dan mesin (kecuali untuk kendaraan darat); Kopling mesin dan komponen transmisi (kecuali untuk kendaraan darat); alat pertanian selain yang dioperasikan secara manual;alat pengeram.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 08</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Perkakas dan alat tangan (dioperasikan secara manual); pisau; pedang; pisau cukur.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 09</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Pesawat dan perkakas ilmu pengetahuan, pelayaran, penelitian, listrik, potret, kinematografi, timbang, ukur, sinyal, pengawasan (pemeriksaan), pertolongan dan pendidikan, pesawat dan perkakas untuk melaksanakan, menukar, menjelmakan, mengumpulkan, mengatur atau mengontrol listrik; perkakas untuk merekan transmisi atau reproduksi suara tau gambar; pembawa data magnetic, cakram perekam; CD, DVD dan media merekam digital.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 10</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Perkakas dan pesawat pembedahan, pengobatan, kedokteran, kedokteran gigi dan kedokteran hewan, lengan mata dan gigi palsu, barang-barang ortopedi, bahan-bahan benang bedah.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 11</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Instalasi penerangan, pemanasan, penghasilan uap, pemasangan, pendinginan, pengeringan, penyegaran udara pembagian air dan instalsi kesehatan.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 12</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Kendaraan; alat untuk bergerak di darat, udara atau air.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 13</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Senjata api; amunisi dan proyektil; bahan peledak; kembang api.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 14</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Logam mulia dan campurannya dan benda-benda yang dibuat dari bahan-bahan itu atau disepuh dengan bahan- bahan itu, tidak termasuk dalam kelas lain; perhiasan; batu berharga; jam dan pesawat pengukur waktu.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 15</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Alat-alat Musik.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 16</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Kertas, karton dan barang-barang terbuat dari bahan-bahan ini, tidak termasuk dalam kelas lain; barang cetakan, alat menjilid buku; alat tulis menulis; bahan perekat untuk keperluan tulis menulis atau rumah tangga; alat untuk kesenian, kuas untuk melukis; mesin tulis dan alat-alat kantor (kecuali perabot) alat-alat pendidikan dan pengajaran (kecuali perkakas); bahan-bahan plastik untuk kemasan (tidak termasuk dalam kelas lain); kartu main; huruf-huruf cetak; blok-blok cetak.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 17</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Karet, getah perca, getah, asbes, mika dan barang dari bahan-bahan itu dan tidak termasuk dalam kelas lain; plastik dalam bentuk menonjol untuk digunakan dalam manufaktur; bahan-bahan yang dipakai untuk pengemasan, merapatkan dan untuk menyekat; tabung lentur bukan dari logam.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 18</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Kulit dan kulit imitasi dan barang-barang dari bahan-bahan ini dan tidak termasuk dalam kelas lain; kulit binatang, kulit halus; koper dan tas, payung hujan, payu matahari dan tongkat; cambuk, pakaian kuda dan pelana.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 19</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Bahan bagunan (bukan logam); pipa kaku bukan logam untuk bangunan; aspal, pek dan bitumen; bangunan yang dapat dipindahkan bukan dari logam; monuimen, bukan dari logam.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 20</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Perabot rumah, kaca, bingkai; benda-benda (tidak termasuk dalam kelas lain) dari kayu, gabus, rumput, bambu, rotan, tanduk, tulang, gading, tulang ikan paus, kerang, amber, kulit mutiara, selloid dan dari bahan-bahan penggantinya, atau dari plastik.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 21</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Perkakas rumah tangga atau dapur dan wadah kecil (bukan dari logam mulia atau bukan sepuhan logam mulia); sisir dan bunga karang; sikat (kecuali kuas melukis); bahan-bahan pembuatan sikat; perkakas dan alat untuk membersihkan; kulit besi untuk menggosok; kaca yang belum dikerjakan atau dikerjakan sebagian (kecuali kaca yang digunakan dalam gedung ); barang pecah belah, porselin dan barang-barang tembikar tidak termasuk dalam kelas lain.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 22</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Tampar, tali, jala, renda, kere, kain terpal, layar, kantong, karung (tidak termasuk dalam kelas lain); bahan-bahan pengisi (kecuali dari karet atau plastik); serat kasar untuk pertenunan.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 23</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Benang untuk tekstil.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 24</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Tekstil dan barang-barang tekstil tidak termasuk dalam kelas lain; sepre dan taplak meja.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 25</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Pakaian, alas kaki, tutup kepala.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 26</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Kerawang dan sulaman, pita dan tali sepatu; kancing, kancing tekan, kait dan mata kait, peniti dan jarum; bunga buatan.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 27</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Permadani, tikar, lanoleum dan bahan-bahan lain yang dipakai sebagai alas lantai; alat-alat dinding (kecuali tenunan).
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 28</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Permainan serta alat-alatnya; alat-alat senam dan oari raga tidak termasuk dalam keas aui; perhiasan untuk pohon natal.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 29</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Daging, ikan,unggas dan binatang buruan; sari daging; buah-buahan serta sayur-sayuran yang diawetkan, dibekukan, dikeringkan dan dimask; jeli, sele, saus buah-buahan; telur, susu dan produk susu; minyak dan lemak yang dapat dimakan.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 30</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Padi-padian dan hasil-hasil pertanian, perkebunan, kehutanan dan jenis gandum yang tidak termasuk dalam kelas lain; hewan hidup; buah-buahan dan sayur-sayuran segar; benih-benih, tanaman dan bunga hidup; makanan untuk hewan, biji-bijian berkecambah untuk membuat bir.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 31</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Padi-padian dan hasil-hasil pertanian, perkebunan, kehutanan dan jenis gandum yang tidak termasuk dalam kelas lain; hewan hidup; buah-buahan dan sayur-sayuran segar; benih-benih, tanaman dan bunga hidup; makanan untuk hewan, biji-bijian berkecambah untuk membuat bir.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 32</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Bir; air mineral dan air soda dan minuman lain yang tidak beralkohol; minuman dan jus buah-buahan; sirop dan sediaan lain untuk membuat minuman,
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 33</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Minuman beralkohol (kecuali bir).
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 34</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Tembakau; barang-barang keperluan perokok; geretan.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 35</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Periklanan; manajemen usaha; administrasi usaha; fungsi kantor.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 36</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Asuransi; urusan keuangan; urusan moneter; urusan real estate.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 37</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Konstruksi bangunan; perbaikan; jasa instalasi.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 38</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Telekomunikasi.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 39</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Transportasi; pengemasan dan penyimpanan barang; pengaturan perjalanan.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 40</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Penanganan material.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 41</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Pendidikan; penyediaan latihan; hiburan; kegiatan olah raga dan kesenian.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 42</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Jasa penelitian dan tehnologi dan penelitian dan perancangn yang berhubungan dengannya; jasa penelitian dan analisis industri; perancangan dan pengembangan perangkat keras dan perangkat lunak komputer.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 43</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Jasa untuk menyediakan makanan dan minuman; akomodasi sementara.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 44</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Jasa medis; Jasa kehewanan; Perawatan kesehatan dan kecantikan untuk manusia atau hewan; Jasa pertanian, hortikultura dan hutan.
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Kelas 45</h3>
                    <i>+</i>
                </div>
                <p class="accordion-content">
                    Jasa hukum; jasa keamanan untuk perlindungan bangunan dan individu.
            </div>

        </div>
    </div>
    <script>
        let accordions = document.querySelectorAll('.accordion-container .accordion');

        accordions.forEach(acco =>{
            acco.onclick = () =>{
                accordions.forEach(subAcco => { subAcco.classList.remove('active') });
                acco.classList.add('active');
            }
        })
    </script>
</body>
@endsection



