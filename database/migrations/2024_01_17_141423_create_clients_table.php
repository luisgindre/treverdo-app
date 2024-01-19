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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_creator_id')->nullable(); //usuario que lo crea
            $table->foreignId('last_update_user_id')->nullable(); //último usuario que lo modifica
            $table->foreignId('module_id')->nullable(); //módulo en el que fue cargado el cliente
            $table->foreignId('user_id')->nullable(); //para cuando el cliente tiene usuario
            $table->unsignedbigInteger('dolibarr_thirdparty_id')->nullable();
            $table->string('dni_cif_nie')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('cell_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
