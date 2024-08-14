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
        Schema::create('metode_konsultasi_mappings', function (Blueprint $table) {
            $table->foreignId('detail_psikolog_id')->constrained('detail_psikologs')->onDelete('cascade');
            $table->foreignId('metode_konsultasi_id')->constrained('metode_konsultasis')->onDelete('cascade');
            $table->primary(['detail_psikolog_id', 'metode_konsultasi_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metode_konsultasi_mappings');
    }
};