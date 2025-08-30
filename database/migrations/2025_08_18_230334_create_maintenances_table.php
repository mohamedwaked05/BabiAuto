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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->uuid('maintenance_id')->primary(); // UUID as primary key
            $table->foreignUuid('vehicle_id')->constrained('vehicles')->onDelete('cascade'); // Foreign key to vehicles
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('service_date'); // Date of maintenance service
            $table->decimal('cost');// Cost of the maintenance service
            $table->text('description')->nullable(); // Description of the maintenance work done
            $table->timestamps();
            $table->index(['vehicle_id', 'user_id','service_date']); // Index for faster lookups

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
