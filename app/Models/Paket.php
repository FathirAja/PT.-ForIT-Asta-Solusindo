<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = ['layanan_id', 'nama_paket', 'kecepatan', 'harga', 'tipe', 'warna', 'urutan'];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function pesanan()
    {
        return $this->hasMany(PesananPaket::class);
    }
}
