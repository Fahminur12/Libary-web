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
            <div class="container mt-5">
                <h1 class="mb-4">Daftar Peminjaman Buku</h1>
                <a href="{{ route('peminjaman.createSiswa') }}" class="btn btn-primary mb-3" type="submit" >Pinjam</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Peminjam</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peminjaman as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->user_nama }}</td>
                                <td>
                                    @foreach($item->peminjamanDetail as $detail)
                                        {{ $detail->buku->buku_judul ?? 'Tidak Diketahui' }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $item->peminjaman_tglpinjam }}</td>
                                <td>{{ $item->peminjaman_tglkembali }}</td>
                                <td class=" {{ $item->peminjaman_statuskembali ? 'bg-success' : 'bg-warning' }}">{{ $item->peminjaman_statuskembali ? 'Selesai' : 'Dipinjam' }}</td>
                                <td>{{ $item->peminjaman_denda ? 'Rp ' . number_format($item->peminjaman_denda, 2) : '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
