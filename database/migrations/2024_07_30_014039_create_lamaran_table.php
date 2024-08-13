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
        Schema::create('lamaran', function (Blueprint $table) {
            $table->string('id_lamaran')->primary();
            $table->unsignedBigInteger('id_loker');
            $table->unsignedBigInteger('id_alumni');
            $table->enum('status', ['Menunggu Konfirmasi','Diterima','Ditolak'])->default('Menunggu Konfirmasi');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_loker')->references('id')->on('loker')->onDelete('cascade');
            $table->foreign('id_alumni')->references('id')->on('alumni')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamaran');
    }
};
