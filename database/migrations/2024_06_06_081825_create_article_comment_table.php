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
        Schema::create('artikel_comments', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('content');
            $table->foreignId('artikel_id')->constrained('artikels')->onDelete('cascade');
            $table->foreignId('psikolog_id')->constrained('psikologs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_comments');
    }
};
