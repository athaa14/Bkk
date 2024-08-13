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
        Schema::create('loker', function (Blueprint $table) {
            $table->string('id_loker')->primary();
            $table->unsignedBigInteger('id_perusahaan');
            $table->string('jabatan');
            $table->enum('jenis_waktu_pekerjaan',['Waktu Kerja Standar (Full-Time)','Waktu Kerja Paruh Waktu (Part-Time)','Waktu Kerja Fleksibel (Flexible Hours)','Shift Kerja (Shift Work)','Waktu Kerja Bergilir (Rotating Shift)','Waktu Kerja Jarak Jauh (Remote Work)','Waktu Kerja Kontrak (Contract Work)','Waktu Kerja Proyek(Project-Based work)','Waktu Kerja Tidak Teratur (Irreguler Hours)','Waktu Kerja Sementara (Temporary Work)']);
            $table->text('deskripsi');
            $table->date('tanggal_akhir');
            $table->enum('status', ['Menunggu Konfirmasi','Dipublikasi','Ditolak'])->default('Menunggu Konfirmasi');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_perusahaan')->references('id')->on('perusahaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loker');
    }
};
