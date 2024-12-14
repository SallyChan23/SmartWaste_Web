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
        Schema::create('mission', function (Blueprint $table) {
            $table->bigIncrements('missionId');
            $table->string('title');
            $table->integer('totalPoints');
            $table->text('description');
            $table->string('missionPicture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission');
    }
};
