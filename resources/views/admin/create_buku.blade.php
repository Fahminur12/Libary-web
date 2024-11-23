@extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')

@section('main')

<div id="layoutSidenav">
    <aside class="w-64 bg-white border-r h-screen overflow-hidden flex-shrink-0">
        @include('template.sidebarAdmin')
    </aside>
<div id="layoutSidenav_content">
    <main>
        <div class="border-b">
            <div class="px-4">
                <h1 class="mt-[10px] poppins-bold text-2xl">Tambah Buku</h1>
                <ol class="mb-[7px]">
                    <li class="poppins-medium text-gray-400">Halaman Untuk Tambah Buku</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid px-4">
            <form action="{{ route('action.createbuku') }}" class="row my-4 gap-3" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row gap-3">
                    <div class="col-12 col-md-4 form-group">
                        <label for="judul_buku" class="form-label">Judul Buku *</label>
                        <input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Masukkan judul buku">
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label for="penulis_id" class="form-label">Penulis Buku *</label>
                        <select name="penulis_id" id="penulis_id" class="form-control">
                            <option selected>-Pilih Penulis Buku-</option>
                            @foreach($penulis as $p)
                                <option value="{{ $p->penulis_id }}">{{ $p->penulis_nama }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label for="penerbit_id" class="form-label">Penerbit Buku *</label>
                        <select name="penerbit_id" id="penerbit_id" class="form-control">
                            <option selected>-Pilih Penerbit Buku-</option>
                            @foreach($penerbit as $nerbit)
                                <option value="{{ $nerbit->penerbit_id }}">{{ $nerbit->penerbit_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit *</label>
                        <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="Masukkan tahun terbit">
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label for="kategori_id" class="form-label">Kategori Buku *</label>
                        <select name="kategori_id" id="kategori_id" class="form-control">
                            <option selected>-Pilih Kategori Buku-</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->kategori_id }}">{{ $k->kategori_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label for="rak_id" class="form-label">Rak Buku *</label>
                        <select name="rak_id" id="rak_id" class="form-control">
                            <option selected>-Pilih Rak Buku</option>
                            @foreach($rak as $r)
                                <option value="{{ $r->rak_id }}">{{ $r->rak_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label for="isbn" class="form-label">Nomor ISBN *</label>
                        <input type="text" name="isbn" id="isbn" class="form-control" placeholder="Masukkan nomor ISBN">
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label for="gambar_buku" class="form-label">Gambar Buku *</label>
                        <input type="file" name="buku_gambar" id="buku_gambar" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12 col-md-4">
                        <button class="btn btn-primary">Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
            </div>
        </div>
    </footer>
</div>
</div>
@endsection
