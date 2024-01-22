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
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parcel_id')->nullable();
            $table->foreignId('crop_id')->nullable();
            $table->foreignId('irrigation_id')->nullable();
            $table->unsignedbigInteger('distance_between_drips')->nullable();
            $table->unsignedbigInteger('branch_quantity_per_line')->nullable();
            $table->unsignedbigInteger('drip_flow')->nullable();
            $table->unsignedbigInteger('distance_between_lines')->nullable();
            $table->unsignedbigInteger('irrigation_hours_per_day_jan')->nullable();
            $table->unsignedbigInteger('irrigation_hours_per_day_feb')->nullable();
            $table->unsignedbigInteger('irrigation_hours_per_day_mar')->nullable();
            $table->unsignedbigInteger('irrigation_hours_per_day_apr')->nullable();
            $table->unsignedbigInteger('irrigation_hours_per_day_may')->nullable();
            $table->unsignedbigInteger('irrigation_hours_per_day_jun')->nullable();
            $table->unsignedbigInteger('irrigation_hours_per_day_jul')->nullable();
            $table->unsignedbigInteger('irrigation_hours_per_day_aug')->nullable();
            $table->unsignedbigInteger('irrigation_hours_per_day_sep')->nullable();
            $table->unsignedbigInteger('irrigation_hours_per_day_oct')->nullable();
            $table->unsignedbigInteger('irrigation_hours_per_day_nov')->nullable();
            $table->unsignedbigInteger('irrigation_hours_per_day_dic')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crop_irrigation_parcel');
    }
};
