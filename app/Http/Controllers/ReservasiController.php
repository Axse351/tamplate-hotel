<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Kamar;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Menampilkan semua data reservasi.
     */
    public function index()
    {
        // Ambil semua data reservasi dari database
        $reservasis = Reservasi::all();

        // Kirim data ke view
        return view('admin.reservasi.index', compact('reservasis'));
    }

    /**
     * Menampilkan form untuk menambah data reservasi baru.
     */
    public function create()
    {
        // Menampilkan form untuk menambah data reservasi baru
        $kamars = Kamar::all();

        // Kirim data kamar ke view
        return view('admin.reservasi.create', compact('kamars'));
    }

    /**
     * Menyimpan data reservasi baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data input dari form
        $request->validate([
            'tgl_reservasi' => 'required|date',
            'nm_customer' => 'required|string|max:40',
            'kd_kamar' => 'required|string|max:15',
            'jumlah' => 'required|integer',
            'total' => 'required|numeric',
        ]);

        // Menyimpan data reservasi baru ke database
        Reservasi::create([
            'tgl_reservasi' => $request->tgl_reservasi,
            'nm_customer' => $request->nm_customer,
            'kd_kamar' => $request->kd_kamar,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data reservasi.
     */
    public function edit($id)
    {
        // Mengambil data reservasi berdasarkan ID
        $reservasi = Reservasi::findOrFail($id);

        // Menampilkan form edit dengan membawa data reservasi
        return view('admin.reservasi.edit', compact('reservasi'));
    }

    /**
     * Mengupdate data reservasi.
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'tgl_reservasi' => 'required|date',
            'nm_customer' => 'required|string|max:40',
            'kd_kamar' => 'required|string|max:15',
            'jumlah' => 'required|integer',
            'total' => 'required|numeric',
        ]);

        // Mencari data reservasi berdasarkan ID
        $reservasi = Reservasi::findOrFail($id);

        // Update data reservasi
        $reservasi->update([
            'tgl_reservasi' => $request->tgl_reservasi,
            'nm_customer' => $request->nm_customer,
            'kd_kamar' => $request->kd_kamar,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.reservasi.index')->with('success', 'Data reservasi berhasil diperbarui.');
    }

    /**
     * Menghapus data reservasi.
     */
    public function destroy($id)
    {
        // Mencari data reservasi berdasarkan ID
        $reservasi = Reservasi::findOrFail($id);

        // Menghapus data reservasi
        $reservasi->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.reservasi.index')->with('success', 'Data reservasi berhasil dihapus.');
    }
}
