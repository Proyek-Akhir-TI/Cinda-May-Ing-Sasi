@extends('landing.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('template/img/info.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Keadaan Bengkel</h5>
                    <p>Some representative placeholder content for the first slide.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('template/img/jdwl.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Jam Kerja Bengkel</h5>
                    <p>Untuk jam pengambilan pick up order dilakukan malam hari setelah jam kerja operasional </p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('template/img/maps1.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Alamat Bengkel Kami</h5>
                    <p>Ikuti sosial media kami agar selalu mengetahui informasi dari kami!</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('template/img/maps2.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Alamat Bengkel Kami</h5>
                    <p>Ikuti sosial media kami agar selalu mengetahui informasi dari kami!</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('template/img/sosmed.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Sosial Media Kami</h5>
                    <p>Ikuti sosial media kami agar selalu mengetahui informasi dari kami!</p> -->
                </div>
            </div>
        </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
