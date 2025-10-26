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
        Schema::create('driver_vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');

            $table->unique(['driver_id', 'vehicle_id']); // biar tidak ada duplikasi pasangan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_vehicles');
    }
};
