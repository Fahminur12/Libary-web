@extends('template.layout')

@section('title', 'Daftar Rak - Admin Perpustakaan')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Daftar Rak</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Daftar Rak</li>
                </ol>
                <a href="{{ route('action.createrak') }}">
                    <button class="btn btn-primary my-3">Tambah Rak</button>
                </a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Rak</th>
                            <th>Nama Rak</th>
                            <th>Lokasi Rak</th>
                            <th>Kapasitas Rak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rak as $rak)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rak->rak_nama }}</td>
                            <td>{{ $rak->rak_lokasi }}</td>
                            <td>{{ $rak->rak_kapasitas }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('update_rak', ['rak_id' => $rak->rak_id]) }}">
                                        <button class="btn btn-info btn-sm">Edit</button>
                                    </a>
                                    <form action="{{ route('rak.delete', ['rak_id' => $rak->rak_id]) }}" method="POST">
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
