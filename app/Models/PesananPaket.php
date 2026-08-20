<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananPaket extends Model
{
    protected $fillable = ['paket_id', 'nama', 'email', 'telepon', 'alamat', 'catatan', 'status'];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
