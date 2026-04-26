<x-layouts::app :title="__('Dasbor')">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 px-4 sm:px-0">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800 dark:text-white leading-tight">
                        Selamat pagi, {{ Auth::user()->name }}! 👋
                    </h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400 font-medium">
                        Status inventaris per {{ now()->format('H:i') }} WIB
                    </p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('inventory.create') }}"
                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-teal-600 hover:bg-teal-700 text-white text-sm font-bold rounded-xl transition-all shadow-sm">
                        <x-icon name="plus" class="w-4 h-4" />
                        Tambah Stok Baru
                    </a>
                    <button onclick="window.print()"
                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-sm font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition-all shadow-xs">
                        <x-icon name="download" class="w-4 h-4" />
                        Unduh PDF
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <div class="lg:col-span-8 space-y-8">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div
                            class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-red-100 dark:border-red-900/20 overflow-hidden">
                            <div class="p-5">
                                <div class="flex items-center justify-between mb-4">
                                    <span
                                        class="flex items-center gap-2 px-3 py-1 rounded-full bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 text-xs font-bold uppercase tracking-wider">
                                        <span class="relative flex h-2 w-2">
                                            <span
                                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                                        </span>
                                        Peringatan
                                    </span>
                                    <a href="#"
                                        class="text-xs font-semibold text-teal-600 dark:text-teal-400 hover:underline">Isi Ulang Semua →</a>
                                </div>

                                <div class="flex items-end justify-between">
                                    <div>
                                        <div class="text-4xl font-black text-slate-800 dark:text-white">14</div>
                                        <p class="text-slate-500 dark:text-slate-400 font-medium">Produk habis stok</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-sm font-bold text-amber-600 dark:text-amber-500">+3 sejak kemarin</div>
                                        <div class="text-[10px] text-slate-400 uppercase">Tren meningkat</div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-red-50/50 dark:bg-red-900/10 px-5 py-3 border-t border-red-50 dark:border-red-900/20 flex justify-between items-center">
                                <span class="text-[11px] text-red-600 dark:text-red-400 font-medium italic">Segera lakukan pengisian ulang stok</span>
                                <x-icon name="exclamation-circle" class="w-4 h-4 text-red-300" />
                            </div>
                        </div>

                        <div
                            class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-primary-100 dark:border-slate-700 p-5">
                            <div class="flex items-center gap-3 mb-4">
                                <div
                                    class="p-2 bg-teal-100 dark:bg-teal-900/30 text-teal-600 dark:text-teal-400 rounded-lg">
                                    <x-icon name="history" class="w-5 h-5" />
                                </div>
                                <h3 class="font-bold text-slate-700 dark:text-slate-200">Pantau Kadaluarsa</h3>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-slate-500 dark:text-slate-400 font-bold">Kadaluarsa < 30 hari</span>
                                                <span class="font-bold text-slate-700 dark:text-slate-200">28</span>
                                    </div>
                                    <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full">
                                        <div class="bg-teal-500 h-2 rounded-full" style="width: 45%"></div>
                                    </div>
                                </div>
                                <p class="text-xs text-slate-400 leading-relaxed">
                                    Kemungkinan rugi: <span
                                        class="font-semibold text-slate-600 dark:text-slate-300">Rp 12.400.000</span> jika tidak digerakkan.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700 overflow-hidden">
                        <div
                            class="p-5 border-b border-slate-50 dark:border-slate-700 flex justify-between items-center bg-slate-50/30 dark:bg-slate-900/10">
                            <div>
                                <h3 class="font-bold text-slate-800 dark:text-white">Inventaris Paling Laku</h3>
                                <p class="text-[11px] text-slate-500 font-medium uppercase tracking-wider mt-0.5">10 produk dengan penggunaan harian tertinggi</p>
                            </div>
                            <button class="text-xs font-bold text-teal-600 hover:text-teal-700 flex items-center gap-1">
                                Analisis Tren
                                <x-icon name="trending-up" class="w-3 h-3" />
                            </button>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-50 dark:border-slate-700">
                                        <th class="px-6 py-4">Obat</th>
                                        <th class="px-6 py-4">Stok Saat Ini</th>
                                        <th class="px-6 py-4">Rata² Harian</th>
                                        <th class="px-6 py-4">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50 dark:divide-slate-700/50">
                                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-900/20 transition-colors">
                                        <td class="px-6 py-4">
                                            <p class="text-sm font-bold text-slate-800 dark:text-slate-200">Paracetamol 500mg</p>
                                            <p class="text-[10px] text-slate-400 uppercase">Pereda Nyeri</p>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-semibold text-slate-600 dark:text-slate-400">
                                            120 unit</td>
                                        <td class="px-6 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">
                                            45/hari</td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="px-2 py-1 rounded-md bg-rose-50 dark:bg-rose-900/20 text-rose-600 dark:text-rose-400 text-[10px] font-bold uppercase">Perlu Isi Ulang</span>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-900/20 transition-colors">
                                        <td class="px-6 py-4">
                                            <p class="text-sm font-bold text-slate-800 dark:text-slate-200">Amoxicillin 250mg</p>
                                            <p class="text-[10px] text-slate-400 uppercase">Antibiotik</p>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-semibold text-slate-600 dark:text-slate-400">
                                            850 unit</td>
                                        <td class="px-6 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">
                                            30/hari</td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="px-2 py-1 rounded-md bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 text-[10px] font-bold uppercase">Stabil</span>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-900/20 transition-colors">
                                        <td class="px-6 py-4">
                                            <p class="text-sm font-bold text-slate-800 dark:text-slate-200">Metformin 500mg</p>
                                            <p class="text-[10px] text-slate-400 uppercase">Antidiabetes</p>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-semibold text-slate-600 dark:text-slate-400">
                                            45 unit</td>
                                        <td class="px-6 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">
                                            22/hari</td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="px-2 py-1 rounded-md bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 text-[10px] font-bold uppercase">Stok Terbatas</span>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-900/20 transition-colors">
                                        <td class="px-6 py-4">
                                            <p class="text-sm font-bold text-slate-800 dark:text-slate-200">Lisinopril 10mg</p>
                                            <p class="text-[10px] text-slate-400 uppercase">Tekanan Darah</p>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-semibold text-slate-600 dark:text-slate-400">
                                            400 unit</td>
                                        <td class="px-6 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">
                                            15/hari</td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="px-2 py-1 rounded-md bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 text-[10px] font-bold uppercase">Stabil</span>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <div
                            class="p-4 bg-slate-50/50 dark:bg-slate-900/20 border-t border-slate-50 dark:border-slate-700">
                            <a href="{{ route('inventory.index') }}"
                                class="block text-center text-xs font-bold text-slate-500 hover:text-teal-600 transition-colors uppercase tracking-widest">
                                Lihat Seluruh 35 Produk Inventaris
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4">
                    <div
                        class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700 flex flex-col h-full overflow-hidden">
                        <div
                            class="p-5 border-b border-slate-50 dark:border-slate-700 flex justify-between items-center bg-slate-50/50 dark:bg-slate-900/20">
                            <h3 class="font-bold text-slate-800 dark:text-white flex items-center gap-2">
                                <x-icon name="clipboard-list" class="w-4 h-4 text-slate-400" />
                                Aktivitas Terbaru
                            </h3>
                            <a href="{{ route('history.index') }}"
                                class="text-[11px] font-bold text-teal-600 uppercase hover:underline">Lihat Riwayat Lengkap</a>
                        </div>

                        <div class="p-6 space-y-7 relative">
                            @forelse($logs->take(8) as $log)
                                <div class="flex gap-4 relative group">
                                    @if (!$loop->last)
                                        <div
                                            class="absolute left-[19px] top-10 bottom-[-28px] w-px bg-slate-100 dark:bg-slate-700 group-hover:bg-teal-200 transition-colors">
                                        </div>
                                    @endif

                                    <div
                                        class="z-10 flex-shrink-0 w-10 h-10 rounded-xl border-2 border-white dark:border-slate-800 flex items-center justify-center shadow-sm
                                        {{ $log->perubahan_stok > 0 ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-600' }}">
                                        @if ($log->perubahan_stok > 0)
                                            <x-icon name="arrow-up" class="w-4 h-4" />
                                        @else
                                            <x-icon name="arrow-down" class="w-4 h-4" />
                                        @endif
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <div class="flex justify-between items-start gap-2">
                                            <p class="text-sm font-bold text-slate-800 dark:text-slate-200 truncate">
                                                {{ $log->nama_barang }}
                                            </p>
                                            <span
                                                class="flex-shrink-0 text-[10px] font-black px-1.5 py-0.5 rounded {{ $log->perubahan_stok > 0 ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                                {{ $log->perubahan_stok > 0 ? '+' : '' }}{{ $log->perubahan_stok }}
                                            </span>
                                        </div>
                                        <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">
                                            {{ $log->aksi }} by <span
                                                class="text-slate-700 dark:text-slate-200 font-semibold">{{ $log->user_name }}</span>
                                        </p>
                                        <time
                                            class="text-[10px] font-bold text-slate-400 uppercase mt-1 block tracking-wider">
                                            {{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}
                                        </time>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-10">
                                    <p class="text-sm text-slate-400 italic">No activity logs found.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts::app>
