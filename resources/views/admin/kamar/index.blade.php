 @extends('admin.dashboard')
 @section('content')
     <div class="col-md-12">
         <div class="card">
             <div class="card-header">
                 <div class="card-title">Basic Table</div>
             </div>
             <div class="card-body">
                 <div class="card-sub">
                     This is the basic table view of the ready dashboard :
                 </div>
                 <a href="{{ route('admin.kamar.create') }}" class="btn btn-primary mb-3">Tambah Kamar</a>
                 <table class="table mt-3">
                     <thead>
                         <tr>
                             <th scope="col">no</th>
                             <th scope="col">Kode Kamar</th>
                             <th scope="col">Nomor Kamar</th>
                             <th scope="col">Jenis</th>
                             <th scope="col">Harga</th>
                             <th scope="col">Stok</th>
                             <th scope="col">Foto</th>
                             <th scope="col">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($kamars as $kamar)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $kamar->kd_kamar }}</td>
                                 <td>{{ $kamar->no_kamar }}</td>
                                 <td>{{ $kamar->jenis }}</td>
                                 <td>{{ number_format($kamar->harga, 0, ',', '.') }}</td>
                                 <td>{{ $kamar->stok }}</td>
                                 <td><img src="{{ url('/data_file/' . $kamar->foto) }}" width="150px"></td>
                                 <td>
                                     <a href="{{ route('admin.kamar.edit', $kamar->id_kamar) }}"
                                         class="btn btn-warning btn-sm">Edit</a>
                                     <form action="{{ route('admin.kamar.destroy', $kamar->id_kamar) }}" method="POST"
                                         class="d-inline">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" class="btn btn-danger btn-sm"
                                             onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                     </form>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 @endsection
