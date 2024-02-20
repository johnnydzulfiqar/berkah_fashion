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
        Schema::create('produksi_pakaian_jahits', function (Blueprint $table) {
            $table->string('kode_produksipakaian_jahit')->primary();
            $table->string('kode_rencanaproduksi');
            $table->string('nama_produk');
            $table->string('warna_produk');
            $table->string('ukuran_produk');
            $table->integer('jumlah_rencanaproduksi');
            $table->integer('total_berhasil_daricutting');
            $table->integer('total_jumlahberhasil');
            $table->integer('total_jumlahgagal');
            $table->integer('total_produksi_pakaian')->default(0);
            $table->integer('status_produksi_jahit')->default(1);
            $table->date('tanggal_awal');
            $table->date('tanggal_selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi_pakaian_jahits');
    }
};
