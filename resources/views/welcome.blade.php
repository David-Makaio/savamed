<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('Savamed') }} - Solusi Kelola Apotek Jadi Lebih Mudah</title>

        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <meta name="apple-mobile-web-app-title" content="Savamed" />
        <link rel="manifest" href="/site.webmanifest" />

        <!-- Fonts: Menggunakan Inter untuk keterbacaan yang maksimal -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            :root {
                --accent-mint: #6ee7d8;
                --charcoal: #1a1a1a;
                --slate: #64748b;
            }
            .accent-mint { color: var(--accent-mint); }
            .bg-accent-mint { background-color: var(--accent-mint); }
            .text-charcoal { color: var(--charcoal); }
            .text-slate { color: var(--slate); }
            .border-accent { border-color: var(--accent-mint); }
            
            .transition-smooth { transition: all 0.3s ease; }
            .hover-scale:hover { transform: translateY(-4px); }
        </style>
    </head>
    <body class="bg-white text-charcoal font-sans antialiased">

        <x-header/>

        <main>
            <section class="min-h-svh pt-32 pb-20 px-6 flex items-center bg-preset-gradient-light">
                <div class="max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h1 class="text-[clamp(2.3rem,1.625rem+2.698vw,4rem)] leading-[1.13] mb-2">
                            Kelola Stok Apotek <br/> <span class="text-teal-500">Jadi Lebih Cepat</span>
                        </h1>

                        <p class="text-[clamp(0.85rem,0.722rem+0.511vw,1.172rem)] text-slate max-w-xl mb-10 font-400 leading-relaxed">
                            Bosan dengan hitung stok manual? Savamed membantu Anda mengatur inventaris secara otomatis, mencegah stok kosong, dan memantau kedaluwarsa hanya dalam satu layar.
                        </p>

                        <!-- Tombol Aksi yang Menarik -->
                        <div class="flex flex-col sm:flex-row gap-5">
                            <a href="{{ route('login') }}" class="bg-accent-mint text-charcoal px-10 py-4 rounded-lg font-700 text-center shadow-lg shadow-teal-100 hover:shadow-xl hover:opacity-90 transition-smooth text-lg">
                                Coba Gratis Sekarang
                            </a>
                            <a href="{{ route('home') }}" class="border-2 border-charcoal text-charcoal px-10 py-4 rounded-lg font-700 text-center hover:bg-charcoal hover:text-white transition-smooth text-lg">
                                Konsultasi Dulu
                            </a>
                        </div>
                        
                        <p class="mt-6 text-sm text-slate flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path></svg>
                            Tidak perlu kartu kredit. Setup hanya 5 menit.
                        </p>
                    </div>
                    
                    <!-- Area Visual (Placeholder Image) -->
                    <div class="hidden lg:block relative">
                        <div class="bg-teal-50 rounded-2xl p-4 border border-teal-100 shadow-2xl">
                             <div class="aspect-video bg-white rounded-xl shadow-inner flex items-center justify-center border border-gray-100">
                                 <span class="text-slate font-500">[Gambar Dashboard Savamed yang Bersih]</span>
                             </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Grid: Fokus pada Manfaat Langsung -->
            <section class="py-24 px-6 bg-white border-t border-gray-100">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center mb-20">
                        <p class="text-sm font-700 accent-mint uppercase tracking-[0.2em] mb-4">Fitur Andalan</p>
                        <h2 class="text-4xl md:text-5xl font-800 text-charcoal leading-tight" style="letter-spacing: -0.02em;">
                            Segalanya Lebih Teratur <br/> Bersama Savamed
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Fitur 1 -->
                        <div class="group p-8 bg-white border border-gray-100 rounded-2xl hover:border-teal-300 transition-smooth hover:shadow-xl shadow-sm">
                            <div class="w-14 h-14 bg-teal-50 rounded-xl mb-6 flex items-center justify-center group-hover:bg-accent-mint transition-smooth">
                                <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-700 text-charcoal mb-4">Stok Anti-Selisih</h3>
                            <p class="text-slate leading-relaxed">
                                Pantau pergerakan stok secara otomatis. Setiap obat yang masuk dan keluar tercatat rapi tanpa takut ada data yang hilang.
                            </p>
                        </div>

                        <!-- Fitur 2 -->
                        <div class="group p-8 bg-white border border-gray-100 rounded-2xl hover:border-teal-300 transition-smooth hover:shadow-xl shadow-sm">
                            <div class="w-14 h-14 bg-teal-50 rounded-xl mb-6 flex items-center justify-center group-hover:bg-accent-mint transition-smooth">
                                <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-700 text-charcoal mb-4">Ingat Kedaluwarsa</h3>
                            <p class="text-slate leading-relaxed">
                                Dapatkan notifikasi otomatis sebelum produk kedaluwarsa. Lindungi reputasi apotek Anda dan kurangi kerugian stok terbuang.
                            </p>
                        </div>

                        <!-- Fitur 3 -->
                        <div class="group p-8 bg-white border border-gray-100 rounded-2xl hover:border-teal-300 transition-smooth hover:shadow-xl shadow-sm">
                            <div class="w-14 h-14 bg-teal-50 rounded-xl mb-6 flex items-center justify-center group-hover:bg-accent-mint transition-smooth">
                                <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-700 text-charcoal mb-4">Laporan Siap Pakai</h3>
                            <p class="text-slate leading-relaxed">
                                Tidak perlu pusing bikin grafik Excel. Lihat omzet, produk terlaris, dan laba rugi secara instan kapan saja.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- How It Works Section: Sederhana & Mengajak -->
            <section class="py-24 px-6 bg-gray-50 overflow-hidden">
                <div class="max-w-7xl mx-auto relative">
                    <div class="mb-16">
                        <p class="text-sm font-700 accent-mint uppercase tracking-widest mb-4">Langkah Mudah</p>
                        <h2 class="text-4xl md:text-5xl font-800 text-charcoal leading-tight">
                            Hanya Butuh 3 Langkah <br/> Untuk Transformasi
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
                        <!-- Step 1 -->
                        <div class="bg-white p-10 rounded-2xl shadow-sm border border-gray-100 hover-scale transition-smooth">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent-mint text-charcoal font-800 text-lg mb-6 shadow-md">1</div>
                            <h3 class="text-2xl font-700 text-charcoal mb-4">Daftar Akun</h3>
                            <p class="text-slate leading-relaxed">Cukup masukkan alamat email dan nama apotek. Akun Anda siap dalam hitungan detik.</p>
                        </div>

                        <!-- Step 2 -->
                        <div class="bg-white p-10 rounded-2xl shadow-sm border border-gray-100 hover-scale transition-smooth">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent-mint text-charcoal font-800 text-lg mb-6 shadow-md">2</div>
                            <h3 class="text-2xl font-700 text-charcoal mb-4">Input Data Stok</h3>
                            <p class="text-slate leading-relaxed">Unggah daftar produk Anda dengan Excel atau masukkan satu per satu melalui antarmuka yang simpel.</p>
                        </div>

                        <!-- Step 3 -->
                        <div class="bg-white p-10 rounded-2xl shadow-sm border border-gray-100 hover-scale transition-smooth">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent-mint text-charcoal font-800 text-lg mb-6 shadow-md">3</div>
                            <h3 class="text-2xl font-700 text-charcoal mb-4">Pantau & Tumbuh</h3>
                            <p class="text-slate leading-relaxed">Gunakan wawasan data untuk membeli stok yang tepat dan hemat lebih banyak waktu untuk pasien Anda.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stats Section: Bukti Sosial -->
            <section class="py-24 px-6 bg-charcoal text-white">
                <div class="max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                        <div>
                            <div class="text-6xl font-800 accent-mint mb-4">500+</div>
                            <p class="text-gray-400 text-lg uppercase tracking-widest font-500">Apotek Bergabung</p>
                        </div>
                        <div>
                            <div class="text-6xl font-800 accent-mint mb-4">12jt+</div>
                            <p class="text-gray-400 text-lg uppercase tracking-widest font-500">Stok Terkelola</p>
                        </div>
                        <div>
                            <div class="text-6xl font-800 accent-mint mb-4">24/7</div>
                            <p class="text-gray-400 text-lg uppercase tracking-widest font-500">Dukungan Siap Bantu</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Final CTA: Mendesak & Ramah -->
            <section class="py-32 px-6 bg-white relative overflow-hidden">
                 <!-- Background dekorasi -->
                <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-96 h-96 bg-teal-50 rounded-full blur-3xl opacity-50"></div>
                <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/4 w-96 h-96 bg-mint-50 rounded-full blur-3xl opacity-50"></div>

                <div class="max-w-4xl mx-auto text-center relative z-10">
                    <h2 class="text-5xl md:text-6xl font-800 text-charcoal mb-8 leading-tight tracking-tight">
                        Waktunya Beralih ke <br/> Manajemen yang Lebih Pintar
                    </h2>
                    <p class="text-xl text-slate mb-12 max-w-2xl mx-auto leading-relaxed">
                        Sudah saatnya Anda meninggalkan cara lama. Bergabunglah dengan ratusan rekan apoteker lainnya yang sudah hidup lebih tenang bersama Savamed.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6 justify-center">
                        <a href="{{ route('login') }}" class="bg-accent-mint text-charcoal px-12 py-5 rounded-xl font-800 text-center shadow-xl shadow-teal-100 hover:shadow-2xl transition-smooth text-xl">
                            Coba Gratis Sekarang
                        </a>
                        <a href="{{ route('home') }}" class="border-2 border-charcoal text-charcoal px-12 py-5 rounded-xl font-800 text-center hover:bg-gray-50 transition-smooth text-xl">
                            Tanya Dulu, Gratis
                        </a>
                    </div>
                    <p class="mt-8 text-sm text-slate">Bantuan aktivasi? Hubungi tim support kami kapan saja.</p>
                </div>
            </section>

            <!-- Footer: Rapi & Professional -->
            <footer class="py-16 px-6 bg-white border-t border-gray-100">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mb-12">
                        <div class="text-2xl font-800 tracking-tighter text-charcoal">
                            SAVA<span class="text-teal-500">MED</span>
                        </div>
                        <nav class="flex flex-wrap gap-8 text-sm font-600 text-slate">
                            <a href="#" class="hover:text-charcoal transition-colors">Beranda</a>
                            <a href="#" class="hover:text-charcoal transition-colors">Fitur</a>
                            <a href="#" class="hover:text-charcoal transition-colors">Harga</a>
                            <a href="#" class="hover:text-charcoal transition-colors">Kontak</a>
                        </nav>
                    </div>
                    <div class="pt-8 border-t border-gray-50 flex flex-col md:flex-row justify-between items-center gap-4">
                        <p class="text-sm text-gray-400">
                            © 2026 Savamed. Dibuat dengan ❤️ untuk kemajuan apotek di Indonesia.
                        </p>
                        <div class="flex gap-6 text-gray-400">
                             <!-- Media sosial icons could go here -->
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </body>
</html>