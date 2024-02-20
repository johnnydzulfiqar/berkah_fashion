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
        Schema::create('detail_restocks', function (Blueprint $table) {
            $table->string('kode_detail_restock')->primary();
            $table->string('kode_restock');
            $table->string('kode_bahanbaku');
            $table->string('kode_warna');
            $table->string('kode_satuan');
            $table->integer('harga_item');
            $table->integer('jumlah_item');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_restocks');
    }
};
