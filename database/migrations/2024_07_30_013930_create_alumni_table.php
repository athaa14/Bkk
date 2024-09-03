<?php

use App\Models\Users;
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
        Schema::create('alumni', function (Blueprint $table) {
            $table->string('nik')->primary();
            $table->string('username');
            $table->string('nama_lengkap');
            $table->enum('jurusan', ['AKL','BR','DKV','MLOG','MP','RPL','TKJ']);
            $table->enum('jenis_kelamin', ['Laki Laki','Perempuan']);
            $table->year('tahun_lulus');
            $table->text('alamat')->nullable();
            $table->string('no_telepon')->nullable();
            $table->text('keahlian')->nullable();
            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
