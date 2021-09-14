<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('template/landing/style-beranda.css') }}">
    <title>Beranda</title>
    <!-- Custom fonts for this template-->
    <link href="{{ url('template/setting/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <section>
        <header>
            <a href="/" class="logo"><img src="https://i.ibb.co/6gGDfLK/logo.jpg" alt="" width="100"></a>
            <ul>
                <!-- <li><a href="beranda">Beranda</a></li> -->
                <li><a href="{{ route('landing.layanan') }}">Layanan</a></li>
                <li><a href="{{ route('landing.tentang') }}">Tentang Kami</a></li>
                <li><a href="{{ route('admin.login') }}">Admin</a></li>
                <li><a href="{{ route('pelanggan.login') }}">Pelanggan</a></li>
                <!-- <li><a href="{{ route('pelanggan.login') }}">Pesan Sekarang</a></li> -->
            </ul>
        </header>
        @yield('content')
    </section>
</body>

</html>