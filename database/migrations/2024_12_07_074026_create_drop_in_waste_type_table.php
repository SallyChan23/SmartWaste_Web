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
        Schema::create('drop_in_waste_type', function (Blueprint $table) {
            $table->bigIncrements('dropInWasteTypeId');
            $table->unsignedBigInteger('wasteTypeId');
            $table->foreign('wasteTypeId')->references('wasteTypeId')->on('waste_type')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drop_in_waste_type');
    }
};
