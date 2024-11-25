@extends('admin.dashboard')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Data Kamar</div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.kamar.update', $kamar->id_kamar) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kd_kamar">Kode Kamar</label>
                        <input type="text" class="form-control" id="kd_kamar" name="kd_kamar" maxlength="15"
                            placeholder="Masukkan kode kamar" value="{{ old('kd_kamar', $kamar->kd_kamar) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="no_kamar">Nomor Kamar</label>
                        <input type="text" class="form-control" id="no_kamar" name="no_kamar" maxlength="5"
                            placeholder="Masukkan nomor kamar" value="{{ old('no_kamar', $kamar->no_kamar) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" maxlength="30"
                            placeholder="Masukkan jenis kamar" value="{{ old('jenis', $kamar->jenis) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fasilitas">Fasilitas</label>
                        <textarea class="form-control" id="fasilitas" name="fasilitas" rows="4" placeholder="Masukkan fasilitas kamar"
                            required>{{ old('fasilitas', $kamar->fasilitas) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga"
                            placeholder="Masukkan harga kamar" value="{{ old('harga', $kamar->harga) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok"
                            placeholder="Masukkan stok kamar" value="{{ old('stok', $kamar->stok) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto (URL)</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        @if ($kamar->foto)
                            <p class="mt-2">Foto saat ini: <br>
                                <img src="{{ url('data_file/' . $kamar->foto) }}" alt="Foto Kamar" width="150">
                            </p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('admin.kamar.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
