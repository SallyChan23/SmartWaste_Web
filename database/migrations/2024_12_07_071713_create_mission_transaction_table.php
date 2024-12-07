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
        Schema::create('mission_transaction', function (Blueprint $table) {
            $table->bigIncrements('missionTransactionId');
            $table->unsignedBigInteger('missionId');
            $table->foreign('missionId')->references('missionId')->on('mission')->onDelete('cascade');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('user')->onDelete('cascade');
            $table->string('status');
            $table->date('startDate');
            $table->date('endDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission_transaction');
    }
};
