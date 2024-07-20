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
        Schema::create('meditasis', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_meditasi');
            $table->string('durasi_meditasi');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->foreignId('kategori_meditasi_id')->constrained('kategori_meditasis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meditasis');
    }
};