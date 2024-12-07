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
        Schema::create('waste_details', function (Blueprint $table) {
            $table->bigIncrements('wasteDetailId');
            $table->unsignedBigInteger('wasteTypeId');
            $table->foreign('wasteTypeId')->references('wasteTypeId')->on('waste_type')->onDelete('cascade');
            $table->string('wasteDetailName');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_details');
    }
};
