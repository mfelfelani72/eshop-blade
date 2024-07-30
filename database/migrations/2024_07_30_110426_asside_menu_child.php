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
        Schema::create('asside_menu_child', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('asside_menu_id')->unsigned()->index()->nullable();
            $table->foreign('asside_menu_id')->references('id')->on('asside_menu')->onDelete('cascade');

            $table->string('title');
            $table->string('code');
            $table->string('link');
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
        Schema::drop('asside_menu_child');
    }
};
