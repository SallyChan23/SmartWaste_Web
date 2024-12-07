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
        Schema::create('drop_in_waste_detail', function (Blueprint $table) {
            $table->bigIncrements('dropInWasteDetailid');
            $table->unsignedBigInteger('wasteDetailId');
            $table->foreign('wasteDetailId')->references('wasteDetailId')->on('waste_details')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('dropInId');
            $table->foreign('dropInId')->references('dropInId')->on('drop_in')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drop_in_waste_detail');
    }
};
