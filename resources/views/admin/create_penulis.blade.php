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
                    <h1 class="mt-[10px] poppins-bold text-2xl">Tambah Penulis</h1>
                    <ol class="mb-[7px]">
                        <li class="poppins-medium text-gray-400">Halaman Untuk Tambah Penulis</li>
                    </ol>
                </div>
            </div>
            <div class="container mt-5">
                <div class="container mt-5">
                    <div class="card border-info">
                        <div class="card-header bg-info text-white">
                            Tambah Penulis
                        </div>
                        <div class="card-body">
                            <form action="{{ route('action.createpenulis') }}" class="row my-4 gap-3" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="nama">Nama Penulis:</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required>
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
