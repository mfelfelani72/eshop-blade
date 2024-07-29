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
        Schema::create('header_menu', function (Blueprint $table) {

            $table->id();

            // $table->bigInteger('product_id')->unsigned()->index()->nullable();
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->string('title');
            $table->string('code');
            $table->string('link');
            $table->string('lable');
            $table->Integer('priority');
            $table->string('operator');
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
        Schema::drop('header_menu');
    }
};
