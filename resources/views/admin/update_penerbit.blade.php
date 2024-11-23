@extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')

<div id="layoutSidenav">
    <aside class="w-64 bg-white border-r h-screen overflow-hidden flex-shrink-0">
        @include('template.sidebarAdmin')
    </aside>
    <div id="layoutSidenav_content">
        <main>
            <div class="border-b">
                <div class="px-4">
                    <h1 class="mt-[10px] poppins-bold text-2xl">Update Penerbit</h1>
                    <ol class="mb-[7px]">
                        <li class="poppins-medium text-gray-400">Halaman Untuk Update Penerbit</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid px-4">
                <form action="{{ route('penerbit.update', ['penerbit_id' => $penerbit->penerbit_id]) }}" class="row my-4 gap-3" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="nama" class="form-label">Nama Penerbit</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama penerbit" value="{{ $penerbit->penerbit_nama }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="alamat" class="form-label">Alamat Penerbit</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat penerbit" value="{{ $penerbit->penerbit_alamat }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="notelp" class="form-label">No Telp Penerbit</label>
                        <input type="number" name="notelp" id="notelp" class="form-control" placeholder="Masukkan notelp penerbit">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="email" class="form-label">Email Penerbit</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email penerbit" value="{{ $penerbit->penerbit_email }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <button class="btn btn-success" type="submit">Tambahkan</button>
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

