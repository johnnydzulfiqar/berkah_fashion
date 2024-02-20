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
        Schema::create('beli_bahan_bakus', function (Blueprint $table) {
            $table->string('kode_belibahanbaku')->primary();
            $table->string('no_fakfur')->nullable();
            $table->integer('total_jumlahbeli');
            $table->date('tgl_beli');
            $table->integer('status_beli');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beli_bahan_bakus');
    }
};
