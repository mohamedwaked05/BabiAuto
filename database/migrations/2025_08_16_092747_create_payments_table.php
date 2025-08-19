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
    Schema::create('payments', function (Blueprint $table) {
        // Primary Key (UUID for distributed systems or auto-increment ID)
        $table->uuid('payment_id')->primary(); // Or `$table->id()` for auto-increment
        $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
        // Foreign Keys (with constrained relationships)
        $table->foreignUuid('vehicle_id')->constrained('vehicles')->onDelete('cascade');
        $table->foreignUuid('booking_id')->nullable()->constrained('bookings')->onDelete('set null');

        // Payment Details
        $table->decimal('amount', 10, 2); // More precise than double for financial data
        $table->enum('method', ['credit_card', 'cash', 'bank_transfer', 'paypal']);
        $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
        $table->dateTime('payment_date')->nullable(); // DateTime for exact timestamps
        $table->string('transaction_id')->unique()->nullable(); // External gateway reference

        // Metadata
        $table->json('metadata')->nullable(); // For additional payment details (e.g., card last 4 digits)

        // Timestamps
        $table->timestamps();

        // Indexes for performance
        $table->index('status');
        $table->index('method');
        $table->index('transaction_id');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
