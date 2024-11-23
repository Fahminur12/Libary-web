@extends('template.layout')

@section('title', 'Dashboard - Siswa Perpustakaan')

@section('main')
<div class="flex">
    <aside class="w-64 bg-white border-r h-screen overflow-hidden flex-shrink-0">
        @include('template.sidebar')
    </aside>
    <div id="" class="w-full flex flex-col min-h-screen">
        <main class="">
            <div class="border-b">
                <div class="px-4">
                    <h1 class="mt-[10px] poppins-bold text-2xl">Dashboard</h1>
                    <ol class="mb-[7px]">
                        <li class="poppins-medium text-gray-400">Halaman Untuk Dashboard Siswa</li>
                    </ol>
                </div>
            </div>
        </main>
        <footer class="py-[22px] bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection
