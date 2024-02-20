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
        Schema::create('detail_produksi_pakaian_packings', function (Blueprint $table) {
            $table->string('kode_detail_produksipakaian_packing')->primary();
            $table->string('kode_produksipakaian_packing');
            $table->string('kode_rencanaproduksi');
            $table->string('id_user');
            $table->date('tanggal_kerja');
            $table->string('nama_produk');
            $table->string('warna_produk');
            $table->string('ukuran_produk');
            $table->integer('jumlah_rencanaproduksi');
            $table->integer('jumlah_berhasil');
            $table->integer('jumlah_gagal');
            $table->integer('total_berhasildangagal');
            $table->integer('upah_kerja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_produksi_pakaian_packings');
    }
};
