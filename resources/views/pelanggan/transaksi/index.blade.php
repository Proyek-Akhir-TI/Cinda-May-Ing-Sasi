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
                    <h6 class="font-weight-bold text-primary mb-0">Reservasi</h6>
                </div>
                <div class="col text-right">
                    <a href="{{route('pelanggan.transaksi.create')}}" class="font-weight-bold text-primary mb-0"><i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th>Jenis Kendaraan</th>
                            <th>Tipe Kendaraan</th>
                            <th>Plat Nomor</th>
                            <th>Layanan</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $key => $tran)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$tran->pelanggan->nama}}</td>
                            <td>{{$tran->pelanggan->alamat}}</td>
                            <td>{{$tran->pelanggan->no_telp}}</td>
                            <td>{{$tran->tipeKendaraan->nama}}</td>
                            <td>{{$tran->tipe}}</td>
                            <td>{{$tran->plat}}</td>
                            <td>
                                @forelse ($tran->layanan as $value)
                                    {{ $value->nama }}, <br>
                                @empty                    
                                @endforelse
                            </td>
                            <td>{{$tran->waktu}}</td>
                            <td>
                                @if($tran->status == 'menunggu')
                                <div class="badge badge-warning">Menunggu</div>
                                @elseif($tran->status == 'diproses')
                                <div class="badge badge-info">Diproses</div>
                                @elseif($tran->status == 'cancel')
                                <div class="badge badge-danger">Dicancel</div>
                                @else
                                <div class="badge badge-success">Selesai</div>
                                @endif
                            </td>
                            <td>
                                <a class="text-warning" href="{{route('pelanggan.transaksi.edit', $tran->id)}}"><i class="fas fa-eye"></i></a>
                                <a class="text-danger" href="#" data-toggle="modal" data-target="#delete" data-id="{{ $tran->id }}"><i class="fas fa-window-close"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('pelanggan.transaksi.delete') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id" id="id">
                <div class="modal-header">
                    <h5 class="modal-title"><span>Peringatan</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin membatalkan atau cancel transaksi ini ? <br>
                    <!-- Data transaksi akan terhapus dengan permanen. -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('#edit').on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        var nama = $(e.relatedTarget).data('nama');

        $('#edit').find('input[name="id"]').val(id);
        $('#edit').find('input[name="nama"]').val(nama);
    });
    $('#delete').on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        console.log(id);
        $('#delete').find('input[name="id"]').val(id);
    });
</script>
@endpush