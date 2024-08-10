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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->morphs('sender');
            $table->morphs('receiver');
            $table->foreignId('reply_id')->nullable(true)->constrained('messages')->cascadeOnDelete();
            $table->text('content');
            $table->timestamp('deleted_at')->nullable(true);
            $table->timestamp('seen_at')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};