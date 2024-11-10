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
                <h1 class="mb-4">Daftar Peminjaman Buku</h1>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Peminjam</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
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
                            <td>
                                <form action="{{ route('admin.peminjaman.update-status', $item->peminjaman_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="note" value="">
                                    <input type="hidden" name="fine" value="0">
                                    <button type="submit" class="btn btn-success btn-sm mr-2">Selesai</button>
                                </form>
                                <a href="{{ route('admin.peminjaman.create', ['id' => $item->peminjaman_id]) }}" class="btn btn-info btn-sm">Tambah Catatan/Denda</a>
                            </td>
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
