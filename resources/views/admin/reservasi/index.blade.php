@extends('admin.dashboard')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Daftar Reservasi</div>
            </div>
            <div class="card-body">
                <div class="card-sub">
                    Ini adalah tampilan tabel untuk daftar reservasi :
                </div>
                <a href="{{ route('admin.reservasi.create') }}" class="btn btn-primary mb-3">Tambah Reservasi</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Reservasi</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Kode Kamar</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservasis as $reservasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($reservasi->tgl_reservasi)->format('d-m-Y') }}</td>
                                <td>{{ $reservasi->nm_customer }}</td>
                                <td>{{ $reservasi->kd_kamar }}</td>
                                <td>{{ $reservasi->jumlah }}</td>
                                <td>{{ number_format($reservasi->total, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('admin.reservasi.edit', $reservasi->id_reservasi) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.reservasi.destroy', $reservasi->id_reservasi) }}"
                                        method="POST" class="d-inline">
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
