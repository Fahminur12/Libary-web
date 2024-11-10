<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buku extends Model
{
    use HasFactory;

    protected static function createBuku($data)
    {
        return self::create($data);
    }
    protected $table = 'buku';
    protected $primaryKey = 'buku_id';
    protected $fillable = [
        'buku_id', 'buku_rak_id', 'buku_penulis_id',
        'buku_penerbit_id', 'buku_kategori_id', 'buku_judul',
        'buku_isbn', 'buku_thnterbit','buku_gambar'
    ];

    public $timestamps = false;

    // Relation to Rak table

    // Relation to Penulis table
    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'buku_penulis_id');
    }

    // Relation to Penerbit table
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'buku_penerbit_id');
    }

    // Relation to Kategori table
    public function kategori_buku()
    {
        return $this->belongsTo(KategoriBuku::class, 'buku_kategori_id');
    }

    public function rak()
    {
        return $this->belongsTo(rak::class, 'buku_rak_id');
    }

    public static function readBuku()
    {
        return DB::table('buku')
            ->join('penulis', 'buku.buku_penulis_id', '=', 'penulis.penulis_id')
            ->join('penerbit', 'buku.buku_penerbit_id', '=', 'penerbit.penerbit_id')
            ->join('kategori', 'buku.buku_kategori_id', '=', 'kategori.kategori_id')
            ->join('rak', 'buku.buku_rak_id', '=', 'rak.rak_id')
            ->select(
                'buku.*',
                'penulis.penulis_nama',
                'penerbit.penerbit_nama',
                'kategori.kategori_nama',
                'rak.rak_nama',
                'rak.rak_lokasi'
            )
            ->paginate(10);
    }

    protected static function updateBuku ($id, $data)
{
    $buku = DB::table('buku')->where('buku_id', $id)->first();

    if ($buku) {
        DB::table('buku')->where('buku_id', $id)->update($data);
        return $buku;
    }

    return null;
}

protected static function readBukuById ($id)
{
    $buku = DB::table('buku')->where('buku_id', $id)->first();

    return $buku;
}
protected static function deleteBuku ($id)
{
    return DB::table('buku')->where('buku_id', $id)->delete();
}

}

