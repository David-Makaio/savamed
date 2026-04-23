<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    protected $table = 'historis';

    protected $fillable = [
        'barang_id',
        'aksi',
        'perubahan_stok',
        'stok_akhir',
        'user_name'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
