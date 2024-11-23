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
                <h1 class="mt-[10px] poppins-bold text-2xl">Penerbit</h1>
                <ol class="mb-[7px]">
                    <li class="poppins-medium text-gray-400">Halaman Untuk Penerbit</li>
                </ol>
            </div>
            <div class="container mt-3">
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


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-white bg-[#141313] uppercase font-medium">
            <tr>
                <th scope="col" class="px-3 py-3 whitespace-nowrap">No</th>
                <th scope="col" class="px-3 py-3 whitespace-nowrap">Nama Penerbit</th>
                <th scope="col" class="px-3 py-3 whitespace-nowrap">Alamat Penerbit</th>
                <th scope="col" class="px-3 py-3 whitespace-nowrap">No Telp Penerbit</th>
                <th scope="col" class="px-3 py-3 whitespace-nowrap">Email Penerbit</th>
                <th scope="col" class="px-3 py-3 whitespace-nowrap">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penerbit as $penerbit)
                <tr class="bg-white border-b text-[12px] hover:bg-gray-100">
                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-3 py-4">{{ $penerbit->penerbit_nama }}</td>
                    <td class="px-3 py-4">{{ $penerbit->penerbit_alamat }}</td>
                    <td class="px-3 py-4">{{ $penerbit->penerbit_notelp }}</td>
                    <td class="px-3 py-4">{{ $penerbit->penerbit_email }}</td>
                    <td class="px-3 py-4 whitespace-nowrap text-right">
                        <div class="flex items-center gap-2">
                            <!-- Edit Icon -->
                            <a href="{{ route('update_penerbit', ['penerbit_id' => $penerbit->penerbit_id]) }}">
                                <button class="px-4 py-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                            <!-- Delete Icon -->
                            <form action="{{ route('penerbit.delete', ['penerbit_id' => $penerbit->penerbit_id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
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
