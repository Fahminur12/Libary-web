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
            <div class="container mt-5">
                <h1 class="mb-4">Edit Penulis</h1>
                <div class="container mt-5">
                    <div class="card border-info">
                        <div class="card-header bg-info text-white">
                            Update Penulis
                        </div>
                        <div class="card-body">
                            <form action="{{ route('penulis.update', ['penulis_id' => $penulis->penulis_id]) }}" class="row my-4 gap-3" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" id="authorId" name="authorId" value="1"> <!-- Ganti dengan ID penulis yang sesuai -->
                                <div class="form-group mb-3">
                                    <label for="nama">Nama Penulis:</label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $penulis->penulis_nama }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tempatlahir">Tempat Lahir:</label>
                                    <input type="text" id="tempatlahir" name="tempatlahir" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tanggallahir">Tanggal Lahir:</label>
                                    <input type="date" id="tanggallahir" name="tanggallahir" class="form-control" required>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="" class="btn btn-secondary">Kembali ke Daftar Penulis</a>
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
