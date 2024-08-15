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
        Schema::create('zoom_meetings', function (Blueprint $table) {
            $table->id();
            $table->string('meeting_id')->unique();
            $table->string('topic');
            $table->text('agenda')->nullable();
            $table->longText('link');
            $table->integer('type')->default(2);
            $table->integer('duration')->default(60);
            $table->string('timezone')->default('Asia/Dhaka');
            $table->string('password')->nullable();
            $table->datetime('start_time')->nullable();
            $table->string('template_id')->nullable();
            $table->boolean('pre_schedule')->default(false);
            $table->string('schedule_for')->nullable();
            $table->foreignId('konsultasi_id')->constrained('konsultasis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zoom_meetings');
    }
};