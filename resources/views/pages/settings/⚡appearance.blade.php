<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Pengaturan Tampilan')] class extends Component {
    //}; 
    // ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="mb-6">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Tampilan</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400">Sesuaikan pengaturan tampilan untuk akun Anda</p>
                </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="p-2 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Tema Aplikasi</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Pilih tema yang nyaman untuk mata Anda</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4" x-data>
                <label class="relative cursor-pointer group">
                    <input type="radio" name="appearance" value="light" class="sr-only peer" />
                    <div class="p-4 border-2 border-gray-200 dark:border-gray-600 rounded-xl peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20 transition-all duration-200 group-hover:border-blue-300">
                        <div class="flex items-center justify-center mb-3">
                            <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-yellow-800" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2L13.09 8.26L20 9L14 14.74L15.18 21.02L10 17.77L4.82 21.02L6 14.74L0 9L6.91 8.26L10 2Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Terang</h4>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Tema cerah yang menyegarkan</p>
                        </div>
                    </div>
                </label>

                <label class="relative cursor-pointer group">
                    <input type="radio" name="appearance" value="dark" class="sr-only peer" />
                    <div class="p-4 border-2 border-gray-200 dark:border-gray-600 rounded-xl peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20 transition-all duration-200 group-hover:border-blue-300">
                        <div class="flex items-center justify-center mb-3">
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-gray-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Gelap</h4>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Tema gelap yang mudah di mata</p>
                        </div>
                    </div>
                </label>

                <label class="relative cursor-pointer group">
                    <input type="radio" name="appearance" value="system" class="sr-only peer" />
                    <div class="p-4 border-2 border-gray-200 dark:border-gray-600 rounded-xl peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20 transition-all duration-200 group-hover:border-blue-300">
                        <div class="flex items-center justify-center mb-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-yellow-400 to-gray-800 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Otomatis</h4>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Ikuti pengaturan sistem</p>
                        </div>
                    </div>
                </label>
            </div>
        </div>
            </div>
        </div>
    </div>
