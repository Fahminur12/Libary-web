<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex">
        <div>
            <div class="w-64 h-screen bg-white border-r fixed">
            <div>
                <div class="p-4 border-b flex space-x-3">
                    <img src="img/subway_book.png" class="h-6">
                    <h1 class="poppins-semibold text-sm mt-[2px] justify-center text-black">E-Book Self</h1>
                </div>
            </div>
            <div class="flex flex-col space-y-[24px] py-3 text-[#767676] hover:text-[#] poppins-medium text-sm">
                <a class="flex ml-5" href="{{ route('dashboardAdmin') }}">
                    <div class="mr-3 "><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="flex ml-5" href="{{ route('buku') }}">
                    <div class="mr-3 sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Buku
                </a>
                <a class="flex ml-5" href="{{ route('rak') }}">
                    <div class="mr-3 sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Rak
                </a>
                <a class="flex ml-5" href="{{ route('kategori_buku') }}">
                    <div class="mr-3 sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Kategori Buku
                </a>
                <a class="flex ml-5" href="{{ route('penulis') }}">
                    <div class="mr-3 sb-nav-link-icon"><i class="fas fa-pencil"></i></div>
                    Penulis
                </a>
                <a class="flex ml-5" href="{{ route('penerbit') }}">
                    <div class="mr-3 sb-nav-link-icon"><i class="fas fa-house"></i></div>
                    Penerbit
                </a>
                <a class="flex ml-5" href="{{ route('admin.peminjaman') }}">
                    <div class="mr-3 sb-nav-link-icon"><i class="fas fa-hand"></i></div>
                    Peminjaman
                </a>
            </div>
            <div class="flex flex-col space-y-[20px] py-1  text-[#767676] poppins-medium text-sm">
                <div class="border-t"></div>
                <a class="flex ml-5" href="{{ route('pengaturanadmin') }}">
                    <div class="mr-3 sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                    Pengaturan
                </a>

                <a class="flex ml-5" href="{{ route('logout') }}">
                    <div class="mr-3 sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>
                    Logout
                </a>
            </div>
            <div class="flex py-3 mt-6 bg-[#f7f9fb] border-t ">
                <div class="ml-3">
                    @if (Auth::user()->user_pict_url === '')
                        <img src="{{ asset('img/placeholder.png') }}" alt="..." class="rounded-full h-[50px] w-[50px]  object-cover">
                    @else
                        <img src="{{ asset('storage/profile_pictures/' . basename(Auth::user()->user_pict_url)) }}" alt="..." class="rounded-full h-[50px] w-[50px] object-cover">
                    @endif
                </div>
                <div class="ml-2">
                    <h1 class="text-lg">{{ Auth::user()->user_nama }}</h1>
                    <p class=" text-sm">Admin</p>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
