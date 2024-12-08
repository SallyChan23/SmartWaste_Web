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
        Schema::create('drop_in_validation', function (Blueprint $table) {
            $table->bigIncrements('validationId');
            $table->unsignedBigInteger('dropInId');
            $table->foreign('dropInId')->references('dropInId')->on('drop_in')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('weight');
            $table->integer('pointsGenerated');
            $table->string('status');
            $table->date('validationDate');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drop_in_validation');
    }
};
