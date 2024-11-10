<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriBuku extends Model
{
    use HasFactory;

    protected static function createKategoriBuku ($data)
    {
        return self::create($data);
    }

        protected $table = 'kategori';
        protected $primaryKey = 'kategori_id';
        public $incrementing = false;
        public $timestamps = false;
        protected $fillable = [
           'kategori_id',
           'kategori_nama'
        ];

    protected static function readKategori ()
{
    $data = DB::table('kategori')->get();

    return $data;
}

protected static function updateKategoriBuku ($id, $data)
{
    $kategori = DB::table('kategori')->where('kategori_id', $id)->first();

    if ($kategori) {
        DB::table('kategori')->where('kategori_id', $id)->update($data);
        return $kategori;
    }

    return null;
}

    protected static function readKategoriById($id)
    {
        return DB::table('kategori')->where('kategori_id', $id)->first();
    }

    protected static function deleteKategoriBuku($id)
    {
        return DB::table('kategori')->where('kategori_id', $id)->delete();
    }


}
