<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'icon'];

    public function pakets()
    {
        return $this->hasMany(Paket::class);
    }
}
