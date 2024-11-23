@extends('template.layout')

@section('title', 'Tambah Rak - Admin Perpustakaan')

@section('main')
<div id="layoutSidenav">
    <aside class="w-64 bg-white border-r h-screen overflow-hidden flex-shrink-0">
        @include('template.sidebarAdmin')
    </aside>
    <div id="layoutSidenav_content">
        <main>
            <div class="border-b">
                <div class="px-4">
                    <h1 class="mt-[10px] poppins-bold text-2xl">Tambah Rak Buku</h1>
                    <ol class="mb-[7px]">
                        <li class="poppins-medium text-gray-400">Halaman Untuk Tambah Rak</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid px-4">
                <form action="{{ route('action.createrak') }}" class="row my-4 gap-3" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="rak_nama" class="form-label">Nama Rak *</label>
                        <input type="text" name="rak_nama" id="rak_nama" class="form-control" placeholder="Masukkan nama rak" required>
                    </div>
                    <div class="form-group">
                        <label for="rak_lokasi" class="form-label">Lokasi Rak *</label>
                        <input type="text" name="rak_lokasi" id="rak_lokasi" class="form-control" placeholder="Masukkan lokasi rak" required>
                    </div>
                    <div class="form-group">
                        <label for="rak_kapasitas" class="form-label">Kapasitas Rak *</label>
                        <input type="number" name="rak_kapasitas" id="rak_kapasitas" class="form-control" placeholder="Masukkan kapasitas rak" required>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
