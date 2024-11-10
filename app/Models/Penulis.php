<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penulis extends Model
{
    use HasFactory;

    protected $table = 'penulis'; // Nama tabel
    protected $primaryKey = 'penulis_id'; // Primary key bukan 'id'
    public $incrementing = false; // Non-incrementing primary key
    protected $keyType = 'string'; // Tipe primary key
    public $timestamps = false;

    protected $fillable = [
        'penulis_id', 'penulis_nama', 'penulis_tmptlahir', 'penulis_tgllahir',
    ];

    protected static function createPenulis($data)
    {
        return DB::table('penulis')->insert($data);
    }

    protected static function readPenulis()
    {
        return DB::table('penulis')->get();
    }

    protected static function updatePenulis($id, $data)
    {
        return DB::table('penulis')
            ->where('penulis_id', $id)
            ->update($data);
    }

    protected static function readPenulisById($id)
    {
        return DB::table('penulis')->where('penulis_id', $id)->first();
    }

    protected static function deletePenulis($id)
    {
        return DB::table('penulis')->where('penulis_id', $id)->delete();
    }
}
