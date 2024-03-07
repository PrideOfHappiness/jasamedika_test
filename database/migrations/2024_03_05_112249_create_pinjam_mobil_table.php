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
        Schema::create('pinjam_mobil', function (Blueprint $table) {
            $table->string('pinjamID', 20)->primary();
            $table->string('mobilID');
            $table->string('userID');
            $table->integer('lamaHariPinjam');
            $table->integer('totalBayar');
            $table->enum('status', ['Sedang Dipinjam', 'Tersedia']);
            $table->date('hariPinjam');
            $table->date('hariSelesai');
            $table->timestamps();

            $table->foreign('mobilID')->references('nomorPlat')->on('mobil')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('userID')->references('userID')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam_mobil');
    }
};
