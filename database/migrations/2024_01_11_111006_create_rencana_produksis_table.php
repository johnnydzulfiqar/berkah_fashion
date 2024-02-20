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
        Schema::create('rencana_produksis', function (Blueprint $table) {
            $table->string('kode_rencanaproduksi')->primary();
            $table->string('kode_produk');
            $table->string('kode_warnaproduk');
            $table->string('kode_ukuranproduk');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->integer('biaya_cutting');
            $table->integer('biaya_jahit');
            $table->integer('biaya_packing');
            $table->integer('jumlah_rencanaproduksi');
            $table->integer('status_produksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_produksis');
    }
};
