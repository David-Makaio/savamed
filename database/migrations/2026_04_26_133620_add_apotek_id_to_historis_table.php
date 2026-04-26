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
        Schema::table('historis', function (Blueprint $table) {
            // Use 'id_apotek' to match your 'apoteks' table
            $table->foreignId('id_apotek')->nullable()->constrained('apoteks')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('historis', function (Blueprint $table) {
            $table->dropForeign(['id_apotek']);
            $table->dropColumn('id_apotek');
        });
    }
};
