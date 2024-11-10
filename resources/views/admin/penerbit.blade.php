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
                <h1 class="mb-4">Daftar Penerbit</h1>
                <a href="{{ route('action.createpenerbit') }}">
                    <button class="btn btn-primary my-3">Tambah Penerbit</button>
                </a>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session('deleted'))
          <div class="alert alert-info alert-dismissible fade show" role="alert">
              <strong>Berhasil!</strong> {{ session('deleted') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
@elseif (session('updated'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ session('updated') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


                <table class="table table-bordered table-striped">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Penerbit</th>
                            <th>Alamat Penerbit</th>
                            <th>No Telp Penerbit</th>
                            <th>Email Penerbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerbit as $penerbit)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penerbit->penerbit_nama }}</td>
                            <td>{{ $penerbit->penerbit_alamat }}</td>
                            <td>{{ $penerbit->penerbit_notelp }}</td>
                            <td>{{ $penerbit->penerbit_email }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('update_penerbit', ['penerbit_id' => $penerbit->penerbit_id]) }}">
                                        <button class="btn btn-info btn-sm">Edit</button>
                                    </a>
                                    <form action="{{ route('penerbit.delete', ['penerbit_id' => $penerbit->penerbit_id]) }}" method="POST">
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
