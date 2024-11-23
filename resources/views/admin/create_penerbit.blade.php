@extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')

@section('main')

<div id="layoutSidenav">
    <aside class="w-64 bg-white border-r h-screen overflow-hidden flex-shrink-0">
        @include('template.sidebarAdmin')
    </aside>
    <div id="layoutSidenav_content" class="flex-1 ml-64">
        <main>
            <div class="border-b">
                <div class="px-4">
                    <h1 class="mt-[10px] poppins-bold text-2xl">Tambah Penerbit</h1>
                    <ol class="mb-[7px]">
                        <li class="poppins-medium text-gray-400">Halaman Untuk Tambah Penerbit</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid px-4">
                    <form action="{{ route('action.createpenerbit') }}" class="row my-4 gap-3" method="post">
                        @csrf
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="nama" class="form-label">Nama Penerbit</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama penerbit">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="alamat" class="form-label">Alamat Penerbit</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat penerbit">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="notelp" class="form-label">No Telp Penerbit</label>
                            <input type="number" name="notelp" id="notelp" class="form-control" placeholder="Masukkan notelp penerbit">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="email" class="form-label">Email Penerbit</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email penerbit">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <button class="btn btn-success" type="submit">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
</div>
@endsection
