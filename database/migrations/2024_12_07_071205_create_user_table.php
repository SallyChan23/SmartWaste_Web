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
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('userId');
            $table->string('username');
            $table->string('email');
            $table->string('password')->unique();
            $table->string('phoneNumber');
            $table->string('profilePicture');
            $table->integer('points');
            $table->string('role');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
