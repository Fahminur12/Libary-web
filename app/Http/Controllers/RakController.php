<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999); // Membuat ID random

        $data = [
            'rak_id' => $id,
            'rak_nama' => $request->input('rak_nama'),
            'rak_lokasi' => $request->input('rak_lokasi'),
            'rak_kapasitas' => $request->input('rak_kapasitas'),
        ];

       
        Rak::createRak($data);

        return redirect()->route('rak')->with('success', 'Data penulis berhasil ditambahkan!');
    }




    public function update (Request $request, $id)
{
    $data = [
        'rak_id' => $id,
        'rak_nama' => $request->input('rak_nama'),
        'rak_lokasi' => $request->input('rak_lokasi'),
        'rak_kapasitas' => $request->input('rak_kapasitas'),
    ];

    Rak::updateRak($id, $data);

    return redirect()->route('rak')->with('updated', 'Data penerbit berhasil diupdate!');
}

public function delete ($id)
{
    Rak::deleteRak($id);

    return redirect()->route('rak')->with('deleted', 'Data penerbit berhasil dihapus!');
}
}
