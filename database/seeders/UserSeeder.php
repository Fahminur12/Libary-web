<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_id' => '60029802131',
            'user_nama' => 'Fahmi Nur Yudisyah',
            'user_alamat' => 'Jl. Pakisaji',
            'user_username' => 'Fahmi',
            'user_email' => 'fahmisenp@gmail.com',
            'user_notelp' => '08123456789',
            'user_password' =>  Hash::make('Fahmi123'),
            'user_level' => 'admin',
            'user_pict_url' => null,
        ]);
    }
}
