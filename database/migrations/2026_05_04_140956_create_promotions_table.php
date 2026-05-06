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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('from_grade')->constrained('grades')->onDelete('cascade');
            $table->foreignId('from_classroom')->constrained('class_rooms')->onDelete('cascade');
            $table->foreignId('from_section')->constrained('sections')->onDelete('cascade');
            $table->foreignId('to_grade')->constrained('grades')->onDelete('cascade');
            $table->foreignId('to_classroom')->constrained('class_rooms')->onDelete('cascade');
            $table->foreignId('to_section')->constrained('sections')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};