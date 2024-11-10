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
            <div class="container-fluid px-4">
                <h1 class="mt-4">Daftar Penulis Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Data Penulis Buku</li>
                </ol>
                <a href="{{ route('action.createpenulis') }}">
                    <button class="btn btn-primary my-3">Tambah Penerbit</button>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nama Penulis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penulis as $penulis)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $penulis->penulis_nama }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('update_penulis', ['penulis_id' => $penulis->penulis_id]) }}">
                                            <button class="btn btn-info btn-sm">Edit</button>
                                        </a>
                                        <form action="{{ route('penulis.delete', ['penulis_id' => $penulis->penulis_id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
