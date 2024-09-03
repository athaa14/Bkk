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
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->string('id_perusahaan')->primary();
            $table->string('username');
            $table->string('nama_perusahaan');
            $table->enum('bidang_usaha', ['Seni dan Ekonomi Kreatif', 'Bisnis dan Manajemen', 'Teknologi Informasi', 'Pemasaran dan Marketing','Logistik']);
            $table->string('no_telepon');
            $table->text('alamat');
            $table->string('logo')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('username')->references('username')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan');
    }
};
