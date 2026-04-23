<?php

use function Livewire\Volt\{state, with, rules};
use App\Models\Barang;
use App\Models\Kategori;

state([
    'nama_barang' => '',
    'kategori_id' => '',
    'harga'       => '',
    'stok'        => '',
    'expired_at'  => '',
    'deskripsi'   => '',
    'gambar'      => '',
]);

$save = function () {
    $validated = $this->validate([
        'nama_barang' => 'required|min:3',
        'kategori_id' => 'required|exists:kategoris,id',
        'harga'       => 'required|numeric|min:0',
        'stok'        => 'required|integer|min:0',
        'expired_at'  => 'required|date',
    ]);

    Barang::create($this->all());

    session()->flash('message', 'Medicine added successfully!');
    return redirect()->route('inventory.index');
};

with(fn () => [
    'categories' => Kategori::orderBy('nama_kategori')->get(),
]);

?>

{{-- <x-layouts::app> --}}
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form wire:submit="save" class="bg-white p-8 shadow sm:rounded-lg space-y-6">
                <h2 class="text-2xl font-bold text-gray-800">Add New Medicine</h2>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Medicine Name</label>
                    <input type="text" wire:model="nama_barang" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('nama_barang') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <select wire:model="kategori_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">-- Choose Category --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Price (IDR)</label>
                        <input type="number" wire:model="harga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('harga') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Initial Stock</label>
                        <input type="number" wire:model="stok" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('stok') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Expiry Date</label>
                    <input type="date" wire:model="expired_at" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('expired_at') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition">
                        Save Medicine
                    </button>
                </div>
            </form>
        </div>
    </div>
{{-- </x-layouts::app> --}}
