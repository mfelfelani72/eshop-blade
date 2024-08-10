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
        Schema::create('order', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('operator_id')->unsigned()->index()->nullable();
            $table->foreign('operator_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->enum('type_send', ['delivery', 'on_site']);
            $table->string('extra');
            $table->enum('status', ['not_confirmed','confirmed','preparing','sending', 'delivered','disable', 'deleted']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('order');
    }

};
