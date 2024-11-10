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
                <h1 class="mt-4">Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Data Buku</li>
                </ol>
                <a href="{{ route('action.createbuku') }}">
                    <button class="btn btn-primary my-3">Tambah Buku</button>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Penulis Buku</th>
                                <th>Penerbit Buku</th>
                                <th>Tahun Terbit</th>
                                <th>Kategori Buku</th>
                                <th>Rak Buku</th>
                                <th>ISBN</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->buku_judul }}</td>
                                <td>{{ $item->penulis_nama }}</td> <!-- Sesuaikan dengan nama kolom dari hasil query -->
                                <td>{{ $item->penerbit_nama }}</td>
                                <td>{{ $item->buku_thnterbit }}</td>
                                <td>{{ $item->kategori_nama }}</td>
                                <td>{{ $item->rak_nama }}</td>
                                <td>{{ $item->buku_isbn }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('update_buku', ['buku_id' => $item->buku_id]) }}">
                                            <button class="btn btn-info btn-sm">Edit</button>
                                        </a>
                                        <form action="{{ route('buku.delete', ['buku_id' => $item->buku_id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <!-- Tombol Detail -->
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->buku_id }}">
                                            Detail
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Detail Buku -->
                            <div class="modal fade" id="detailModal{{ $item->buku_id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->buku_id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel{{ $item->buku_id }}">Detail Buku: {{ $item->buku_judul }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Judul Buku:</strong> {{ $item->buku_judul }}</p>
                                            <p><strong>Penulis Buku:</strong> {{ $item->penulis_nama }}</p>
                                            <p><strong>Penerbit Buku:</strong> {{ $item->penerbit_nama }}</p>
                                            <p><strong>Tahun Terbit:</strong> {{ $item->buku_thnterbit }}</p>
                                            <p><strong>Kategori Buku:</strong> {{ $item->kategori_nama }}</p>
                                            <p><strong>Rak Buku:</strong> {{ $item->rak_nama }}</p>
                                            <p><strong>ISBN:</strong> {{ $item->buku_isbn }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $buku->links('pagination::bootstrap-5') }}
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
