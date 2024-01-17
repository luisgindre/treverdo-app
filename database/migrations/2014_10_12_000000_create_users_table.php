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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('current_team_id')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('company_id')->nullable();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();            
            $table->string('company_position')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('work_mail')->nullable();
            $table->string('cell_phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_update_user_id')->nullable();
            $table->boolean('enabled');
            $table->string('password');
            $table->rememberToken();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
