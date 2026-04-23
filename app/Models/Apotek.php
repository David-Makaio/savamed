<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apotek extends Model
{
    protected $fillable = [
        'nama',
        'nomor_lisensi',
        'terverifikasi',
    ];

     public function users()
    {
        return $this->hasMany(User::class);
    }
}