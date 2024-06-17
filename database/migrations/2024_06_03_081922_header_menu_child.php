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
        Schema::create('header_menu_child', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('header_menu_id')->unsigned()->index()->nullable();
            $table->foreign('header_menu_id')->references('id')->on('header_menu')->onDelete('cascade');

            $table->srting('title');
            $table->string('code');
            $table->string('image');
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
        Schema::drop('header_menu_child');
    }
};
