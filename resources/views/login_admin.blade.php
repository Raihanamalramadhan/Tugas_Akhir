@extends('navbar.navbar_loginadmin')

@section('navbar_login')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="css/login_admin.css">

    <title>WEB GIS | {{ $title }}</title>
</head>

<body>
    <div class="container">
        <div class="login">
            <form action="">
                <h1>Masuk</h1>
                <hr>
                <p>Kementerian Hukum dan Ham Wilayah Aceh</p>
                <label for="">Email</label>
                <input type="text" placeholder="example@gmail.com">
                <label for="">Sandi</label>
                <input type="password" placeholder="Password">
                <a href="/beranda" class="button-link">Masuk</a>
            </form>
        </div>
        <div class="right">
            <img src="img/gambar_login.png" alt="">
        </div>
    </div>
</body>
@endsection


