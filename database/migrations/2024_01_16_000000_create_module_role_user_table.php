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
        Schema::create('module_role_user', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable();
            $table->foreignId('role_id')->nullable();
            $table->foreignId('module_id')->nullable();
            $table->timestamp('user_role_module_since')->nullable();
            $table->timestamp('user_role_module_till')->nullable();
            $table->foreignId('user_grantor_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     */
    public function down(): void
    {
        Schema::dropIfExists('module_role_user');
    }
};
