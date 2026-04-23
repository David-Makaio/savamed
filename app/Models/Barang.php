<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use SoftDeletes; // <--- AND THIS
    protected $table = 'barangs';

    protected $fillable = ['kategori_id', 'nama_barang', 'deskripsi', 'gambar', 'harga', 'expired_at', 'stok'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}