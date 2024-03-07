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
        Schema::create('mobil', function (Blueprint $table) {
            $table->string('nomorPlat', 9)->primary();
            $table->string('mobilID');
            $table->string('model');
            $table->string('jenis_bodi');
            $table->integer('kapasitasOrang');
            $table->string('mesin');
            $table->string('transmisi');
            $table->integer('harga_perHari');
            $table->enum('status', ['Tersedia', 'Tidak Tersedia', 'Sedang Disewakan']);
            $table->text('namaFileFoto');
            $table->timestamps();

            $table->foreign('mobilID')->references('merkID')->on('merk_mobil')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil');
    }
};
