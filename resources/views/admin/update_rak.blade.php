@extends('template.layout')

@section('title', 'Edit Rak - Admin Perpustakaan')

@section('main')
<div id="layoutSidenav">
    <aside class="w-64 bg-white border-r h-screen overflow-hidden flex-shrink-0">
        @include('template.sidebarAdmin')
    </aside>
    <div id="layoutSidenav_content">
        <main>
            <div class="border-b">
                <div class="px-4">
                    <h1 class="mt-[10px] poppins-bold text-2xl">Update Rak</h1>
                    <ol class="mb-[7px]">
                        <li class="poppins-medium text-gray-400">Halaman Untuk Update Rak</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid px-4">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Edit Data Rak</li>
                </ol>
                <form action="{{ route('rak.update', ['rak_id' => $rak->rak_id]) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="rak_nama" class="form-label">Nama Rak *</label>
                        <input type="text" name="rak_nama" id="rak_nama" class="form-control" value="{{ $rak->rak_nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="rak_lokasi" class="form-label">Lokasi Rak *</label>
                        <input type="text" name="rak_lokasi" id="rak_lokasi" class="form-control" value="{{ $rak->rak_lokasi }}" required>
                    </div>
                    <div class="form-group">
                        <label for="rak_kapasitas" class="form-label">Kapasitas Rak *</label>
                        <input type="number" name="rak_kapasitas" id="rak_kapasitas" class="form-control" value="{{ $rak->rak_kapasitas }}" required>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
