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
        Schema::create('voucher_transaction', function (Blueprint $table) {
            $table->bigIncrements('voucherTransactionId');
            $table->unsignedBigInteger('voucherId');
            $table->foreign('voucherId')->references('voucherId')->on('voucher')->onDelete('cascade');
            $table->unsignedBigInteger('userId');
            $table ->foreign('userId')->references('userId')->on('user')->onDelete('cascade');
            $table->integer('totalPoints');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_transaction');
    }
};
