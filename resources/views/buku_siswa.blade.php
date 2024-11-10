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
                <h1 class="mt-4">Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Daftar Buku</li>
                </ol>
                <div class="row gap-4">
                    @foreach ($buku as $buku)
                    <div class="card col-12 col-md-4 col-lg-3">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $buku->buku_gambar) }}" alt="{{ $buku->buku_judul }}" class="book-img mx-auto d-block" style="width: 100%; height: auto; max-height: 200px; object-fit: cover;">
                            <hr>
                            <p class="text-center fw-bolder fs-4 my-0">{{ $buku->buku_judul }}</p>
                            <p class="text-center mb-3">Ditulis oleh {{ $buku->penulis->penulis_nama }}</p>
                            <a href="{{ route('peminjaman.createSiswa') }}" class="btn btn-primary d-block mx-auto" type="submit" >Pinjam</a>
                        </div>
                    </div>
                    @endforeach
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
