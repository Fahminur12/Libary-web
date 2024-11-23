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
                    <h1 class="mt-[10px] poppins-bold text-2xl"></h1>
                    <ol class="mb-[7px]">
                        <li class="poppins-medium text-gray-400">Page For Create Buku</li>
                    </ol>
                </div>
            </div>
            <div class="container mt-5">
                <form action="{{ route('admin.peminjaman.update-status', ['id' => $peminjaman->peminjaman_id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="peminjaman_id" value="{{ $peminjaman->peminjaman_id }}">

                    <div class="form-group mb-3">
                        <label for="note">Catatan:</label>
                        <textarea id="note" name="note" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fine">Denda:</label>
                        <input type="number" id="fine" name="fine" class="form-control" min="0" step="0.01" placeholder="0.00">
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                    <a href="{{ route('admin.peminjaman') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Peminjaman</a>
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
