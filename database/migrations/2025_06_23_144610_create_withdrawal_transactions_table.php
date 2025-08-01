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
        Schema::create('withdrawal_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 15, 2);
            $table->string('currency', 3)->default('IRR');
            $table->enum('status', ['pending', 'completed', 'reject'])->default('pending'); // pending, completed, failed
            $table->string('reference')->unique(); // Unique transaction reference
            $table->string('card')->nullable();
            $table->string('sheba')->nullable();
            $table->text('description')->nullable();
            $table->string('image', 2048)->nullable();
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawal_transactions');
    }
};