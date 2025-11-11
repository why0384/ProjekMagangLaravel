<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ride_requests', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('vehicle_id')->nullable();

            $table->string('pickup_location');
            $table->enum('status', ['pending', 'konfirmasi', 'tolak'])->default('pending');
            $table->integer('queue_number');

            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('set null');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('set null');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ride_requests');
    }
};
