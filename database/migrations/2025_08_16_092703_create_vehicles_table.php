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
        Schema::create('vehicles', function (Blueprint $table) {
         $table->uuid('vehicle_id')->primary(); // UUID as primary key
            $table->string('name');
            $table->string('model');
            $table->string('license_plate')->unique();
            $table->string('color')->nullable();
             $table->enum('status', ['available', 'rented', 'maintenance', 'out_of_service'])  //Better than string
            ->default('available'); // Add ->default()
            $table->string('type')->nullable();
            $table->json('features')->nullable();//better that string
            $table->timestamps();

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');

    }
};
