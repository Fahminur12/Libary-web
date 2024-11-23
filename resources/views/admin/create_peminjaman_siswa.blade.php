@extends('template.layout')

@section('title', 'Dashboard - Siswa Perpustakaan')

@section('main')

<div id="layoutSidenav">
    <aside class="w-64 bg-white border-r h-screen overflow-hidden flex-shrink-0">
        @include('template.sidebarAdmin')
    </aside>
    <div id="layoutSidenav_content">
        <main>
            <div class="border-b">
                <div class="px-4">
                    <h1 class="mt-[10px] poppins-bold text-2xl">Tambah Peminjaman</h1>
                    <ol class="mb-[7px]">
                        <li class="poppins-medium text-gray-400">Halaman Untuk Mencatat Siswa Yang Meminjam</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid px-4">
                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-4 form-group">
                            <label for="tgl_kembali" class="form-label">Tanggal Kembali *</label>
                            <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam *</label>
                            <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12 col-md-4 form-group">
                            <label for="">Nama Buku</label>
                            <select name="buku" id="buku" class="form-control" required>
                                <option value="">-- Pilih Buku --</option>
                                @foreach($buku as $item)
                                    <option value="{{ $item->buku_id }}">{{ $item->buku_judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label for="">Pilih Pengguna</label>
                            <select name="user" id="user" class="form-control" required>
                                <option value="">-- Pilih User --</option>
                                @foreach($user as $item)
                                    <option value="{{ $item->user_id }}">{{ $item->user_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-12 col-md-4 form-group">
                            <button class="btn btn-primary" type="submit">Pinjam Buku</button>
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
