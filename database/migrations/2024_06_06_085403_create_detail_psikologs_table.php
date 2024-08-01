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
        Schema::create('detail_psikologs', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('rating');
            $table->decimal('harga_konsultasi', 15, 2);
            $table->foreignId('psikolog_id')->constrained('psikologs')->onDelete('cascade');
            $table->foreignId('metode_konsultasi_id')->constrained('metode_konsultasis')->onDelete('cascade');
            $table->foreignId('ulasan_id')->constrained('ulasans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_psikologs');
    }
};