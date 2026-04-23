<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('historis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
            $table->string('aksi'); 
            $table->integer('perubahan_stok');
            $table->integer('stok_akhir');
            $table->string('user_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historis');
    }
};
