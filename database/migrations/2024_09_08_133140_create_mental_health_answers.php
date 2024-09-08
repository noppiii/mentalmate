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
        Schema::create('mental_health_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mental_health_result_id')->constrained()->onDelete('cascade');
            $table->foreignId('mental_health_question_id')->constrained()->onDelete('cascade');
            $table->foreignId('mental_health_option_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mental_health_answers');
    }
};
