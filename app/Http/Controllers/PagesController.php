<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;
use App\Models\KategoriBuku;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Penulis;
use App\Models\Rak;

class PagesController extends Controller
{

    public function loginPage () {
        return view('public.login');
  }

  public function registerPage () {
    return view('public.register');
}

public function pengaturan(){
    return view('public.setting',);
  }

  public function pengaturanadmin(){
    return view('admin.setting',);
  }


    public function dashboardAdmin () {
        return view('admin.dashboard', ['level' => 'admin']);
    }

    public function dashboardSiswa () {
        return view('dashboardsiswa', ['level' => 'admin']);
    }

    //Penerbit
    public function createPenerbit () {
        return view('admin.create_penerbit', ['level' => 'admin']);
    }

    public function Penerbit() {
        $data = Penerbit::readPenerbit();

        return view('admin.penerbit', ['level' => 'admin'])->with('penerbit', $data);
    }

    public function update_penerbit ($id) {
        $penerbit = Penerbit::readPenerbitById($id);

        return view('admin.update_penerbit', ['level' => 'admin'])->with('penerbit', $penerbit);
    }

    //Buku
    public function createBuku () {
        return view('admin.create_buku', ['level' => 'admin']);
    }

    public function Buku() {
        $data = Buku::readBuku();

        return view('admin.buku', ['level' => 'admin'])->with('buku', $data);
    }

    public function update_buku ($id) {
        $buku = Buku::readBukuById($id);

        return view('admin.update_buku', ['level' => 'admin'])->with('buku', $buku);
    }

    //Kategori
    public function createKategoriBuku () {
        return view('admin.create_kategori_buku', ['level' => 'admin']);
    }

    public function Kategori() {
        $data = KategoriBuku::readKategori();

        return view('admin.kategori_buku', ['level' => 'admin'])->with('kategori', $data);
    }

    public function update_kategori_buku ($id) {
        $kategori = KategoriBuku::readKategoriById($id);
        return view('admin.update_kategori_buku', ['level' => 'admin'])->with('kategori', $kategori);
    }

    //Penulis
    public function createPenulis () {
        return view('admin.create_penulis', ['level' => 'admin']);
    }

    public function Penulis() {
        $data = Penulis::readPenulis();

        return view('admin.penulis', ['level' => 'admin'])->with('penulis', $data);
    }

    public function update_penulis ($id) {
        $penulis = Penulis::readPenulisById($id);

        return view('admin.update_penulis', ['level' => 'admin'])->with('penulis', $penulis);
    }

    //Rak
    public function createRak () {
        return view('admin.create_rak', ['level' => 'admin']);
    }

    public function Rak() {
        $data = Rak::readRak();

        return view('admin.rak', ['level' => 'admin'])->with('rak', $data);
    }

    public function update_rak ($id) {
     $rak = Rak::readRakById($id);

        return view('admin.update_rak', ['level' => 'admin'])->with('rak', $rak);
    }





}
