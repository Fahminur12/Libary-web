@extends('template.layout')

@section('title', 'Login - Web Perpustakaan')

@section('main')
@vite('resources/css/app.css')
    <section>
        <div class="min-h-screen flex">
            <div class="bg-[#EFF4FF] w-[50rem]">
                <div class="space-y-[60px]">
                    <div class="flex items-center justify-center">
                        <img src="img/logo.png" alt="" class="h-6 mt-[30px]" />
                    </div>
                    <div class="flex items-center justify-center">
                        <img
                            src="img/bookmark.png"
                            alt=""
                            class="h-72"
                        />
                    </div>
                    <div class="text-center">
                        <h1 class="text-[26px] poppins-medium font-bold text-black">Buatlah Akun!</h1>
                        <p class="text-[12px] mt-2 poppins-medium text-[#767676]">
                            Start managing your finance faster and better
                            <br />
                            Startmanaging your finance faster and better
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center items-center">
                <div>
                    <div class="flex flex-col items-center text-center mx-auto">
                        <h1 class="text-[22px] poppins-bold text-black">Membuat Sebuah Akun</h1>
                        <p class="text-[12px] poppins-medium text-[#767676] mt-2">
                            Start managing your finance faster and better
                        </p>
                    </div>
                    <div class="flex justify-center">
                        <div>
                        <form action="{{ route('user.register') }}" method="post" class="ml-5 mt-4 space-y-5">
                            @csrf
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @elseif ($errors->has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Gagal!</strong> {{ $errors->first('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="flex space-x-5">
                                <div>
                                    <label for="nama" class="text-[12px] text-[#767676] poppins-medium">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" class="bg-[#EFF4FF] w-[250px] block mt-2 py-[10px] rounded-lg px-3" placeholder="Masukkan Nama Lengkap Anda">
                                </div>
                                <div>
                                    <label for="alamat" class="text-[12px] text-[#767676] poppins-medium">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="bg-[#EFF4FF] w-[250px] block mt-2 py-[10px] rounded-lg px-3" placeholder="Masukkan Alamat Anda">
                                </div>
                            </div>
                            <div class="flex space-x-5">
                                <div>
                                    <label for="username" class="text-[12px] text-[#767676] poppins-medium">Username</label>
                                    <input type="text" name="username" id="username" class="bg-[#EFF4FF] w-[250px] block mt-2 py-[10px] rounded-lg px-3" placeholder="Masukkan username Anda">
                                </div>
                                <div>
                                    <label for="email" class="text-[12px] text-[#767676] poppins-medium">Email</label>
                                    <input type="email" name="email" id="email" class="bg-[#EFF4FF] w-[250px] block mt-2 py-[10px] rounded-lg px-3" placeholder="Masukkan Email Anda">
                                </div>
                            </div>
                            <div class="flex space-x-5">
                                <div>
                                    <label for="notelp" class="text-[12px] text-[#767676] poppins-medium">Nomor Telp</label>
                                    <input type="number" name="notelp" id="user_username" class="bg-[#EFF4FF] w-[250px] block mt-2 py-[10px] rounded-lg px-3" placeholder="Masukkan No Telp Anda">
                                </div>
                                <div>
                                    <label for="password" class="text-[12px] text-[#767676] poppins-medium">Password</label>
                                    <input type="password" name="password" id="password" class="bg-[#EFF4FF] w-[250px] block mt-2 py-[10px] rounded-lg px-3" placeholder="Masukkan password Anda">
                                </div>
                            </div>
                            <div>
                                <button class="py-[10px] text-white bg-[#6C63FE] w-[500px] text-center text-[15px] poppins-medium rounded-lg" type="submit">Register</button>
                            </div>
                            <div class="flex justify-center mt-4">
                                <a href="{{ route('login') }}" class="poppins-regular text-[15px] no-underline text-black hover:no-underline hover:text-black">Already have <span class="text-[#157AFF]">an account?</span></a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
