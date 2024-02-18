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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('installation_id')->nullable();
            $table->foreignId('soil_id')->nullable();
            $table->string('cadastral_number')->nullable();
            $table->unsignedbigInteger('stoniness_percentage')->nullable();
            $table->unsignedbigInteger('useful_depth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcels');
    }
};
