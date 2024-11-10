<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PeminjamanDetail;
use App\Http\Requests\SimpanPeminjamanRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    //Siswa
    public function show()
    {
        $peminjaman = Peminjaman::with(['peminjamanDetail.buku', 'user'])->get();
        return view('peminjaman_siswa', compact('peminjaman'));
    }
    public function store(SimpanPeminjamanRequest $request)
{
    $peminjaman_id = Str::random(16);

    $tgl_pinjam = $request->input('tgl_pinjam');
    $tgl_kembali = $request->input('tgl_kembali');

    $peminjamanUserId = Auth::id();
    $bukuId = $request->input('buku');


    $data_peminjaman = [
        'peminjaman_id' => $peminjaman_id,
        'peminjaman_user_id' => $peminjamanUserId,
        'peminjaman_tglpinjam' => $tgl_pinjam,
        'peminjaman_tglkembali' => $tgl_kembali,
    ];

    $data_detail = [
        'peminjaman_detail_peminjaman_id' => $peminjaman_id,
        'peminjaman_detail_buku_id' => $bukuId
    ];


    Peminjaman::create($data_peminjaman);
    PeminjamanDetail::create($data_detail);

    return redirect()->route('peminjaman_siswa')->with('success', 'Peminjaman berhasil ditambahkan!');
}


//Admin
public function admin()
{
    $peminjaman = Peminjaman::with(['peminjamanDetail.buku', 'user'])->get();
    return view('admin.peminjaman', compact('peminjaman'));
}

public function updateStatus(Request $request, $id)
{
    $peminjaman = Peminjaman::findOrFail($id);

    $peminjaman->peminjaman_note = $request->input('note');
    $peminjaman->peminjaman_denda = $request->input('fine');
    $peminjaman->peminjaman_statuskembali = 1;

    $peminjaman->save();

    return redirect()->route('admin.peminjaman')->with('success', 'Peminjaman berhasil diselesaikan!');
}

public function create($id)
{
    $peminjaman = Peminjaman::with(['peminjamanDetail.buku', 'user'])->findOrFail($id);
    return view('admin.create_peminjaman', compact('peminjaman'));
}

public function createSiswa()
{
    $buku = Buku::all();
    return view('create_peminjaman_siswa', compact('buku'));
}

}



