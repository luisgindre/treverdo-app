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
            $table->string('dni_nif_nie')->nullable();
            $table->boolean('is_company')->nullable()->default(false); //booleano 1 empresa - 0 persona física
            $table->string('company_name')->nullable(); //si es empresa 
            $table->string('name')->nullable(); //si es persona fisica
            $table->string('last_name')->nullable(); //si es persona fisica
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
