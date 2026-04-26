<?php
use function Livewire\Volt\{with};
use Illuminate\Support\Facades\DB;

with(fn () => [
    'logs' => DB::table('historis')
        ->join('barangs', 'historis.barang_id', '=', 'barangs.id')
        ->select('historis.*', 'barangs.nama_barang')
        ->where('historis.id_apotek', auth()->user()->id_apotek) 
        ->orderBy('historis.created_at', 'desc')
        ->paginate(15),
]);
?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-zinc-900 p-8 shadow sm:rounded-lg border border-zinc-200 dark:border-zinc-800">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-zinc-800 dark:text-white">Catatan Audit Inventaris</h2>
                    <p class="text-sm text-zinc-500">Melacak setiap pil dan ramuan untuk Global Pharma Care{{ auth()->user()->apotek->nama }}</p>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-800">
                    <thead class="bg-zinc-50 dark:bg-zinc-800/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-zinc-500">Time</th>
                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-zinc-500">Medicine</th>
                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-zinc-500">Action</th>
                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-zinc-500">Change</th>
                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-zinc-500">Final Stock</th>
                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-zinc-500">Handled By</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">
                        @forelse($logs as $log)
                        <tr class="hover:bg-zinc-50/50 dark:hover:bg-zinc-800/30 transition-colors">
                            <td class="px-6 py-4 text-sm text-zinc-500 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-zinc-900 dark:text-white">
                                {{ $log->nama_barang }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $color = match($log->aksi) {
                                        'restock' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                                        'sale' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                                        'initial_entry' => 'bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400',
                                        default => 'bg-zinc-100 text-zinc-700 dark:bg-zinc-800 dark:text-zinc-400',
                                    };
                                @endphp
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium {{ $color }}">
                                    {{ str_replace('_', ' ', ucfirst($log->aksi)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-mono font-bold text-center {{ $log->perubahan_stok >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $log->perubahan_stok > 0 ? '+' : '' }}{{ $log->perubahan_stok }}
                            </td>
                            <td class="px-6 py-4 text-center font-medium text-zinc-700 dark:text-zinc-300">
                                {{ $log->stok_akhir }}
                            </td>
                            <td class="px-6 py-4 text-sm text-zinc-600 dark:text-zinc-400">
                                {{ $log->user_name }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-zinc-500 italic">
                                No inventory changes recorded yet.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $logs->links() }} 
            </div>
        </div>
    </div>
</div>