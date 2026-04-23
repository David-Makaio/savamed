<?php

use function Livewire\Volt\{state, with};
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

state(['search' => '', 'kategori_filter' => '']);

with(
    fn() => [
        'categories' => DB::table('kategoris')->orderBy('nama_kategori')->get(),
        'items' => DB::table('barangs')
            ->join('kategoris', 'barangs.kategori_id', '=', 'kategoris.id')
            ->select('barangs.*', 'kategoris.nama_kategori')
            ->where('barangs.nama_barang', 'like', '%' . $this->search . '%')
            ->when($this->kategori_filter, fn($query) => $query->where('barangs.kategori_id', $this->kategori_filter))
            ->get(),
    ],
);

$delete = function ($id) {
    $item = Barang::findOrFail($id);
    $item->delete();
};
?>

{{-- <x-layouts::app :title="__('Inventory')"> --}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow sm:rounded-lg">
            <a href="{{ route('inventory.create') }}"
                class="inline-block mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Add New Medicine
            </a>

            <div class="mb-4 flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input wire:model.live="search" type="text" placeholder="Search medicines..."
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="w-full md:w-1/3">
                    <select wire:model.live="kategori_filter"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stock</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($items as $item)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="{{ $item->gambar }}"
                                        class="w-10 h-10 rounded-full mr-3 object-cover border">
                                    <span class="font-medium text-gray-900">{{ $item->nama_barang }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ $item->nama_kategori }} </span>
                            </td>
                            <td class="px-6 py-4">Rp{{ number_format($item->harga) }}</td>
                            <td class="px-6 py-4">
                                @if ($item->stok < 10)
                                    <span class="text-red-600 font-bold">{{ $item->stok }} (Low)</span>
                                @else
                                    {{ $item->stok }}
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button wire:click="delete({{ $item->id }})"
                                    wire:confirm="Are you sure you want to delete this medicine?"
                                    class="text-red-600 hover:text-red-900 font-medium">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No items found for "{{ $search }}".
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- </x-layouts::app> --}}
