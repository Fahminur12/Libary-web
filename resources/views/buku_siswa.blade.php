@extends('template.layout')

@section('title', 'Dashboard - Siswa Perpustakaan')


@section('main')

<div id="layoutSidenav">
    <aside class="w-64 bg-white border-r h-screen overflow-hidden flex-shrink-0">
        @include('template.sidebar')
    </aside>
    <div id="layoutSidenav_content">
        <main>
            <div class="border-b">
                <div class="px-4">
                    <h1 class="mt-[10px] poppins-bold text-2xl">Buku</h1>
                    <ol class="mb-[7px]">
                    <li class="poppins-medium text-gray-400">Halaman Data Buku</li>
                </ol>
                </div>
                </div>
                <div class="container-fluid px-4 mt-3">
                    <div class="row gap-4">
                        @foreach ($buku as $buku)
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 col-12 col-md-4 col-lg-3">
                                <img src="{{ asset('storage/' . $buku->buku_gambar) }}" alt="{{ $buku->buku_judul }}" class="rounded-t-lg w-full h-auto max-h-64 object-cover">
                            <div class="p-4">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $buku->buku_judul }}</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ditulis oleh {{ $buku->penulis->penulis_nama }}</p>
                                <a href="{{ route('buku.pinjam', ['buku_id' => $buku['buku_id']]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Pinjam
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
        </main>
        <footer class="py-4 bg-light mt-5">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
