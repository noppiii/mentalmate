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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->string('transaction_id')->unique();
            $table->string('payment_type');
            $table->decimal('amount', 15, 2);
            $table->string('currency')->default('IDR');
            $table->string('transaction_status');
            $table->string('fraud_status')->nullable();
            $table->json('payment_details')->nullable();
            $table->timestamp('transaction_time');
            $table->timestamps();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};