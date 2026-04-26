<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use SoftDeletes; // <--- AND THIS
    protected $table = 'barangs';

    protected $fillable = ['id_kategori', 'nama_barang', 'id_apotek', 'deskripsi', 'gambar', 'harga', 'expired_at', 'stok'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function historis()
    {
        return $this->hasMany(Histori::class, 'barang_id');
    }
}