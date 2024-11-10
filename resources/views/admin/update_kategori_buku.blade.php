@extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')

<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Update Kategori Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Update Kategori Buku</li>
                </ol>
                <div class="container mt-5">
                    <div class="card border-info">
                        <div class="card-header bg-info text-white">
                            Update Kategori Buku
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kategori_buku.update', ['id' => $kategori->kategori_id]) }}" class="row my-4 gap-3" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group mb-3">
                                    <label for="kategorinama">Nama Kategori:</label>
                                    <input type="text" id="kategorinama" name="kategorinama" class="form-control" value="{{ $kategori->kategori_nama }}" required>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="index.html" class="btn btn-secondary">Kembali ke Daftar Kategori</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
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
