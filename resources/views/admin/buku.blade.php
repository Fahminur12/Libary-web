@extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')



@section('main')
<div id="layoutSidenav">
    <aside class="w-64 bg-white border-r h-screen overflow-hidden flex-shrink-0">
        @include('template.sidebarAdmin')
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
            <div class="px-4">
                <a href="{{ route('action.createbuku') }}">
                    <button class="btn btn-primary my-3">Tambah Buku</button>
                </a>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full">
                        <thead class="bg-gray-50 text-white">
                            <tr class="text-[13px] poppins-medium bg-[#141313]">
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">No</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Judul Buku</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Penulis Buku</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Penerbit Buku</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Tahun Terbit</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Kategori Buku</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">Rak Buku</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap">ISBN</th>
                                <th scope="col" class="px-3 py-3 whitespace-nowrap text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $item)
                                <tr class="bg-white border-b text-[12px] hover:bg-gray-500 poppins-regular">
                                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $item->buku_judul }}</td>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $item->penulis_nama }}</td>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $item->penerbit_nama }}</td>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $item->buku_thnterbit }}</td>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $item->kategori_nama }}</td>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $item->rak_nama }}</td>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $item->buku_isbn }}</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-right">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('update_buku', ['buku_id' => $item->buku_id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-pencil"></i></a>
                                            <form action="{{ route('buku.delete', ['buku_id' => $item->buku_id]) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                            <button class="font-medium text-gray-600 dark:text-gray-400 hover:underline" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->buku_id }}"><i class="fa-solid fa-eye"></i></button>
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
