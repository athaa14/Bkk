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
            $table->string('bidang_usaha');
            $table->string('no_telepon');
            $table->text('alamat');
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('perusahaan');
    }
};
