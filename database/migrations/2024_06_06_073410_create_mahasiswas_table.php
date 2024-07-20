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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['pending', 'verified', 'suspended'])->default('pending');
            $table->enum('jenis_kelamin',['Laki-Laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nama_universitas');
            $table->string('fakultas');
            $table->string('program_studi');
            $table->integer('nomor_induk_mahasiswa');
            $table->integer('tahun_masuk');
            $table->integer('semester');
            $table->string('dokumen_ktm');
            $table->string('dokumen_transkip_nilai');
            $table->rememberToken()->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};