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
        Schema::create('drop_in', function (Blueprint $table) {
            $table->bigIncrements('dropInId');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('user')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('locationId');
            $table->foreign('locationId')->references('locationId')->on('location')->onUpdate('cascade')->onDelete('cascade');
            $table->string('wastePicture');
            $table->date('date');
            $table->integer('quantity');
            $table->integer('weight');
            $table->string('status');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drop_in');
    }
};
