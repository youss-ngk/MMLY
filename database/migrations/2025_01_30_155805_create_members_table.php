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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female']);
            $table->string('academic_year');
            $table->string('phone');
            $table->string('email')->unique();
            $table->foreignId('profession_id')->constrained();
            $table->foreignId('specialization_id')->constrained();
            $table->foreignId('education_level_id')->constrained();
            $table->foreignId('region_id')->constrained();
            $table->foreignId('province_id')->constrained();
            $table->string('branch')->nullable();
            $table->foreignId('structure_position_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
