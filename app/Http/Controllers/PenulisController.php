<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999); // Membuat ID random

        $data = [
            'penulis_id' => $id,
            'penulis_nama' => $request->input('nama'),
            'penulis_tmptlahir' => $request->input('tempatlahir'),
            'penulis_tgllahir' => $request->input('tanggallahir'),
        ];

        // Memanggil metode createPenulis
        Penulis::createPenulis($data);

        return redirect()->route('penulis')->with('success', 'Data penulis berhasil ditambahkan!');
    }


    public function update (Request $request, $id)
{
    $data = [
        'penulis_id' => $id,
        'penulis_nama' => $request->input('nama'),
        'penulis_tmptlahir' => $request->input('tempatlahir'),
        'penulis_tgllahir' => $request->input('tanggallahir'),
    ];

    Penulis::updatePenulis($id, $data);

    return redirect()->route('penulis')->with('updated', 'Data penerbit berhasil diupdate!');
}

public function delete ($id)
{
    Penulis::deletePenulis($id);

    return redirect()->route('penulis')->with('deleted', 'Data penerbit berhasil dihapus!');
}
}
