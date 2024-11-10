<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{

    public function create (Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'kategori_id' => $id,
            'kategori_nama' => $request->input('kategorinama'),
        ];

        KategoriBuku::createKategoriBuku($data); // Langsung gunakan metode create()

        return redirect()->route('kategori_buku')->with('success', 'Data penerbit berhasil ditambahkan!');
    }

    public function update (Request $request, $id)
{
    $data = [
        'kategori_nama' => $request->input('kategorinama'),
    ];

    KategoriBuku::updateKategoriBuku($id, $data);

    return redirect()->route('kategori_buku')->with('updated', 'Data Kategori berhasil diupdate!');
}

public function delete ($id)
{
    KategoriBuku::deleteKategoriBuku($id);

    return redirect()->route('kategori_buku')->with('deleted', 'Data penerbit berhasil dihapus!');
}

}
