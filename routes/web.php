<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\DashboardController;

Route::view('/', 'welcome')->name('home');

Route::view('/waiting-room', 'pages.waiting-room')->name('waiting-room');

Route::middleware(['auth', 'apotek.terverifikasi'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Volt::route('/inventory', 'inventory.index')->name('inventory.index');
    Volt::route('/inventory/create', 'inventory.create')->name('inventory.create');
    Volt::route('/history', 'history.index')->name('history.index');
    Volt::route('/inventory/{barang}/edit', 'inventory.edit')->name('inventory.edit');
});

require __DIR__.'/settings.php';
