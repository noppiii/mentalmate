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
        Schema::create('category_artikel_mappings', function (Blueprint $table) {
            $table->foreignId('artikel_id')->constrained('artikels')->onDelete('cascade');
            $table->foreignId('kategori_artikel_id')->constrained('kategori_artikels')->onDelete('cascade');
            $table->primary(['artikel_id', 'kategori_artikel_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_artikel_mappings');
    }
};