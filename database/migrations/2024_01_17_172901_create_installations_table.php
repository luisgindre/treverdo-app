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
        Schema::create('installations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable();
            $table->unsignedbigInteger('dolibarr_proyect_id')->nullable();
            $table->string('installation_location')->nullable();
            $table->string('installation_adress')->nullable();
            $table->unsignedbigInteger('installation_total_area')->nullable();
            $table->unsignedbigInteger('installation_total_irrigation_area')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installations');
    }
};
