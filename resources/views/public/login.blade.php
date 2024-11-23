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
                            src="img/bookilustration.png"
                            alt=""
                            class="h-72"
                        />
                    </div>
                    <div class="text-center">
                        <h1 class="text-[26px] poppins-medium font-bold text-black">Selamat Datang Kembali!</h1>
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
                        <h1 class="text-[22px] poppins-bold text-black">Login Atau Membuat Akun</h1>
                        <p class="text-[12px] poppins-medium text-[#767676] mt-2">
                            Start managing your finance faster and better
                        </p>
                    </div>
                    <div class="flex justify-center">
                        <div>
                        <form action="{{ route('user.login') }}" method="post" class="ml-5 mt-4 space-y-5">
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
                            <div>
                                <label for="user_username" class="text-[12px] text-[#767676] poppins-medium">Username</label>
                                <input type="text" name="user_username" id="user_username" class="bg-[#EFF4FF] w-[500px] block mt-2 py-[10px] rounded-lg px-3" placeholder="Masukkan username Anda">
                            </div>
                            <div>
                                <label for="user_password" class="text-[12px] text-[#767676] poppins-medium">Password</label>
                                <input type="password" name="user_password" id="user_password" class="bg-[#EFF4FF] w-[500px] block mt-2 py-[10px] rounded-lg px-3" placeholder="Masukkan password Anda">
                            </div>
                            <div>
                                <button class="py-[10px] text-white bg-[#6C63FE] w-[500px] text-center text-[15px] poppins-medium rounded-lg" type="submit">Login</button>
                            </div>
                            <div class="flex justify-center mt-4">
                                <a href="{{ route('register') }}" class="poppins-regular text-[15px] no-underline text-black hover:no-underline hover:text-black">Don’t have <span class="text-[#157AFF]">an account?</span></a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
