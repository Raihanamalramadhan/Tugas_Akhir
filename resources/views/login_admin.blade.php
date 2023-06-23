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
        @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        @endif            
            <form action="/login" method="POST">
            @csrf
                <h1>Masuk</h1>
                <hr>
                <p>Kementerian Hukum dan Ham Wilayah Aceh</p>
                <label for="email">Email</label>
                <input type="text" class="form-control input-same-size @error('email') is-invalid @enderror" id="email" name="email" placeholder="example@gmail.com" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                    {{ $message }} </div>
                @enderror  
                <label for="password">Sandi</label>
                <input type="password" name="password" class="form-control input-same-size @error('password') is-invalid @enderror" id="password" placeholder="Password">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }} </div>
                @enderror

                <div>
                    <button class="button" type="submit">MASUK</button>
                </div>
                <!-- <a href="/beranda" class="button-link">Masuk</a> -->
            </form>
        </div>
        <div class="right">
            <img src="img/gambar_login.png" alt="">
        </div>
    </div>
</body>
@endsection


