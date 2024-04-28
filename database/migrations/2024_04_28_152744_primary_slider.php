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
        Schema::create('primary_slider', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('title');
            $table->string('slogan');
            $table->string('category');
            $table->string('link_title');
            $table->string('link');
            $table->string('description');
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
        Schema::drop('primary_slider');
    }
};
