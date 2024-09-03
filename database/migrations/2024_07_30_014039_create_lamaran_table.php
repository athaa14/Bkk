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
            $table->id('id_lamaran');
            $table->string('id_loker');
            $table->string('nik');
            $table->enum('status', ['Terkirim', 'Lolos Ketahap Selanjutnya', 'Diterima', 'Ditolak'])->default('Terkirim');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_loker')->references('id_loker')->on('loker')->onDelete('cascade');
            $table->foreign('nik')->references('nik')->on('alumni')->onDelete('cascade');
        });

        Schema::create('file_lamaran', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lamaran');
            $table->string('nama_file', 100);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_lamaran')->references('id_lamaran')->on('lamaran')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lamaran');
    }
};
