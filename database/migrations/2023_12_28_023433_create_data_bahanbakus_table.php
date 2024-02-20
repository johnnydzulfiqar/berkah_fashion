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
        Schema::create('data_bahanbakus', function (Blueprint $table) {
            $table->string('kode_bahanbaku')->primary();
            $table->string('nama_bahanbaku');
            $table->string('kode_warna', 20);
            $table->string('kode_satuan', 20);
            $table->integer('stok');
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
        Schema::dropIfExists('data_bahanbakus');
    }
};
