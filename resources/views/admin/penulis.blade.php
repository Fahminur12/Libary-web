@extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')

@section('main')

<div id="layoutSidenav">
    <aside class="w-64 bg-white border-r h-screen overflow-hidden flex-shrink-0">
        @include('template.sidebarAdmin')
    </aside>
    <div id="layoutSidenav_content">
        <main>
            <div class="px-4 border-b">
                <h1 class="mt-[10px] poppins-bold text-2xl">Penulis</h1>
                <ol class="mb-[7px]">
                    <li class="poppins-medium text-gray-400">Halaman Untuk Penulis</li>
                </ol>
            </div>
            <div class="container-fluid px-4">
                <a href="{{ route('action.createpenulis') }}">
                    <button class="btn btn-primary my-3">Tambah Penulis</button>
                </a>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white bg-[#141313] uppercase font-medium">
                            <tr>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">No</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Nama Penulis</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penulis as $penulis)
                                <tr class="bg-white border-b text-[12px] hover:bg-gray-100">
                                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $penulis->penulis_nama }}</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-right">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('update_penulis', ['penulis_id' => $penulis->penulis_id]) }}">
                                                <button class="px-4 py-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"><i class="fa-solid fa-pencil"></i></button>
                                            </a>
                                            <form action="{{ route('penulis.delete', ['penulis_id' => $penulis->penulis_id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"><i class="fa-solid fa-trash"></i></button>
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
