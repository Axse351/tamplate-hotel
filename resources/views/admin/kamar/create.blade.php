 @extends('admin.dashboard')
 @section('content')
     <div class="col-md-12">
         <div class="card">
             <div class="card-header">
                 <div class="card-title">Tambah Data Kamar</div>
             </div>
             <div class="card-body">
                 <form action="{{ route('admin.kamar.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                         <label for="kd_kamar">Kode Kamar</label>
                         <input type="text" class="form-control" id="kd_kamar" name="kd_kamar" maxlength="15"
                             placeholder="Masukkan kode kamar" required>
                     </div>
                     <div class="form-group">
                         <label for="no_kamar">Nomor Kamar</label>
                         <input type="text" class="form-control" id="no_kamar" name="no_kamar" maxlength="5"
                             placeholder="Masukkan nomor kamar" required>
                     </div>
                     <div class="form-group">
                         <label for="jenis">Jenis</label>
                         <input type="text" class="form-control" id="jenis" name="jenis" maxlength="30"
                             placeholder="Masukkan jenis kamar" required>
                     </div>
                     <div class="form-group">
                         <label for="fasilitas">Fasilitas</label>
                         <textarea class="form-control" id="fasilitas" name="fasilitas" rows="4" placeholder="Masukkan fasilitas kamar"
                             required></textarea>
                     </div>
                     <div class="form-group">
                         <label for="harga">Harga</label>
                         <input type="number" class="form-control" id="harga" name="harga"
                             placeholder="Masukkan harga kamar" required>
                     </div>
                     <div class="form-group">
                         <label for="stok">Stok</label>
                         <input type="number" class="form-control" id="stok" name="stok"
                             placeholder="Masukkan stok kamar" required>
                     </div>
                     <div class="form-group">
                         <label for="foto">Foto (URL)</label>
                         <label>Foto </label>
                         <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                     <a href="{{ route('admin.kamar.index') }}" class="btn btn-secondary">Kembali</a>
                 </form>
             </div>
         </div>
     </div>
 @endsection
