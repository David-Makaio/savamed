<?php

use function Livewire\Volt\{state, with, rules, usesFileUploads};
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Validation\Rule;

usesFileUploads();

state([
    'barang' => null,
    'nama_barang' => '',
    'id_kategori' => '',
    'harga' => '',
    'stok' => '',
    'expired_at' => '',
    'deskripsi' => '',
    'gambar' => null,
]);

$save = function () {
    $validated = $this->validate([
        'nama_barang' => 'required|min:3',
        'id_kategori' => [
            'required',
            Rule::exists('kategoris', 'id')->where(function ($query) {
                return $query->where('id_apotek', auth()->user()->id_apotek);
            }),
        ],
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
        'expired_at' => 'required|date|after:today',
        'gambar' => 'nullable|image|max:2048',
    ]);
    
    $validated['deskripsi'] = $this->deskripsi ?? '';
    $validated['id_apotek'] = auth()->user()->id_apotek;

    $path = null;
    if ($this->gambar) {
        // Stores in storage/app/public/medicines
        $path = $this->gambar->store('medicines', 'public');
    }
    $validated['gambar'] = $path;

    $barang = Barang::create($validated);

    DB::table('historis')->insert([
        'barang_id'      => $barang->id,
        'user_name'      => auth()->user()->name,
        'id_apotek'      => auth()->user()->id_apotek,
        'aksi'           => 'adjustment',
        'perubahan_stok' => $this->stok - $barang->getOriginal('stok'),
        'stok_akhir'     => $this->stok,
        'created_at'     => now(),
    ]);

    session()->flash('message', 'Medicine added successfully!');
    return redirect()->route('inventory.index');
};

with(
    fn() => [
        'categories' => Kategori::where('id_apotek', auth()->user()->id_apotek)
            ->orderBy('nama_kategori')
            ->get(),
    ],
);
?>

<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <form wire:submit="save"
            class="bg-white dark:bg-zinc-900 p-8 shadow sm:rounded-lg space-y-6 border border-zinc-200 dark:border-zinc-800">
            <div>
                <h2 class="text-2xl font-bold text-zinc-800 dark:text-white">Tambah Produk Baru</h2>
                <p class="text-sm text-zinc-500">Inventaris akan dilacak di bawah {{ auth()->user()->apotek->nama }}</p>
            </div>

            <hr class="border-zinc-200 dark:border-zinc-800">

            <div>
                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Nama Obat</label>
                <input type="text" wire:model="nama_barang" placeholder="e.g. Paracetamol 500mg"
                    class="mt-1 block w-full rounded-md border-zinc-300 dark:border-zinc-700 dark:bg-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('nama_barang')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Kategori</label>
                <select wire:model="id_kategori"
                    class="mt-1 block w-full rounded-md border-zinc-300 dark:border-zinc-700 dark:bg-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('id_kategori')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
                @if ($categories->isEmpty())
                    <p class="mt-1 text-xs text-amber-600">Tidak ada kategori yang tersedia. Silakan tambahkan kategori terlebih dahulu.</p>
                @endif
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Deskripsi (optional)</label>
                <textarea wire:model="deskripsi" rows="3" placeholder="Informasi tambahan tentang obat ini..."
                    class="mt-1 block w-full rounded-md border-zinc-300 dark:border-zinc-700 dark:bg-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Harga (IDR)</label>
                    <input type="number" wire:model="harga"
                        class="mt-1 block w-full rounded-md border-zinc-300 dark:border-zinc-700 dark:bg-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('harga')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Stok Awal</label>
                    <input type="number" wire:model="stok"
                        class="mt-1 block w-full rounded-md border-zinc-300 dark:border-zinc-700 dark:bg-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('stok')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Tanggal Kedaluwarsa</label>
                <input type="date" wire:model="expired_at"
                    class="mt-1 block w-full rounded-md border-zinc-300 dark:border-zinc-700 dark:bg-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('expired_at')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            
            <div class="mb-4">
                @if ($gambar)
                    <img src="{{ $gambar->temporaryUrl() }}" class="w-32 h-32 object-cover rounded-lg">
                @endif

                <label class="block text-sm font-medium">Foto Obat</label>
                <input type="file" wire:model="gambar" class="mt-1 block w-full">
                <div wire:loading wire:target="gambar" class="text-xs text-blue-500">Mengunggah...</div>
                @error('gambar')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('inventory.index') }}" wire:navigate
                    class="px-6 py-2 text-sm text-zinc-600 hover:text-zinc-900">Cancel</a>
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition font-medium">
                    Simpan ke Inventaris
                </button>
            </div>
        </form>
    </div>
</div>
