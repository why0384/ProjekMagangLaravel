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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('name_student');
            $table->string('class_student')->nullable();
            $table->text('address_student');
            $table->string('phone_student')->nullable();
            $table->enum('service_student', ['antar', 'jemput','antar-jemput'])->default('antar-jemput');
            $table->enum('status_student', ['active', 'inactive'])->default('active');
            $table->string('photo_student')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
