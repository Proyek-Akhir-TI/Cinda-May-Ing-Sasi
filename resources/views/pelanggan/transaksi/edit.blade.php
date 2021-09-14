@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
<style>
    * {
        margin: 0;
        padding: 0
    }

    html {
        height: 100%
    }

    #grad1 {
        background-color: : #9C27B0;
        background-image: linear-gradient(120deg, #FF4081, #81D4FA)
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #msform fieldset .form-card {
        background: white;
        border: 0 none;
        border-radius: 0px;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        padding: 20px 40px 30px 40px;
        box-sizing: border-box;
        width: 94%;
        margin: 0 3% 20px 3%;
        position: relative
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }

    #msform fieldset .form-card {
        text-align: left;
        color: #9E9E9E
    }

    #msform input,
    #msform textarea {
        padding: 0px 8px 4px 8px;
        border: none;
        border-bottom: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        font-size: 16px;
        letter-spacing: 1px
    }

    #msform input:focus,
    #msform textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: none;
        font-weight: bold;
        border-bottom: 2px solid skyblue;
        outline-width: 0
    }

    #msform .action-button {
        width: 100px;
        background: skyblue;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
    }

    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
    }

    select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px
    }

    select.list-dt:focus {
        border-bottom: 2px solid skyblue
    }

    .card {
        z-index: 0;
        border: none;
        border-radius: 0.5rem;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #2C3E50;
        margin-bottom: 10px;
        font-weight: bold;
        text-align: left
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #000000
    }

    #progressbar li {
        list-style-type: none;
        font-size: 12px;
        width: 25%;
        float: left;
        position: relative
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f023"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f09d"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar #cancel:before {
        font-family: FontAwesome;
        content: "\a83242"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 18px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: skyblue
    }

    .radio-group {
        position: relative;
        margin-bottom: 25px
    }

    .radio {
        display: inline-block;
        width: 204;
        height: 104;
        border-radius: 0;
        background: lightblue;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
        cursor: pointer;
        margin: 8px 2px
    }

    .radio:hover {
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
    }

    .radio.selected {
        box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
    }

    .fit-image {
        width: 100%;
        object-fit: cover
    }
</style>

<div class="container-fluid">
    <p class="mb-4"><a href="{{ route('pelanggan.index') }}">Dashboard</a></p>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Gagal memproses data. Silahkan cek kembali form inputan</strong>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row d-flex d-inline text-center">
                <div class="col">
                    <ul id="progressbar">
                        <li class="{{$transaksi->status == 'menunggu' ? 'active' : '' }}" id="account"><strong>Menunggu</strong></li>
                        <li class="{{$transaksi->status == 'diproses' ? 'active' : '' }}" id="personal"><strong>Diproses</strong></li>
                        <li class="{{$transaksi->status == 'selesai' ? 'active' : '' }}" id="payment"><strong>Selesai</strong></li>
                        <li class="{{$transaksi->status == 'cancel' ? 'active text-danger' : '' }}" id="cancel"><strong>Dicancel</strong></li>
                    </ul> <!-- fieldsets -->
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <div class="row d-flex d-inline">
                <div class="col">
                    <h6 class="font-weight-bold text-primary mb-0">Detail Transaksi</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.transaksi.update',['id' => $transaksi->id]) }}" method="post">
                @csrf
                @method('PUT')
                {{-- <input type="hidden" disabled name="id" value="{{$transaksi->id}}"> --}}
                <div class="form-group">
                    <label for="pelanggan_id">Nama Pelanggan</label>
                    <input type="text" class="form-control @error('pelanggan_id') is-invalid @enderror" id="pelanggan_id" name="pelanggan_id" value="{{ old('pelanggan_id',$transaksi->pelanggan->nama) }}">
                    @error('pelanggan_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tipe">Tipe Kendaraan</label>
                    <input type="text" class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe" value="{{ old('tipe',$transaksi->tipe) }}">
                    @error('tipe')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="plat">Plat Nomor</label>
                    <input type="text" class="form-control @error('plat') is-invalid @enderror" id="plat" name="plat" value="{{ old('plat',$transaksi->plat) }}">
                    @error('plat')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat',$transaksi->alamat) }}</textarea>
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telepon</label>
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{old('no_telp',$transaksi->no_telp)}}">
                    @error('no_telp')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="datetime-local" class="form-control @error('waktu') is-invalid @enderror" id="waktu" name="waktu" value="{{ date('Y-m-d\TH:i', strtotime($transaksi->waktu)) }}">
                    @error('waktu')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="layanan_id">Layanan</label><br>
                    @foreach($layanan as $lay)
                    <input type="checkbox" name="layanan[]" value="{{ $lay->id }}" {{ $selected->contains('layanan_id', $lay->id) ? 'checked' : '' }}>{{ $lay->nama }}
                    <label>{{$lay->nama}}</label> | <label>{{$lay->dari_harga}}</label> - <label>{{$lay->sampai_harga}}</label><br>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="tipe_kendaraan_id">Jenis Kendaraan</label>
                    <select name="tipe_kendaraan_id" id="tipe_kendaraan_id" class="custom-select">
                        <option value="{{ $transaksi->id }}" selected>{{ $transaksi->tipeKendaraan->nama }}</option>
                        @foreach($jenisKendaraan as $jenis)
                            @if($jenis->id == $transaksi->tipe_kendaraan_id)
                                <option value="{{ $jenis->id }}" selected>{{ $jenis->nama }}</option>
                            @else
                                <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('tipe_kendaraan_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                @if($transaksi->alasan)
                <div class="form-group">
                    <label for="alasan">Alasan</label>
                    <textarea type="text" class="form-control @error('alasan') is-invalid @enderror" id="alasan" name="alasan">{{$transaksi->alasan}}</textarea>
                    @error('alasan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                @endif
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a class="btn btn-danger" href="{{ route('pelanggan.transaksi.index') }}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection