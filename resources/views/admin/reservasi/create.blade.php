@extends('admin.dashboard')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Data Reservasi</div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.reservasi.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tgl_reservasi">Tanggal Reservasi</label>
                        <input type="date" class="form-control" id="tgl_reservasi" name="tgl_reservasi" required>
                    </div>
                    <div class="form-group">
                        <label for="nm_customer">Nama Customer</label>
                        <input type="text" class="form-control" id="nm_customer" name="nm_customer" maxlength="40"
                            placeholder="Masukkan nama customer" required>
                    </div>
                    <div class="form-group">
                        <label for="kd_kamar">Kode Kamar</label>
                        <select class="form-control" id="kd_kamar" name="kd_kamar" required>
                            <option value="">Pilih Kamar</option>
                            @foreach ($kamars as $kamar)
                                <option value="{{ $kamar->kd_kamar }}">{{ $kamar->kd_kamar }} - {{ $kamar->no_kamar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Kamar</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah"
                            placeholder="Masukkan jumlah kamar" required>
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" class="form-control" id="total" name="total"
                            placeholder="Masukkan total harga" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.reservasi.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
