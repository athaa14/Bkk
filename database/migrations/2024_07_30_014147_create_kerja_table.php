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
        Schema::create('kerja', function (Blueprint $table) {
            $table->string('id_pengalaman_kerja')->primary();
            $table->string('nik');
            $table->string('jabatan');
            $table->enum('jenis_waktu_pekerjaan',['Waktu Kerja Standar (Full-Time)','Waktu Kerja Paruh Waktu (Part-Time)','Waktu Kerja Fleksibel (Flexible Hours)','Shift Kerja (Shift Work)','Waktu Kerja Bergilir (Rotating Shift)','Waktu Kerja Jarak Jauh (Remote Work)','Waktu Kerja Kontrak (Contract Work)','Waktu Kerja Proyek(Project-Based work)','Waktu Kerja Tidak Teratur (Irreguler Hours)','Waktu Kerja Sementara (Temporary Work)']);
            $table->string('nama_perusahaan');
            $table->text('alamat');
            $table->year('tahun_awal');
            $table->year('tahun_akhir');
            $table->text('deskripsi');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('nik')->references('nik')->on('alumni')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerja');
    }
};
