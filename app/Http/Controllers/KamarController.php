<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class KamarController extends Controller
{
    /**
     * Tampilkan semua data kamar.
     */
    public function index()
    {
        $kamars = Kamar::all(); // Mengambil semua data kamar
        return view('admin.kamar.index', compact('kamars')); // Mengirim data ke view
    }

    /**
     * Menampilkan form untuk menambah data kamar baru.
     */
    public function create()
    {
        return view('admin.kamar.create');
    }

    /**
     * Menyimpan data kamar baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'kd_kamar' => 'required|string|max:15',
            'no_kamar' => 'required|string|max:5',
            'jenis' => 'required|string|max:30',
            'fasilitas' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Bisa diisi dengan path file
        ]);
        $nama_file = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();

            $tujuan_upload = 'data_file';
            $file->move(public_path($tujuan_upload), $nama_file);
        }

        // Simpan data
        Kamar::create([
            'kd_kamar' => $request->kd_kamar,
            'no_kamar' => $request->no_kamar,
            'jenis' => $request->jenis,
            'fasilitas' => $request->fasilitas,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $nama_file,
        ]);

        return redirect()->route('admin.kamar.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data kamar.
     */
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id); // Mengambil data berdasarkan ID
        return view('admin.kamar.edit', compact('kamar')); // Mengirim data ke view edit
    }

    /**
     * Mengupdate data kamar.
     */
    public function update(Request $request, $id_kamar)
    {
        // Temukan kamar berdasarkan ID
        $kamar = Kamar::findOrFail($id_kamar);

        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'kd_kamar' => 'required|max:15',
            'no_kamar' => 'required|max:5',
            'jenis' => 'required|max:30',
            'fasilitas' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Validasi foto
        ]);

        // Jika ada file foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Simpan foto baru di folder data_file
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('data_file'), $nama_file);

            // Hapus foto lama jika ada dan jika file tersebut ada di folder
            if ($kamar->foto && file_exists(public_path('data_file/' . $kamar->foto))) {
                unlink(public_path('data_file/' . $kamar->foto)); // Menghapus foto lama
            }

            // Update nama file foto di database
            $validated['foto'] = $nama_file;
        }

        // Update data kamar dengan data yang sudah divalidasi
        $kamar->update($validated);

        return redirect()->route('admin.kamar.index')->with('success', 'Data kamar berhasil diperbarui.');
    }



    /**
     * Menghapus data kamar.
     */
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('admin.kamar.index')->with('success', 'Kamar berhasil dihapus.');
    }
}
