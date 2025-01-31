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
        Schema::create('card_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->constrained();
            $table->foreignId('province_id')->constrained();
            $table->string('academic_year');
            $table->integer('card_count');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('paid_amount', 10, 2);
            $table->decimal('remaining_amount', 10, 2);
            $table->decimal('office_share', 10, 2)->comment('50% of total');
            $table->decimal('region_share', 10, 2)->comment('20% of total');
            $table->decimal('province_share', 10, 2)->comment('30% of total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_reports');
    }
};
