<?php
use function Livewire\Volt\{state, mount, with, usesFileUploads};
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
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
    'old_gambar' => '',
    'new_gambar' => null,
]);

mount(function (Barang $barang) {
    if ($barang->id_apotek !== auth()->user()->id_apotek) {
        abort(403, 'Unauthorized action.');
    }

    $this->barang = $barang;
    $this->nama_barang = $barang->nama_barang;
    $this->id_kategori = $barang->kategori_id;
    $this->harga = $barang->harga;
    $this->stok = $barang->stok;
    $this->expired_at = $barang->expired_at;
    $this->deskripsi = $barang->deskripsi;
    $this->old_gambar = $barang->gambar;
});

$save = function () {
    $validated = $this->validate([
        'nama_barang' => 'required|min:3',
        'id_kategori' => ['required', Rule::exists('kategoris', 'id')->where(fn($q) => $q->where('id_apotek', auth()->user()->id_apotek))],
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
        'expired_at' => 'required|date',
        'new_gambar' => 'nullable|image|max:2048',
    ]);

    $data_barang = [
        'nama_barang' => $this->nama_barang,
        'kategori_id' => $this->id_kategori,
        'harga' => $this->harga,
        'stok' => $this->stok,
        'expired_at' => $this->expired_at,
        'deskripsi' => $this->deskripsi,
    ];

    if ($this->new_gambar) {
        if ($this->old_gambar && !str_starts_with($this->old_gambar, 'http')) {
            Storage::disk('public')->delete($this->old_gambar);
        }

        $data_barang['gambar'] = $this->new_gambar->store('medicines', 'public');
    }

    $this->barang->update($data_barang);

    DB::table('historis')->insert([
        'barang_id'      => $this->barang->id,
        'user_name'      => auth()->user()->name,
        'id_apotek'      => auth()->user()->id_apotek,
        'aksi'           => 'adjustment',
        'perubahan_stok' => $this->stok - $this->barang->getOriginal('stok'),
        'stok_akhir'     => $this->stok,
        'created_at'     => now(),
    ]);
    session()->flash('message', 'Medicine updated successfully!');
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
        <form wire:submit="save" class="bg-white dark:bg-gray-800 p-8 shadow sm:rounded-lg space-y-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Edit Produk</h2>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Produk</label>
                <input type="text" wire:model="nama_barang"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                @error('nama_barang')
                    <span class="text-red-500 dark:text-red-400 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                <select wire:model="id_kategori"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('id_kategori')
                    <span class="text-red-500 dark:text-red-400 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga (IDR)</label>
                    <input type="number" wire:model="harga"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm dark:bg-gray-700 dark:text-white">
                    @error('harga')
                        <span class="text-red-500 dark:text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stock Baru</label>
                    <input type="number" wire:model="stok"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm font-bold dark:bg-gray-700 dark:text-white">
                    <p class="text-[10px] text-gray-400 dark:text-gray-500 mt-1 italic">*Masukkan jumlah stok saat ini setelah penyesuaian./
                        refill</p>
                    @error('stok')
                        <span class="text-red-500 dark:text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Kedaluwarsa</label>
                <input type="date" wire:model="expired_at"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm dark:bg-gray-700 dark:text-white">
                @error('expired_at')
                    <span class="text-red-500 dark:text-red-400 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Foto Produk</label>
                <div class="mt-2 flex items-center gap-4">
                    @if ($new_gambar)
                        <img src="{{ $new_gambar->temporaryUrl() }}" class="w-20 h-20 object-cover rounded-lg">
                    @elseif ($old_gambar)
                        <img src="{{ str_starts_with($old_gambar, 'http') ? $old_gambar : asset('storage/' . $old_gambar) }}"
                            class="w-20 h-20 object-cover rounded-lg">
                    @endif

                    <input type="file" wire:model="new_gambar" class="text-sm">
                </div>
                @error('new_gambar')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-between items-center pt-4 border-t dark:border-gray-700">
                <a href="{{ route('inventory.index') }}"
                    class="text-gray-600 dark:text-gray-400 hover:underline dark:hover:text-gray-200 text-sm">Batal</a>
                <button type="submit"
                    class="bg-indigo-600 dark:bg-indigo-700 text-white px-6 py-2 rounded-md hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
                    Perbarui Informasi
                </button>
            </div>
        </form>
    </div>
</div>
