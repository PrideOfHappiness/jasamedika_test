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
        Schema::create('pengembalian', function (Blueprint $table) {
                $table->string('kembaliID', 20)->primary();
                $table->string('pinjamID', 20);
                $table->string('mobilID');
                $table->string('userID');
                $table->integer('lamaHariPinjam');
                $table->integer('totalBayar');
                $table->enum('status', ['Belum Dibayar', 'Sudah Dibayar']);
                $table->dateTime('waktuPengembalian');
                $table->timestamps();
    
                $table->foreign('pinjamID')->references('pinjamID')->on('pinjam_mobil')->onUpdate('cascade')->onDelete('restrict');
                $table->foreign('mobilID')->references('nomorPlat')->on('mobil')->onUpdate('cascade')->onDelete('restrict');
                $table->foreign('userID')->references('userID')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};
