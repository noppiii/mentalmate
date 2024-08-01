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
        Schema::create('bidang_psikolog_mappings', function (Blueprint $table) {
            $table->foreignId('detail_psikolog_id')->constrained('detail_psikologs')->onDelete('cascade');
            $table->foreignId('bidang_psikolog_id')->constrained('bidang_psikologs')->onDelete('cascade');
            $table->primary(['detail_psikolog_id', 'bidang_psikolog_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidang_psikolog_mapping');
    }
};