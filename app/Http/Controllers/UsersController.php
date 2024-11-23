<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function register (Request $request)
{
    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
        'user_id' => $id,
        'user_nama' => $request->input('nama'),
        'user_alamat' => $request->input('alamat'),
        'user_username' => $request->input('username'),
        'user_email' => $request->input('email'),
        'user_notelp' => $request->input('notelp'),
        'user_password' => bcrypt($request->input('password'))
    ];

    $user = User::register($data);

    if ($user) {
        return redirect()->route('login')->with('success', 'Pendaftaran akun berhasil!');
    } else {
        return back()->withInput();
    }
}

public function login(Request $request)
{
    $credentials = [
        'user_username' => $request->input('user_username'),
        'user_password' => $request->input('user_password')
    ];

    $user = User::where('user_username', $credentials['user_username'])->first();

    if ($user) {
        if (Hash::check($credentials['user_password'], $user->user_password)) {
            if (is_null($user->user_level) || $user->user_level === '') {
                return back()->withErrors([
                    'message' => 'Akun ini tidak memiliki level. Silakan hubungi admin.',
                ]);
            }

            Auth::login($user);
            Log::info('User ' . $user->user_nama . ' telah login ke dalam aplikasi');

            if ($user->user_level === 'anggota') {
                return redirect()->route('dashboardSiswa');
            } elseif ($user->user_level === 'admin') {
                return redirect()->route('dashboardAdmin'); // Rute untuk dashboard admin
            } else {
                return back()->withErrors([
                    'message' => 'Level pengguna tidak dikenali.',
                ]);
            }
        } else {
            return back()->withErrors([
                'message' => 'Username atau password Anda salah.',
            ]);
        }
    } else {
        return back()->withErrors([
            'message' => 'Username atau password Anda salah.',
        ]);
    }
}

public function upload_profile(Request $request, $id)
{
    if ($request->hasFile('profile')) {
        $data = $request->file('profile');
        $path = $data->store('profile_pictures', 'public'); // Menyimpan gambar ke folder 'public/profile_pictures'

        User::where('user_id', $id)->update(['user_pict_url' => $path]);

        return redirect()->route('pengaturan')->with('success', 'Foto profil berhasil diperbarui!');
    }

    return back()->with('failed', 'Foto profil gagal diperbarui!');
}

public function upload_profile_admin (Request $request, $id)
{
    if ($request->hasFile('profile')) {
        $data = $request->file('profile');
        $path = $data->store('profile_pictures', 'public');

        User::where('user_id', $id)->update(['user_pict_url' => $path]);

        return redirect()->route('pengaturanadmin')->with('success', 'Foto profil berhasil diperbarui!');
    }

    return back()->with('failed', 'Foto profil gagal diperbarui!');
}

public function logout()
{
    Auth::logout();
    return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
}
}
