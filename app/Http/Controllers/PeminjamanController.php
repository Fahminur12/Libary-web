<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PeminjamanDetail;
use App\Http\Requests\SimpanPeminjamanRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    //Siswa
    public function show()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $peminjaman = Peminjaman::with(['peminjamanDetail.buku', 'user'])
                                ->where('peminjaman_user_id', $user->user_id) // Filter berdasarkan user yang sedang login
                                ->get();
        $this->hitungDenda($peminjaman);
        return view('peminjaman_siswa', compact('peminjaman'));
    }
    public function store(SimpanPeminjamanRequest $request)
{
    $peminjaman_id = Str::random(16);

    $tgl_pinjam = $request->input('tgl_pinjam');
    $tgl_kembali = $request->input('tgl_kembali');

    $peminjamanUserId =  $request->input('user');
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

    return redirect()->route('admin.peminjaman')->with('success', 'Peminjaman berhasil ditambahkan!');
}


//Admin
public function admin()
{
    $peminjaman = Peminjaman::with(['peminjamanDetail.buku', 'user'])->get();
    $this->hitungDenda($peminjaman);
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

public function pinjam($buku_id)
{
    $user = Auth::user();


    $buku = Buku::find($buku_id);


    $peminjaman = new Peminjaman();
    $peminjaman->peminjaman_id = Str::random(16);
    $peminjaman->peminjaman_user_id = $user->user_id;
    $peminjaman->peminjaman_tglpinjam = now();
    $peminjaman->peminjaman_tglkembali = now()->addWeek();
    $peminjaman->peminjaman_statuskembali = '0';
    $peminjaman->save();

    $peminjamanDetail = new PeminjamanDetail();
    $peminjamanDetail->peminjaman_detail_peminjaman_id = $peminjaman->peminjaman_id;
    $peminjamanDetail->peminjaman_detail_buku_id = $buku_id;
    $peminjamanDetail->save();

    $buku->save();

    return redirect()->route('peminjaman_siswa')->with('success', 'Buku berhasil dipinjam.');
}

public function hitungDenda($peminjaman)
{
    $now = now(); // Waktu saat ini
    foreach ($peminjaman as $pinjam) {
        if ($pinjam->peminjaman_statuskembali == 0) { // Hanya hitung jika status "Dipinjam"
            $tglKembali = Carbon::parse($pinjam->peminjaman_tglkembali);

            if ($now->greaterThan($tglKembali)) { // Jika sudah lewat tanggal kembali
                $selisihMinggu = $tglKembali->diffInWeeks($now); // Hitung selisih minggu
                $pinjam->peminjaman_denda = $selisihMinggu * 500; // Denda Rp 500 per minggu
            } else {
                $pinjam->peminjaman_denda = 0; // Tidak ada denda jika belum lewat
            }

            $pinjam->save(); // Simpan perubahan
        }
    }
}



public function create($id)
{
    $peminjaman = Peminjaman::with(['peminjamanDetail.buku', 'user'])->findOrFail($id);
    return view('admin.create_peminjaman', compact('peminjaman'));
}

public function createSiswa()
{
    $buku = Buku::all();
    $user = User::all();
    return view('admin.create_peminjaman_siswa', compact('buku','user'));
}


public function delete($id)
{
    Peminjaman::deletePeminjaman($id);

    return redirect()->route('admin.peminjaman')->with('deleted', 'Data peminjaman berhasil dihapus!');
}



}



