@extends('layouts.main')
@section('content')

<div class="container-fluid">
    <p class="mb-4"><a href="{{ route('admin.index') }}">Dashboard</a></p>
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
                    <h6 class="font-weight-bold text-primary mb-0">Tipe Kendaraan</h6>
                </div>
                <div class="col text-right">
                    <a href="#" class="font-weight-bold text-primary mb-0" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tipeKendaraan as $key => $lay)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$lay->nama}}</td>
                            <td>
                                <a class="text-warning" href="#" data-toggle="modal" data-target="#edit"
                                data-id="{{ $lay->id }}"
                                data-nama="{{ $lay->nama }}"><i class="fas fa-edit"></i></a>
                                <a class="text-danger" href="#" data-toggle="modal" data-target="#delete"
                                data-id="{{ $lay->id }}"
                                ><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.tipe_kendaraan.store') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title"><span>Tambah</span> Tipe Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.tipe_kendaraan.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title"><span>Ubah</span> Tipe Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.tipe_kendaraan.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="id">
                <div class="modal-header">
                    <h5 class="modal-title"><span>Peringatan</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data Layanan ini ? <br>
                    Data Layanan akan terhapus dengan permanen.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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