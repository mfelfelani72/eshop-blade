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
        Schema::create('order_payment_details', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('order_id')->unsigned()->index()->nullable();
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');

            $table->string('bank_code');
            $table->string('price_total');
            $table->string('price_total_tax');
            $table->string('details');
            $table->string('details_bank');
            $table->string('extra');
            $table->enum('status', ['paying','payed','canceled', 'deleted']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('order_payment_details');
    }
};
