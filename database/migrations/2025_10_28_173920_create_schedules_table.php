<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();

            // Foreign key ke tabel lain
            $table->unsignedBigInteger('student_id')->nullable(); // FK ke students.user_id
            $table->unsignedBigInteger('driver_id')->nullable();  // FK ke drivers.user_id
            $table->unsignedBigInteger('vehicle_id')->nullable();         // FK ke vehicles.license_plate

            // Informasi jadwal
            $table->time('pickup_time')->nullable();
            $table->time('dropoff_time')->nullable();
            $table->text('pickup_location')->nullable();
            $table->text('dropoff_location')->nullable();
            $table->text('note_admin')->nullable();

            // Status jadwal
            $table->enum('status', ['aktif', 'batal'])->default('aktif');

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('student_id')->references('id')->on('students')->onDelete('set null');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('set null');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('set null');
        });
    }

    /**
     * Hapus tabel.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
