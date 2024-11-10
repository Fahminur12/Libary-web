<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rak extends Model
{
    use HasFactory;

    protected $table = 'rak';
    protected $primaryKey = 'rak_id';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        'rak_id',
        'rak_nama',
        'rak_lokasi',
        'rak_kapasitas',
    ];

    protected static function createRak($data)
    {
        return DB::table('rak')->insert($data);
    }

    protected static function readRak()
    {
        return DB::table('rak')->get();
    }

    protected static function updateRak($id, $data)
    {
        return DB::table('rak')
            ->where('rak_id', $id)
            ->update($data);
    }

    protected static function readRakById($id)
    {
        return DB::table('rak')->where('rak_id', $id)->first();
    }

    protected static function deleteRak($id)
    {
        return DB::table('rak')->where('rak_id', $id)->delete();
    }
}
