@extends('layouts.main')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('pelanggan.transaksi.create') }}" class="h3 mb-0"><i class="fas fa-cart-plus"></i> Pesan</a> 
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> 
  </div>

<!-- Content Row -->
  <div class="row">
    
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Transaksi Menunggu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-600">{{$menunggu}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Transaksi Diproses</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-600">{{$diproses}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-th-list fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Transaksi Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-600">{{$selesai}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  Antrian Service

  @foreach($transaksi as $no=>$mobil)
  @if($mobil->pelanggan_id == Auth::guard(session()->get('role'))->user()->id)
  <div class="col-md-12 mt-2">
    <div class="card  shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            {{$mobil->tipe}}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-600">
                            {{$mobil->plat}}
                        </div>
                    </div>
                    <div class="col">
                        <div class="h5 mb-0 font-weight-bold text-gray-600">
                            Nomor Antrian {{$no+1}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-car fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
  </div>
  @endif
  @endforeach

</div>
@endsection