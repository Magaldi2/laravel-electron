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
            $table->timestamps();
            $table->id();
            $table->string('name'); //
            $table->string('email')->unique(); //email colunm 
            $table->string('password'); //password colunm
            $table->string('cep'); //postal code colunm
            $table->enum('role',['admin','user'])->default('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
