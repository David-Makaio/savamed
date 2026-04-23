<?php
use function Livewire\Volt\{with};
use Illuminate\Support\Facades\DB;

with(fn () => [
    'logs' => DB::table('historis')
        ->join('barangs', 'historis.barang_id', '=', 'barangs.id')
        ->select('historis.*', 'barangs.nama_barang')
        ->orderBy('historis.created_at', 'desc')
        ->get()
]);
?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow sm:rounded-lg">
            <h2 class="text-xl font-bold mb-6">Inventory Audit Logs</h2>
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase">Time</th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase">Medicine</th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase">Action</th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase">Change</th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase">Final Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase">User</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($logs as $log)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}</td>
                        <td class="px-6 py-4 font-medium">{{ $log->nama_barang }}</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 bg-gray-100 rounded text-xs">{{ $log->aksi }}</span></td>
                        <td class="px-6 py-4 font-bold {{ $log->perubahan_stok > 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $log->perubahan_stok > 0 ? '+' : '' }}{{ $log->perubahan_stok }}
                        </td>
                        <td class="px-6 py-4">{{ $log->stok_akhir }}</td>
                        <td class="px-6 py-4 text-sm">{{ $log->user_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>