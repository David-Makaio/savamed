<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['kategori_id', 'nama_barang', 'harga', 'expired_at', 'stok'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function historis()
    {
        return $this->hasMany(Histori::class);
    }
}
