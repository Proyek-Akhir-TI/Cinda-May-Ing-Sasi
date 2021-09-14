@extends('landing.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- card -->
<div class="container">
    <div style="margin-top:60px;">
        <div class="text-center">
            <h3 class="text-dark-600">LAYANAN ORDER</h3>
        </div>
    </div>
    <div class="row mt-5">
        <!-- Layanan -->
        @foreach($layanan as $lay)
        <!-- Layanan -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body table-responsive">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <h5>{{$lay->nama}}</h5>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$lay->dari_harga}} - {{$lay->sampai_harga}} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wrench fa-2x text-gray" style="opacity: 0.3;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Layanan -->

    <!-- Pesan -->
    <center>
        <div class="col-xl-4 col-md-12 mb-4">
            <button class="card border-center-primary shadow h-80 py-2">
                <div class="card-body table-responsive">

                    <a href="{{ route('pelanggan.login') }}" class="h4 mb-1 font-weight-bold ">PESAN SEKARANG</a>


                </div>
        </div>
        </button>
</div>
</center>



</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>