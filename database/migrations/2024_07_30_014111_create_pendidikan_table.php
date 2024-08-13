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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->string('id_riwayat_pendidikan')->primary();
            $table->unsignedBigInteger('id_alumni');
            $table->string('nama_universitas');
            $table->text('alamat');
            $table->string('gelar')->nullable();
            $table->string('bidang_studi');
            $table->year('tahun_awal');
            $table->year('tahun_akhir');
            $table->text('deskripsi');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_alumni')->references('id')->on('alumni')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
};
