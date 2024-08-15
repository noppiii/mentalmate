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
        Schema::create('zoom_meeting_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zoom_meeting_id')->constrained('zoom_meetings')->onDelete('cascade');
            $table->boolean('join_before_host')->default(false);
            $table->boolean('host_video')->default(false);
            $table->boolean('participant_video')->default(false);
            $table->boolean('mute_upon_entry')->default(false);
            $table->boolean('waiting_room')->default(false);
            $table->string('audio')->default('both');
            $table->string('auto_recording')->default('none');
            $table->integer('approval_type')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zoom_meeting_settings');
    }
};