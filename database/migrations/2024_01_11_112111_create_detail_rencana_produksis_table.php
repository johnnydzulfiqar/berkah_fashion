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
        Schema::create('detail_rencana_produksis', function (Blueprint $table) {
            $table->string('kode_detail_rencanaproduksi')->primary();
            $table->string('kode_rencanaproduksi');
            $table->string('kode_bahanbaku');
            $table->string('kode_warna_stokbahanbaku');
            $table->string('kode_satuan_stokbahanbaku');
            $table->integer('jumlah_perlu_stokbahanbaku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_rencana_produksis');
    }
};
