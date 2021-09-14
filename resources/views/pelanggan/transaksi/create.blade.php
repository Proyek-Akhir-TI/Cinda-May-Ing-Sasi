@extends('layouts.main')
@section('content')

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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex d-inline">
                <div class="col">
                    <h6 class="font-weight-bold text-primary mb-0">Tambah Transaksi</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.transaksi.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="tipe">Tipe Kendaraan</label>
                    <input type="text" class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe" value="{{old('tipe')}}" required>
                    @error('tipe')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="plat">Plat Nomor</label>
                    <input type="text" class="form-control @error('plat') is-invalid @enderror" id="plat" name="plat" value="{{old('plat')}}" required>
                    @error('plat')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required>{{old('alamat')}}</textarea>
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telepon</label>
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{old('no_telp')}}" required>
                    @error('no_telp')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="datetime-local" class="form-control @error('waktu') is-invalid @enderror" id="waktu" name="waktu" value="{{old('waktu')}}" required>
                    @error('waktu')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="layanan_id">Layanan</label><br>
                    @foreach($layanan as $lay)
                    <input type="checkbox" name="layanan[]" value="{{ $lay->id }}">
                    <label>{{$lay->nama}}</label> | <label>{{$lay->dari_harga}}</label> - <label>{{$lay->sampai_harga}}</label><br>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="tipe_kendaraan_id">Jenis Kendaraan</label>
                    <select name="tipe_kendaraan_id" value="{{old('tipe_kendaraan_id')}}" id="tipe_kendaraan_id" class="custom-select" required>
                        <option value="">~ Jenis Kendaraan ~</option>
                        @foreach($jenisKendaraan as $jenis)
                        <option value="{{ $jenis->id }}" {{$jenis->id == old('tipe_kendaraan_id') ? 'selected' : ''}}>{{ $jenis->nama }}</option>
                        @endforeach
                    </select>
                    @error('tipe_kendaraan_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a class="btn btn-danger" href="{{ route('pelanggan.transaksi.index') }}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection