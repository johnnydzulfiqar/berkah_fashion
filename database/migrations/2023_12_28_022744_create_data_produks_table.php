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
        Schema::create('data_produks', function (Blueprint $table) {
            $table->string('kode_produk')->primary();
            $table->string('nama_produk');
            $table->string('kode_warna');
            $table->string('kode_ukuran');
            $table->string('keterangan')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_produks');
    }
};
