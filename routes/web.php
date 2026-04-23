<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Volt::route('/inventory', 'inventory.index')->name('inventory.index');
    Volt::route('/inventory/create', 'inventory.create')->name('inventory.create');
    Volt::route('/history', 'history.index')->name('history.index');
});

require __DIR__.'/settings.php';
