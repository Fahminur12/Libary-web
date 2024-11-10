@extends('template.layout')

@section('title', 'Dashboard - Siswa Perpustakaan')

@section('header')
    @include('template.navbar_siswa')
@endsection

@section('main')

<div id="layoutSidenav">
    @include('template.sidebar_siswa')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Peminjaman Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Peminjaman Buku</li>
                </ol>
                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-4 form-group">
                            <label for="nama" class="form-label">Nama Peminjam *</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam *</label>
                            <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12 col-md-4 form-group">
                            <label for="tgl_kembali" class="form-label">Tanggal Kembali *</label>
                            <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <select name="buku" id="buku" class="form-control" required>
                                <option value="">-- Pilih Buku --</option>
                                @foreach($buku as $item)
                                    <option value="{{ $item->buku_id }}">{{ $item->buku_judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12 col-md-4 form-group">
                            <button class="btn btn-primary" type="submit">Buat Peminjaman</button>
                            <button class="btn btn-warning">Tambah Buku</button>
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
