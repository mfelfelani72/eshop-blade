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
        Schema::create('order_list', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('order_id')->unsigned()->index()->nullable();
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');

            $table->bigInteger('product_id')->unsigned()->index()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->bigInteger('address_id')->unsigned()->index()->nullable();
            $table->foreign('address_id')->references('id')->on('user_profile_address')->onDelete('cascade');

           
            $table->string('count');
            $table->string('price_final');

            $table->string('extra');
            $table->enum('status', ['enable', 'disable', 'deleted']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('order_list');
    }
};
