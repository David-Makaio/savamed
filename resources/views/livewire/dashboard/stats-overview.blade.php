<?php

use function Livewire\Volt\{state, with};
use App\Models\Barang;
use Carbon\Carbon;

with(fn () => [
    'totalItems'     => Barang::count(),
    'lowStockCount'  => Barang::where('stok', '<', 10)->count(),
    'nearExpired'    => Barang::whereBetween('expired_at', [
                            now(), 
                            now()->addDays(30)
                        ])->count(),
    'outOfStock'     => Barang::where('stok', 0)->count(),
]);

?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
        <div class="text-sm font-medium text-gray-500 uppercase">Total Medicines</div>
        <div class="mt-1 text-3xl font-semibold text-gray-900">{{ $totalItems }}</div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-yellow-500">
        <div class="text-sm font-medium text-gray-500 uppercase">Low Stock (< 10)</div>
        <div class="mt-1 text-3xl font-semibold text-gray-900">{{ $lowStockCount }}</div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-orange-500">
        <div class="text-sm font-medium text-gray-500 uppercase">Expiring Soon (30 days)</div>
        <div class="mt-1 text-3xl font-semibold text-gray-900">{{ $nearExpired }}</div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-red-500">
        <div class="text-sm font-medium text-gray-500 uppercase">Out of Stock</div>
        <div class="mt-1 text-3xl font-semibold text-gray-900">{{ $outOfStock }}</div>
    </div>
</div>