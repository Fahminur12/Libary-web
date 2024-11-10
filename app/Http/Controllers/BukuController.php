<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\KategoriBuku;
use App\Models\Rak;

class BukuController extends Controller
{
    public function createBuku()
    {
        try {
            $penulis = Penulis::all();
            $penerbit = Penerbit::all();
            $kategori = KategoriBuku::all();
            $rak = Rak::all();

            return view('admin.create_buku', compact('penulis', 'penerbit', 'kategori', 'rak'));
        } catch (\Exception $e) {
            Log::error("Error loading create buku page: " . $e->getMessage());
            return back()->withErrors('Terjadi kesalahan saat memuat halaman tambah buku.');
        }
    }

    public function siswa()
    {
        $buku = Buku::with('penulis')->paginate(9);
        return view('buku_siswa', compact('buku'));
    }


    // CREATE operation
    public function create(Request $request)
    {
        try {
            $id = mt_rand(1000000000000000, 9999999999999999);

            $data = [
                'buku_id' => $id,
                'buku_rak_id' => $request->input('rak_id'),
                'buku_penulis_id' => $request->input('penulis_id'),
                'buku_penerbit_id' => $request->input('penerbit_id'),
                'buku_kategori_id' => $request->input('kategori_id'),
                'buku_judul' => $request->input('judul_buku'),
                'buku_isbn' => $request->input('isbn'),
                'buku_thnterbit' => $request->input('tahun_terbit')
            ];

            if ($request->hasFile('buku_gambar')) {
                $imagePath = $request->file('buku_gambar')->store('images/buku', 'public');
                $data['buku_gambar'] = $imagePath;
            }

            Buku::createBuku($data);

            return redirect()->route('buku')->with('success', 'Data buku berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error("Error creating buku: " . $e->getMessage());
            return back()->withErrors('Terjadi kesalahan saat menambahkan buku.');
        }
    }

    public function update_buku($id)
    {
        try {
            $buku = Buku::findOrFail($id);
            $penulis = Penulis::all();
            $penerbit = Penerbit::all();
            $kategori = KategoriBuku::all();
            $rak = Rak::all();

            return view('admin.update_buku', compact('buku', 'penulis', 'penerbit', 'kategori', 'rak'));
        } catch (\Exception $e) {
            Log::error("Error loading update buku page for ID $id: " . $e->getMessage());
            return back()->withErrors('Terjadi kesalahan saat memuat halaman edit buku.');
        }
    }

    // UPDATE operation
    public function update(Request $request, $id)
    {
        try {
            $data = [
                'buku_id' => $id,
                'buku_rak_id' => $request->input('rak_id'),
                'buku_penulis_id' => $request->input('penulis_id'),
                'buku_penerbit_id' => $request->input('penerbit_id'),
                'buku_kategori_id' => $request->input('kategori_id'),
                'buku_judul' => $request->input('judul_buku'),
                'buku_isbn' => $request->input('isbn'),
                'buku_thnterbit' => $request->input('tahun_terbit'),
            ];

            if ($request->hasFile('buku_gambar')) {
                $imagePath = $request->file('buku_gambar')->store('images/buku', 'public');
                $data['buku_gambar'] = $imagePath;
            }

            Buku::updateBuku($id, $data);

            return redirect()->route('buku')->with('updated', 'Data buku berhasil diupdate!');
        } catch (\Exception $e) {
            Log::error("Error updating buku with ID $id: " . $e->getMessage());
            return back()->withErrors('Terjadi kesalahan saat mengupdate buku.');
        }
    }

    // DELETE operation
    public function delete($id)
    {
        try {
            Buku::deleteBuku($id);

            return redirect()->route('buku')->with('deleted', 'Data buku berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error("Error deleting buku with ID $id: " . $e->getMessage());
            return back()->withErrors('Terjadi kesalahan saat menghapus buku.');
        }
    }

    // READ operation
    public function index()
    {
        try {
            $buku = Buku::readBuku();

            return view('admin.buku', ['buku' => $buku]);
        } catch (\Exception $e) {
            Log::error("Error loading buku list: " . $e->getMessage());
            return back()->withErrors('Terjadi kesalahan saat memuat data buku.');
        }
    }
}
