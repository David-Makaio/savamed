<?php

use function Livewire\Volt\{state, with};
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

state(['search' => '', 'kategori_filter' => '']);

with(
    fn() => [
        'categories' => DB::table('kategoris')->orderBy('nama_kategori')->get(),
        'items' => DB::table('barangs')
            ->join('kategoris', 'barangs.id_kategori', '=', 'kategoris.id')
            ->select('barangs.*', 'kategoris.nama_kategori')
            ->where('barangs.nama_barang', 'like', '%' . $this->search . '%')
            ->when($this->kategori_filter, fn($query) => $query->where('barangs.id_kategori', $this->kategori_filter))
            ->whereNull('barangs.deleted_at')
            ->get(),
    ],
);

$adjustStock = function ($id, $amount) {
    $item = Barang::findOrFail($id);

    // Prevent stock from going below zero
    if ($item->stok + $amount < 0) {
        session()->flash('error', 'Stock cannot be negative!');
        return;
    }

    $item->stok += $amount;
    $item->save(); // This triggers the Observer to log the change

    session()->flash('message', "Stock for {$item->nama_barang} updated.");
};
$delete = function ($id) {
    $item = Barang::findOrFail($id);
    $itemName = $item->nama_barang;
    $item->delete();
    
    session()->flash('message', "Product '{$itemName}' has been deleted successfully.");
};
?>

<div class="py-12">
    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 border border-green-400 rounded-lg text-sm fixed right-8 top-4 shadow-lg z-50 max-w-sm"
            x-data="{ show: true }" 
            x-show="show"
            @load="setTimeout(() => show = false, 4000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-6"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform translate-x-6"
        >
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('message') }}
            </div>
        </div>
    @endif
    
    @if (session()->has('error'))
        <div class="mb-4 p-3 bg-red-100 text-red-800 border border-red-400 rounded-lg text-sm fixed right-8 top-4 shadow-lg z-50 max-w-sm"
            x-data="{ show: true }" 
            x-show="show"
            @load="setTimeout(() => show = false, 4000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-6"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform translate-x-6"
        >
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
        </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Inventaris</h1>
            <a href="{{ route('inventory.create') }}">
                <x-button variant="primary" class="mb-4">
                    Tambah produk baru
                </x-button>
            </a>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 shadow sm:rounded-lg ">

            <div class="mb-4 flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input wire:model.live="search" type="text" placeholder="Cari produk..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-transparent dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-500">
                </div>
                <div class="w-full md:w-1/3">
                    <select wire:model.live="kategori_filter"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-transparent dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">Semua kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                            Product</th>
                        <th class="py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                            Category</th>
                        <th class="py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                            Price</th>
                        <th class="py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                            Stock</th>
                        <th class="pl-6 pr-3 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($items as $item)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="{{ $item->gambar }}"
                                        class="w-10 h-10 rounded-full mr-3 object-cover border">
                                    <span
                                        class="font-medium text-gray-900 dark:text-white">{{ $item->nama_barang }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-teal-100 dark:bg-teal-900 text-teal-800 dark:text-teal-200 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ $item->nama_kategori }} </span>
                            </td>
                            <td class="py-4 text-gray-900 dark:text-white">Rp{{ number_format($item->harga) }}</td>
                            <td class="py-4">
                                <div class="flex items-center justify-around">
                                    <button wire:click="adjustStock({{ $item->id }}, -1)"
                                        class="p-1 rounded-full bg-red-100 text-red-600 hover:bg-red-200 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 12H4"></path>
                                        </svg>
                                    </button>

                                 @if ($item->stok < 10)
                                    <div>
                                    <span class="text-red-600 dark:text-red-400 font-bold text-center block">{{ $item->stok }}</span>
                                    <span class="text-[10px] text-red-500 font-bold uppercase tracking-tighter block text-center">(Low)</span>
                                    </div>
                                @else
                                    <span class="text-gray-900 dark:text-white">{{ $item->stok }}</span>
                                @endif</span>

                                    <button wire:click="adjustStock({{ $item->id }}, 1)"
                                        class="p-1 rounded-full bg-green-100 text-green-600 hover:bg-green-200 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </button>
                                </div>

                            </td>
                            <td class="py-4 pl-6">
                                <a href="{{ route('inventory.edit', $item->id) }}"
                                    class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 font-medium mr-2 inline-block">
                                    <x-icon name="edit"/>
                                </a>
                                <button wire:click="delete({{ $item->id }})"
                                    wire:confirm="Are you sure you want to delete this medicine?"
                                    class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 font-medium">
                                    <x-icon name="delete"/>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                No items found for "{{ $search }}".
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
