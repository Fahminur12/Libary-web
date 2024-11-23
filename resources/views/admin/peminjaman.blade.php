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
                <h1 class="mt-[10px] poppins-bold text-2xl">Peminjaman</h1>
                <ol class="mb-[7px]">
                    <li class="poppins-medium text-gray-400">Halaman Untuk Peminjaman</li>
                </ol>
            </div>
            <div class="container mt-3">
                <a href="{{ route('peminjaman.createSiswa') }}" class="btn btn-primary mb-3" type="submit" >Tambah Peminjaman</a>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white bg-[#141313] uppercase poppins-medium">
                            <tr>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">No</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Nama Peminjam</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Judul Buku</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Tanggal Pinjam</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Tanggal Kembali</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Status</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $item)
                                <tr class="bg-white border-b text-[12px] hover:bg-gray-500 poppins-regular">
                                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $item->user->user_nama }}</td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        @foreach($item->peminjamanDetail as $detail)
                                            {{ $detail->buku->buku_judul ?? 'Tidak Diketahui' }}<br>
                                        @endforeach
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $item->peminjaman_tglpinjam }}</td>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $item->peminjaman_tglkembali }}</td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 rounded-lg text-xs font-medium {{ $item->peminjaman_statuskembali ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                            {{ $item->peminjaman_statuskembali ? 'Selesai' : 'Dipinjam' }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap text-right">
                                        <div class="flex items-center gap-2">
                                            <form action="{{ route('admin.peminjaman.update-status', $item->peminjaman_id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="note" value="">
                                                <input type="hidden" name="fine" value="0">
                                                <button type="submit" class="font-medium text-green-600 dark:text-green-500 hover:underline"><i class="fa-solid fa-check"></i></button>
                                            </form>
                                            <a href="{{ route('admin.peminjaman.create', ['id' => $item->peminjaman_id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-file-alt"></i></a>
                                            <form action="{{ route('peminjaman.delete', ['id' => $item->peminjaman_id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></button>
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
