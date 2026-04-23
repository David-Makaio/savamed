<?php

namespace App\Observers;

use App\Models\Barang;
use App\Models\Histori;
use Illuminate\Support\Facades\Auth;

class BarangObserver
{
    /**
     * Handle the Barang "created" event.
     */
    public function created(Barang $barang): void
    {
        Histori::create([
                'barang_id' => $barang->id,
                'aksi' => 'Initial Entry',
                'perubahan_stok' => $barang->stok,
                'stok_akhir' => $barang->stok,
                'user_name' => Auth::user()?->name ?? 'System',
            ]);
    }

    /**
     * Handle the Barang "updated" event.
     */
    public function updated(Barang $barang): void
    {
        if ($barang->wasChanged('stok')) {
            $oldStok = $barang->getOriginal('stok');
            $newStok = $barang->stok;
            
            Histori::create([
                'barang_id' => $barang->id,
                'aksi' => 'Stock Update',
                'perubahan_stok' => $newStok - $oldStok,
                'stok_akhir' => $newStok,
                'user_name' => Auth::user()?->name ?? 'System',
            ]);
        }
    }

    /**
     * Handle the Barang "deleted" event.
     */
    public function deleted(Barang $barang): void
    {
        \App\Models\Histori::create([
            'barang_id' => $barang->id,
            'aksi' => 'Soft Deleted',
            'perubahan_stok' => 0,
            'stok_akhir' => $barang->stok,
            'user_name' => auth()->user()?->name ?? 'System',
        ]);
    }

    /**
     * Handle the Barang "restored" event.
     */
    public function restored(Barang $barang): void
    {
        //
    }

    /**
     * Handle the Barang "force deleted" event.
     */
    public function forceDeleted(Barang $barang): void
    {
        //
    }
}
