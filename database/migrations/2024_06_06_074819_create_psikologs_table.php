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
        Schema::create('psikologs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->longText('deskripsi');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['pending', 'verified', 'suspended'])->default('pending');
            $table->enum('jenis_kelamin',['Laki-Laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('asal_universitas');
            $table->string('program_studi');
            $table->integer('tahun_lulus');
            $table->string('tempat_praktik');
            $table->bigInteger('no_str');
            $table->string('dokumen_cv');
            $table->string('dokumen_ijazah');
            $table->string('dokumen_str_aktif');
            $table->string('dokumen_izin_praktik');
            $table->rememberToken();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psikologs');
    }
};