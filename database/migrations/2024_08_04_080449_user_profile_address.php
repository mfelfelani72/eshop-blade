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
        Schema::create('user_profile_address', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('country')->nullable();
            $table->string('province');
            $table->string('city');
            $table->string('street');
            $table->string('avenue')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('floor');
            $table->string('unit')->nullable();
            $table->string('home_number');
            $table->string('location')->nullable();
            $table->string('extra')->nullable();
            $table->enum('status', ['enable', 'disable', 'deleted']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('user_profile_address');
    }
};
