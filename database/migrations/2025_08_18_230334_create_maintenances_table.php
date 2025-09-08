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
        $table->uuid('maintenance_id')->primary();
        $table->uuid('vehicle_id');
        $table->uuid('user_id');
        $table->dateTime('service_date');
        $table->decimal('cost');
        $table->text('description')->nullable();
        $table->timestamps();

        // Define foreign keys explicitly
        $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicles')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
        $table->index(['vehicle_id', 'user_id', 'service_date']);
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
